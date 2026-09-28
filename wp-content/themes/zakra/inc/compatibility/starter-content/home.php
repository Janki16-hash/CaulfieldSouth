<?php
/**
 * Home page starter content for Zakra.
 *
 * Block markup recreating the content sections of the Zakra "Agency 03" demo
 * homepage (hero, features, portfolio, pricing, team, reviews, etc). Rendered
 * through the theme's normal page template, so the site's actual header.php /
 * footer.php run as usual — Header Builder, Footer Builder, and every
 * Customizer theme-mod apply to this page exactly like any other page.
 *
 * Earlier revisions duplicated a header and footer directly into this markup
 * and rendered the page through a chrome-less "Canvas" template instead, so
 * the WordPress.org theme preview would show that bespoke design verbatim.
 * That left Header Builder's Toggle Menu element (and every other
 * Customizer-driven setting) with no effect on real new sites, since the
 * theme's own header/footer never ran on this page — see ZAK-259.
 *
 * The block markup is kept verbatim from the design export, except:
 *  - the header and footer sections of the export are dropped, since the
 *    theme's own header.php / footer.php now provide them;
 *  - image URLs and spacing/color presets are swapped at runtime for bundled
 *    assets and explicit values, so nothing depends on external files, the
 *    site's media library, or theme/theme.json presets.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

$markup = <<<'HTML'
<!-- wp:group {"align":"full","style":{"color":{"background":"#ececec"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#ececec"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(36px, 5vw, 52px)","fontWeight":"700","lineHeight":"1.2","letterSpacing":"-0.02em"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h1 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(36px, 5vw, 52px);font-weight:700;letter-spacing:-0.02em;line-height:1.2">Think Different.<br>Make Different.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.7"},"color":{"text":"#5C5C5C"},"spacing":{"margin":{"top":"24px","bottom":"32px"}}}} -->
<p class="has-text-color" style="color:#5C5C5C;margin-top:24px;margin-bottom:32px;font-size:16px;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed proin eget eu sit nec risus. Sed ut quam integer a nisl amet. Ed ut quam integer a nisl amet</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"base","style":{"color":{"background":"#118b57"},"border":{"radius":"4px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"30px","right":"30px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:4px;background-color:#118b57;padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px;font-size:13px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-large" style="margin-top:0;margin-bottom:0"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/home-hero-image-1024x890.png" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"0","bottom":"0"}},"color":{"background":"#118b57"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#118b57;padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"width":"0px","style":"none"},"right":{"color":"var:preset|color|zakra-color-9","width":"1px"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}}} -->
<div class="wp-block-column" style="border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--zakra-color-9);border-right-width:1px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-idea.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Ideas</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"width":"0px","style":"none"},"right":{"color":"var:preset|color|zakra-color-9","width":"1px"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}}} -->
<div class="wp-block-column" style="border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--zakra-color-9);border-right-width:1px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-research.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Research</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"width":"0px","style":"none"},"right":{"color":"var:preset|color|zakra-color-9","width":"1px"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}}} -->
<div class="wp-block-column" style="border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--zakra-color-9);border-right-width:1px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-pixel-perfect.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Pixel Perfect</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"width":"0px","style":"none"},"right":{"color":"var:preset|color|zakra-color-9","width":"1px"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}}} -->
<div class="wp-block-column" style="border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--zakra-color-9);border-right-width:1px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-seo-friendly.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">SEO Friendly</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"width":"0px","style":"none"},"right":{"color":"var:preset|color|zakra-color-9","width":"1px"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}}} -->
<div class="wp-block-column" style="border-top-style:none;border-top-width:0px;border-right-color:var(--wp--preset--color--zakra-color-9);border-right-width:1px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-design.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Design</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"65px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/icon-support.png" alt="" style="width:65px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"14px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:14px;margin-bottom:0px;font-size:15px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Support</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"4px"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-large has-custom-border" style="margin-top:0;margin-bottom:0"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/zakra-invite-1024x698.jpg" alt="" style="border-radius:4px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(26px, 3.2vw, 34px)","fontWeight":"700","lineHeight":"1.25","letterSpacing":"-0.02em"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"20px"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:20px;font-size:clamp(26px, 3.2vw, 34px);font-weight:700;letter-spacing:-0.02em;line-height:1.25">Zakra Invites You To Build Your Next Site</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"18px"}}}} -->
<p class="has-text-color" style="color:#777777;margin-top:0px;margin-bottom:18px;font-size:16px;line-height:1.8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. At in proin lacus, sed morbi pulvinar malesuada duis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:16px;line-height:1.8">Viverra pellentesque enim mattis cursus lorem cras est augue. Sit lectus nisl velit rutrum. In quis quis vitae vitae. Sollicitudin rhoncus sit sed odio tristique id. Nisl turpis sed fames sed egestas et. Massa, id platea elit diam scelerisque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"0","left":"0","right":"0"},"blockGap":"var:preset|spacing|70"},"color":{"background":"#ececec"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#ececec;padding-top:var(--wp--preset--spacing--70);padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(28px, 3.5vw, 36px)","fontWeight":"700","letterSpacing":"-0.02em","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(28px, 3.5vw, 36px);font-weight:700;letter-spacing:-0.02em">Our Awesome Portfolio</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","lineHeight":"1.7","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sapien, sit sed accumsan, viverra sociis ullamcorper aenean fermentum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:gallery {"columns":4,"linkTo":"none","align":"full","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"}}}} -->
<figure class="wp-block-gallery alignfull has-nested-images columns-4 is-cropped"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-A.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-E.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-F.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-C.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-H.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-B.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-D.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-G.jpg" alt=""/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#FFFFFF"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#FFFFFF;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(28px, 3.5vw, 36px)","fontWeight":"700","letterSpacing":"-0.02em","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(28px, 3.5vw, 36px);font-weight:700;letter-spacing:-0.02em">Plan &amp; Pricing</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","lineHeight":"1.7","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.7">Aorem ipsum dolor sit amet, consectetur adipiscing elit. Sapien, sit sed accumsan, viverra sociis ullamcorper aenean fermentum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"},"blockGap":"0"}},"borderColor":"zakra-color-9"} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color has-zakra-color-9-border-color" style="border-width:1px;border-radius:6px;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"18px","fontWeight":"700","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"14px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:14px;font-size:18px;font-weight:700">Silver</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"48px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#118b57"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#118b57;margin-top:0px;margin-bottom:4px;font-size:48px;font-weight:700;line-height:1">$39</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"13px","textAlign":"center"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#999999;margin-top:0px;margin-bottom:24px;font-size:13px">per month</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"#EEEEEE"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="margin-top:0px;margin-bottom:24px;background-color:#EEEEEE;color:#EEEEEE"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">1 User</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">3 Projects</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Download Prototypes</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">1 Year Repair Coverage</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Monthly Reports</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"28px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:28px;font-size:14px">7/24 Support</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"color":{"background":"transparent","text":"#118b57"},"border":{"color":"#118b57","width":"1px","radius":"4px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-color has-background has-border-color has-custom-font-size wp-element-button" style="border-color:#118b57;border-width:1px;border-radius:4px;color:#118b57;background-color:transparent;padding-top:12px;padding-right:28px;padding-bottom:12px;padding-left:28px;font-size:13px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"},"blockGap":"0"},"color":{"background":"#118b57"}}} -->
<div class="wp-block-column is-vertically-aligned-center has-background" style="border-radius:6px;background-color:#118b57;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"18px","fontWeight":"700","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"0px","bottom":"14px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:0px;margin-bottom:14px;font-size:18px;font-weight:700">Gold</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"48px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:0px;margin-bottom:4px;font-size:48px;font-weight:700;line-height:1">$49</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"13px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.8)"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.8);margin-top:0px;margin-bottom:24px;font-size:13px">per month</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"rgba(255,255,255,0.25)"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="margin-top:0px;margin-bottom:24px;background-color:rgba(255,255,255,0.25);color:rgba(255,255,255,0.25)"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:12px;font-size:14px">3 User</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:12px;font-size:14px">10 Projects</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:12px;font-size:14px">Download Prototypes</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:12px;font-size:14px">3 Year Repair Coverage</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:12px;font-size:14px">Weekly Reports</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"28px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:28px;font-size:14px">7/24 Support</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#FFFFFF","text":"#118b57"},"border":{"radius":"4px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"padding":{"top":"13px","bottom":"13px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:4px;color:#118b57;background-color:#FFFFFF;padding-top:13px;padding-right:28px;padding-bottom:13px;padding-left:28px;font-size:13px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"radius":"6px","width":"1px"},"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"},"blockGap":"0"}},"borderColor":"zakra-color-9"} -->
<div class="wp-block-column is-vertically-aligned-center has-border-color has-zakra-color-9-border-color" style="border-width:1px;border-radius:6px;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"18px","fontWeight":"700","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"14px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:14px;font-size:18px;font-weight:700">Platinum</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"48px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#118b57"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#118b57;margin-top:0px;margin-bottom:4px;font-size:48px;font-weight:700;line-height:1">$59</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"13px","textAlign":"center"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#999999;margin-top:0px;margin-bottom:24px;font-size:13px">per month</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"style":{"color":{"background":"#EEEEEE"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="margin-top:0px;margin-bottom:24px;background-color:#EEEEEE;color:#EEEEEE"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Unlimited User</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Unlimited Projects</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Download Prototypes</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">5 Repair Coverage</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:12px;font-size:14px">Daily Reports</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"28px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:28px;font-size:14px">7/24 Support</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"color":{"background":"transparent","text":"#118b57"},"border":{"color":"#118b57","width":"1px","radius":"4px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-color has-background has-border-color has-custom-font-size wp-element-button" style="border-color:#118b57;border-width:1px;border-radius:4px;color:#118b57;background-color:transparent;padding-top:12px;padding-right:28px;padding-bottom:12px;padding-left:28px;font-size:13px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#F7F7F7"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#F7F7F7;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(28px, 3.5vw, 36px)","fontWeight":"700","letterSpacing":"-0.02em","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(28px, 3.5vw, 36px);font-weight:700;letter-spacing:-0.02em">Meet Our Team</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","lineHeight":"1.7","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sapien, sit sed accumsan, viverra sociis ullamcorper aenean fermentum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-A.statopt_ver.jpg" alt="" style="border-radius:6px;aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontWeight":"700"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:4px;font-size:18px;font-weight:700">Desirae Dias</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#999999;margin-top:0px;margin-bottom:0px;font-size:14px">CEO</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-B.statopt_ver.jpg" alt="" style="border-radius:6px;aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontWeight":"700"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:4px;font-size:18px;font-weight:700">Madelyn Torff</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#999999;margin-top:0px;margin-bottom:0px;font-size:14px">Marketing Head</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-C.statopt_ver.jpg" alt="" style="border-radius:6px;aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontWeight":"700"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:4px;font-size:18px;font-weight:700">Tiana Gouse</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#999999;margin-top:0px;margin-bottom:0px;font-size:14px">Project Manager</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-D.statopt_ver.jpg" alt="" style="border-radius:6px;aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontWeight":"700"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"4px"}}}} -->
<p class="has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:4px;font-size:18px;font-weight:700">Livia Passaquin</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#999999;margin-top:0px;margin-bottom:0px;font-size:14px">Director</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#FFFFFF"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#FFFFFF;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(28px, 3.5vw, 36px)","fontWeight":"700","letterSpacing":"-0.02em","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(28px, 3.5vw, 36px);font-weight:700;letter-spacing:-0.02em">Client Reviews</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","lineHeight":"1.7","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.7">Pirem ipsum dolor sit amet, consectetur adipiscing elit. Sapien, sit sed accumsan, viverra sociis ullamcorper aenean fermentum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"style":{"color":{"background":"#F7F7F7"},"border":{"radius":"6px"},"spacing":{"padding":{"top":"36px","right":"36px","bottom":"36px","left":"36px"}}}} -->
<div class="wp-block-column has-background" style="border-radius:6px;background-color:#F7F7F7;padding-top:36px;padding-right:36px;padding-bottom:36px;padding-left:36px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.8"},"color":{"text":"#666666"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<p class="has-text-color" style="color:#666666;margin-top:0px;margin-bottom:24px;font-size:15px;line-height:1.8">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"48px","height":"48px","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"50px"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-thumbnail is-resized has-custom-border" style="margin-top:0;margin-bottom:0"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-D.statopt_ver-150x150.jpg" alt="" style="border-radius:50px;object-fit:cover;width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontWeight":"700"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:16px;font-weight:700">Amelia Abelo</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px"},"color":{"text":"#999999"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#999999;margin-top:0px;margin-bottom:0px;font-size:13px">Manager</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"color":{"background":"#118b57"},"border":{"radius":"6px"},"spacing":{"padding":{"top":"36px","right":"36px","bottom":"36px","left":"36px"}}}} -->
<div class="wp-block-column has-background" style="border-radius:6px;background-color:#118b57;padding-top:36px;padding-right:36px;padding-bottom:36px;padding-left:36px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.8"},"color":{"text":"rgba(255,255,255,0.92)"},"spacing":{"margin":{"top":"0px","bottom":"24px"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.92);margin-top:0px;margin-bottom:24px;font-size:15px;line-height:1.8">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"48px","height":"48px","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"50px"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-thumbnail is-resized has-custom-border" style="margin-top:0;margin-bottom:0"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/team-C.statopt_ver-150x150.jpg" alt="" style="border-radius:50px;object-fit:cover;width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontWeight":"700"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#FFFFFF;margin-top:0px;margin-bottom:0px;font-size:16px;font-weight:700">Noah Johnson</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px"},"color":{"text":"rgba(255,255,255,0.8)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.8);margin-top:0px;margin-bottom:0px;font-size:13px">CEO</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#118b57"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#118b57;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"isStackedOnMobile":false} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<div style="text-align:center;"><svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"38px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:16px;margin-bottom:6px;font-size:38px;font-weight:700;line-height:1">310k</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","fontWeight":"500","letterSpacing":"0.08em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.85)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.85);margin-top:0px;margin-bottom:0px;font-size:14px;font-weight:500;letter-spacing:0.08em;text-transform:uppercase">Client Trust</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<div style="text-align:center;"><svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"38px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:16px;margin-bottom:6px;font-size:38px;font-weight:700;line-height:1">150</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","fontWeight":"500","letterSpacing":"0.08em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.85)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.85);margin-top:0px;margin-bottom:0px;font-size:14px;font-weight:500;letter-spacing:0.08em;text-transform:uppercase">Experts</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<div style="text-align:center;"><svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"38px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:16px;margin-bottom:6px;font-size:38px;font-weight:700;line-height:1">15</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","fontWeight":"500","letterSpacing":"0.08em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.85)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.85);margin-top:0px;margin-bottom:0px;font-size:14px;font-weight:500;letter-spacing:0.08em;text-transform:uppercase">Experience</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<div style="text-align:center;"><svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M5 9a2 2 0 0 1-2-2V5h2M19 9a2 2 0 0 0 2-2V5h-2"/></svg></div>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"38px","fontWeight":"700","lineHeight":"1","textAlign":"center"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"16px","bottom":"6px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#FFFFFF;margin-top:16px;margin-bottom:6px;font-size:38px;font-weight:700;line-height:1">120</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"14px","fontWeight":"500","letterSpacing":"0.08em","textTransform":"uppercase","textAlign":"center"},"color":{"text":"rgba(255,255,255,0.85)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.85);margin-top:0px;margin-bottom:0px;font-size:14px;font-weight:500;letter-spacing:0.08em;text-transform:uppercase">Award</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#FFFFFF"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#FFFFFF;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(28px, 3.5vw, 36px)","fontWeight":"700","letterSpacing":"-0.02em","textAlign":"center"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:0px;font-size:clamp(28px, 3.5vw, 36px);font-weight:700;letter-spacing:-0.02em">Latest Posts &amp; Articles</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-text-color","style":{"typography":{"fontSize":"15px","lineHeight":"1.7","textAlign":"center"},"color":{"text":"#777777"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#777777;margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.7">Mirem ipsum dolor sit amet, consectetur adipiscing elit. Sapien, sit sed accumsan, viverra sociis ullamcorper aenean fermentum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-A.jpg" alt="" style="border-radius:6px;aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"18px","fontWeight":"700","lineHeight":"1.35"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:10px;font-size:18px;font-weight:700;line-height:1.35">Successful Marketing Ads for Your Business</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","lineHeight":"1.7"},"color":{"text":"#888888"},"spacing":{"margin":{"top":"0px","bottom":"16px"}}}} -->
<p class="has-text-color" style="color:#888888;margin-top:0px;margin-bottom:16px;font-size:14px;line-height:1.7">Porem orem ipsum dolor sit amet, Tetur adipiscing elit. Atempor scelerisque olor sit mauris</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase"><a href="#" style="color:#118b57;text-decoration:none">Read More</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-B.jpg" alt="" style="border-radius:6px;aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"18px","fontWeight":"700","lineHeight":"1.35"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:10px;font-size:18px;font-weight:700;line-height:1.35">Let&rsquo;s Build Your Business from Scratch</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","lineHeight":"1.7"},"color":{"text":"#888888"},"spacing":{"margin":{"top":"0px","bottom":"16px"}}}} -->
<p class="has-text-color" style="color:#888888;margin-top:0px;margin-bottom:16px;font-size:14px;line-height:1.7">Sorem orem ipsum dolor sit amet, Tetur adipiscing elit. Atempor scelerisque olor sit mauris</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase"><a href="#" style="color:#118b57;text-decoration:none">Read More</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-F.jpg" alt="" style="border-radius:6px;aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"18px","fontWeight":"700","lineHeight":"1.35"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:10px;font-size:18px;font-weight:700;line-height:1.35">The Best Place to Invest Your Money</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","lineHeight":"1.7"},"color":{"text":"#888888"},"spacing":{"margin":{"top":"0px","bottom":"16px"}}}} -->
<p class="has-text-color" style="color:#888888;margin-top:0px;margin-bottom:16px;font-size:14px;line-height:1.7">Torem orem ipsum dolor sit amet, Tetur adipiscing elit. Atempor scelerisque olor sit mauris</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase"><a href="#" style="color:#118b57;text-decoration:none">Read More</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"0","bottom":"18px"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-top:0;margin-bottom:18px"><img src="https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/portfolio-image-G.jpg" alt="" style="border-radius:6px;aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"18px","fontWeight":"700","lineHeight":"1.35"},"color":{"text":"#1A1A1A"},"spacing":{"margin":{"top":"0px","bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1A1A1A;margin-top:0px;margin-bottom:10px;font-size:18px;font-weight:700;line-height:1.35">The Big Seminar for Your Right Investment</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","lineHeight":"1.7"},"color":{"text":"#888888"},"spacing":{"margin":{"top":"0px","bottom":"16px"}}}} -->
<p class="has-text-color" style="color:#888888;margin-top:0px;margin-bottom:16px;font-size:14px;line-height:1.7">Borem orem ipsum dolor sit amet, Tetur adipiscing elit. Atempor scelerisque olor sit mauris</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase"><a href="#" style="color:#118b57;text-decoration:none">Read More</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$markup .= <<<'HTML'

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#118b57"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#118b57;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"72%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:72%"><!-- wp:heading {"style":{"typography":{"fontSize":"clamp(24px, 2.8vw, 32px)","fontWeight":"700","letterSpacing":"-0.02em"},"color":{"text":"#FFFFFF"},"spacing":{"margin":{"top":"0px","bottom":"12px"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#FFFFFF;margin-top:0px;margin-bottom:12px;font-size:clamp(24px, 2.8vw, 32px);font-weight:700;letter-spacing:-0.02em">Have Any Questions?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.8"},"color":{"text":"rgba(255,255,255,0.9)"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.9);margin-top:0px;margin-bottom:0px;font-size:15px;line-height:1.8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hendrerit massa condimentum enim, nisl vitae. Ultricies aliquet proin egestas donec viverra turpis luctus gravida ipsum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"28%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:28%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#FFFFFF","text":"#118b57"},"border":{"radius":"4px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.06em","textTransform":"uppercase"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"30px","right":"30px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:4px;color:#118b57;background-color:#FFFFFF;padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px;font-size:13px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"color":{"background":"#F7F7F7"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#F7F7F7;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"#bdbdbd"}}},"color":{"text":"#bdbdbd"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-text-color has-link-color has-medium-font-size" style="color:#bdbdbd">Wegmans</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"#bdbdbd"}}},"color":{"text":"#bdbdbd"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-text-color has-link-color has-medium-font-size" style="color:#bdbdbd">Warehouse</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"#bdbdbd"}}},"color":{"text":"#bdbdbd"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-text-color has-link-color has-medium-font-size" style="color:#bdbdbd">Neuhaus</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"#bdbdbd"}}},"color":{"text":"#bdbdbd"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-text-color has-link-color has-medium-font-size" style="color:#bdbdbd">Kiehl's</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"#bdbdbd"}}},"color":{"text":"#bdbdbd"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-text-color has-link-color has-medium-font-size" style="color:#bdbdbd">Coast</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:social-links {"iconColorValue":"#1A1A1A","className":"is-style-logos-only","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0px"},"blockGap":"22px"}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"pinterest"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->
HTML;

/*
 * Swap the design export's live URLs and theme/spacing presets for bundled
 * assets and explicit values, so the preview is fully self-contained.
 */
