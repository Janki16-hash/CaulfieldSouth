/**
 * Zakra starter-content "fresh site" notice.
 *
 * On a fresh site the starter Home page is staged in the Customizer the
 * moment it loads. The Agency 03 header/footer chrome around it ( Header
 * Builder / Footer Builder theme-mods, Primary Menu, footer widgets — see
 * class-zakra-starter-content.php ) is staged right along with it, via an
 * AJAX call fired as soon as this script runs, so the very first preview the
 * user sees already looks like the finished design — not the bare page with
 * no logo, no real nav, and a leftover breadcrumb bar. This notice then lets
 * the user choose:
 *
 *  - Keep the starter homepage : publish the changeset as already staged.
 *  - Start with a clean slate  : undo the chrome that was auto-applied
 *                                  above ( theme-mods back to their defaults,
 *                                  front-page settings back to a normal
 *                                  blog ), then publish that instead.
 *
 * Either button publishes immediately — no separate click on the
 * Customizer's own Publish button needed, same as clicking it directly.
 *
 * Known limitation: the Primary Menu term itself ( created by the auto-
 * applied chrome to hold the Home link ) can't be cleanly un-staged once
 * WordPress core has it queued for creation, only reset so nothing points to
 * it. Choosing "clean slate" can occasionally still leave one unused,
 * unassigned "Primary Menu" behind under Appearance > Menus — cosmetic
 * clutter, invisible on the actual site, not a live-site bug.
 *
 * @package zakra
 */
( function ( api, $ ) {
	'use strict';

	api.bind( 'ready', function () {

		var data = window.zakraStarterContent || {};

		var $card = $(
			'<div class="zakra-sc-notice">' +
				'<h3></h3>' +
				'<p></p>' +
				'<button type="button" class="button button-primary zakra-sc-keep"></button>' +
				'<button type="button" class="button zakra-sc-clean"></button>' +
				'<p class="zakra-sc-note"></p>' +
			'</div>'
		);

		// Use text() so localized strings are inserted safely.
		$card.find( 'h3' ).text( data.title || '' );
		$card.find( 'p' ).first().text( data.message || '' );
		$card.find( '.zakra-sc-keep' ).text( data.keep || '' );
		$card.find( '.zakra-sc-clean' ).text( data.clean || '' );
		$card.find( '.zakra-sc-note' ).text( data.note || '' );

		$( '#customize-theme-controls' ).prepend( $card );

		// Only show on the root ( first ) screen — hide as soon as the user
		// navigates into any panel or section, and restore it when they go back.
		var toggleCardVisibility = function () {
			var expanded = api.state( 'expandedPanel' ).get() || api.state( 'expandedSection' ).get();
			$card.toggle( ! expanded );
		};

		api.state( 'expandedPanel' ).bind( toggleCardVisibility );
		api.state( 'expandedSection' ).bind( toggleCardVisibility );
		toggleCardVisibility();

		// Same thing clicking the Customizer's own Publish button does —
		// see its click handler in customize-controls.js — so either notice
		// button is a single click instead of "choose, then go find Publish
		// too".
		var publishChangeset = function () {
			var status = api.state( 'selectedChangesetStatus' );
			if ( status ) {
				status.set( 'publish' );
			}
			if ( api.previewer ) {
				api.previewer.save();
			}
		};

		// Stage the Agency 03 header/footer chrome into the live changeset.
		// Fired immediately below ( not gated behind "Keep" ) so the preview
		// shows the finished design right away; also re-used by the "Keep"
		// button itself in case a click somehow lands before this settles.
		var chromeApplied = null;
		var applyChrome = function () {

			if ( chromeApplied ) {
				return chromeApplied;
			}

			// Theme-mods ( Header/Footer Builder layout, colors, button text,
			// the logo, etc ) are set directly on their live Setting models —
			// the same call a real Customizer edit makes — rather than only
			// through the AJAX call below. WordPress's own autosave can fire
			// at any time while the Customizer is open and will otherwise
			// re-save its own last-known ( still default ) value for any
			// setting whose Setting model was never actually updated
			// client-side, clobbering what the AJAX call staged server-side.
			_.each( data.chromeMods || {}, function ( value, id ) {
				var setting = api( id );
				if ( setting ) {
					setting.set( value );
				}
			} );

			// Primary Menu, and the footer's Latest Posts / Contact Info
			// widgets, still need the AJAX call — they involve creating new
			// nav-menu-item and widget settings, not just setting the value
			// of ones that already exist.
			chromeApplied = $.post(
				window.ajaxurl,
				{
					action: 'zakra_apply_starter_chrome',
					nonce: data.chromeNonce,
					wp_customize: 'on',
					customize_changeset_uuid: api.settings.changeset.uuid,
				}
			);

			return chromeApplied;
		};

		applyChrome();

		// Keep: the chrome above is already staged ( or about to settle ) —
		// just publish.
		$card.on( 'click', '.zakra-sc-keep', function () {

			$( this ).prop( 'disabled', true );

			applyChrome().always( function () {
				$card.slideUp( 150, function () {
					$card.remove();
				} );

				publishChangeset();
			} );
		} );

		// Clean slate: undo the chrome the auto-apply above already staged —
		// every theme-mod it touched back to its own default, the Primary
		// Menu location unassigned — plus the front-page settings, so
		// publishing leaves a normal blog with none of it.
		$card.on( 'click', '.zakra-sc-clean', function () {

			$( this ).prop( 'disabled', true );

			applyChrome().always( function () {

				// wp.customize.Setting has no '.default' of its own
				// client-side ( unlike the PHP WP_Customize_Setting it
				// mirrors ) — data.chromeDefaults carries each one over from
				// there instead ( see enqueue_fresh_site_notice() ).
				_.each( data.chromeDefaults || {}, function ( value, id ) {
					var setting = api( id );
					if ( setting ) {
						setting.set( value );
					}
				} );

				// No starter-content theme ever assigns a location by
				// default, so 0 ( unassigned ) is always the right value to
				// revert to here, unlike the settings above. 'menu-primary'
				// matches the location slug this theme actually registers
				// ( see register_nav_menus() in class-zakra-after-setup-theme.php )
				// — plain 'primary' is a different theme's convention and
				// silently matches no setting here at all.
				//
				// Unlike the chromeMods settings above, this one was only
				// ever assigned server-side by applyChrome()'s AJAX call —
				// nothing ever called .set() on it client-side, so this
				// Setting's in-memory value has been sitting at its original
				// page-load value ( 0 ) the whole time, same as the value
				// being reverted to here. wp.customize.Value.set() is a no-op
				// when the new value looks unchanged from what it already
				// has, so a plain "set( 0 )" would silently do nothing,
				// leaving whatever applyChrome() actually assigned in place
				// all the way through to publish. Routing through a value
				// that's certainly different first forces it to register as
				// a real change.
				var primaryLocation = api( 'nav_menu_locations[menu-primary]' );
				if ( primaryLocation ) {
					primaryLocation.set( -1 );
					primaryLocation.set( 0 );
				}

				// Created posts ( includes the starter Home page ) — empty so none publish.
				var created = api( 'nav_menus_created_posts' );
				if ( created ) {
					created.set( [] );
				}

				// Reset the static-front-page settings back to a clean default.
				if ( api( 'show_on_front' ) ) {
					api( 'show_on_front' ).set( 'posts' );
				}
				if ( api( 'page_on_front' ) ) {
					api( 'page_on_front' ).set( 0 );
				}
				if ( api( 'page_for_posts' ) ) {
					api( 'page_for_posts' ).set( 0 );
				}

				$card.slideUp( 150, function () {
					$card.remove();
				} );

				publishChangeset();
			} );
		} );
	} );
} )( wp.customize, jQuery );