$img = trailingslashit( get_template_directory_uri() ) . 'assets/img/starter/';

$markup = strtr(
	$markup,
	array(
		// Images: site media library -> bundled assets, normalising file names.
		'https://prajjwalzakra-xo08.1wp.site/wp-content/uploads/2026/06/' => $img,
		'.statopt_ver-150x150.jpg'                => '.jpg',
		'.statopt_ver.jpg'                        => '.jpg',
		'portfolio-image-'                        => 'portfolio-',
		'home-hero-image-1024x890.png'            => 'home-hero-image.png',
		'zakra-invite-1024x698.jpg'               => 'zakra-invite.jpg',
		// "base" palette slug is not registered -> explicit white.
		'has-base-color has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:4px;background-color:#118b57;' => 'has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:4px;color:#FFFFFF;background-color:#118b57;',
		'alignfull has-base-background-color has-background" style="padding-top:' => 'alignfull has-background" style="background-color:#FFFFFF;padding-top:',
		'"textColor":"base",'                     => '',
		',"backgroundColor":"base"'               => '',
		// zakra-color-9 border preset -> explicit hex ( #E4E4E7 ).
		'var:preset|color|zakra-color-9'          => '#E4E4E7',
		'var(--wp--preset--color--zakra-color-9)' => '#E4E4E7',
		' has-zakra-color-9-border-color" style="border-width:1px;' => '" style="border-color:#E4E4E7;border-width:1px;',
		',"borderColor":"zakra-color-9"'          => '',
		// Spacing presets -> explicit px.
		'var:preset|spacing|40'                   => '16px',
		'var:preset|spacing|50'                   => '24px',
		'var:preset|spacing|60'                   => '36px',
		'var:preset|spacing|70'                   => '54px',
		'var:preset|spacing|80'                   => '80px',
		'var(--wp--preset--spacing--40)'          => '16px',
		'var(--wp--preset--spacing--50)'          => '24px',
		'var(--wp--preset--spacing--60)'          => '36px',
		'var(--wp--preset--spacing--70)'          => '54px',
		'var(--wp--preset--spacing--80)'          => '80px',
	)
);

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'zakra' ),
	'post_content' => $markup,
	// No 'meta_input' here for the Page Header/breadcrumb-hiding and CSS-
	// scoping meta this page needs ( zakra_page_header, and the internal
	// marker print_home_page_styles() checks ) — WordPress core's own
	// get_theme_starter_content() keeps only a fixed allowlist of fields
	// for starter-content 'posts' entries, and meta_input isn't one of
	// them, so it would be silently dropped before it ever reached the
	// page. Zakra_Starter_Content::set_home_page_meta() sets both directly
	// once the page's real ID is known — see its docblock.
);
