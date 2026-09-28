<?php 
add_action('wpcf7_admin_init','csfcf7_country_select_tag_generator');
function csfcf7_country_select_tag_generator($post){
    if (!class_exists('WPCF7_TagGenerator')) {
        return;
    }
    $tag_generator = WPCF7_TagGenerator::get_instance();
    $tag_generator->add( 'country_select', __( 'country_select', 'country-select-field-with-contact-form-7' ) , 'csfcf7_tag_generator_country', array('version'=>2) );
}

function csfcf7_tag_generator_country($contact_form, $args = '' ){
	$args = wp_parse_args( $args, array() );
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'country_select';
	$description = __( "Generate a form-tag for a country select.", 'country-select-field-with-contact-form-7' );
	?>
		<header class="description-box">
      <h3>country_select form tag generator</h3>
      <p>Generate a form-tag for a Input woocommerce order dropdown.</p>
    </header> 
    <div class="control-box">
      <fieldset>
        <legend>
          Field type
        </legend>
        <input type="hidden" data-tag-part="basetype" value="country_select" >
        <label>
        <input type="checkbox" data-tag-part="type-suffix" value="*">This is a required field.</label>
      </fieldset> 
      <fieldset>
        <legend>Name</legend>
        <input type="text" data-tag-part="name" pattern="[A-Za-z][A-Za-z0-9_\-]*">
      </fieldset>
      <fieldset >
        <legend>Id</legend>
        <input type="text" data-tag-part="option" data-tag-option="id:" value="">
      </fieldset>
      <fieldset>
        <legend>Class</legend>
        <input type="text" data-tag-part="option" data-tag-option="class:" value="" pattern="[A-Za-z0-9_\-\s]*" >
      </fieldset>
      <fieldset>
      	<legend>Default Country Attribute</legend>
      	<input type="text" data-tag-part="option" data-tag-option="default_country:" class="country_default_country">
      </fieldset>
      <fieldset>
      	<legend>Only Countries Attribute</legend>
      	<input type="text" data-tag-part="option" data-tag-option="only_countries:" class="country_only_countries" disabled>
      	<p class="description">
      		Display only these countries <br/> (e.g. us-ca)
      	</p>
      	<label class="csfwcf7_comman_link">
      		<?php echo __('This Option Available in ','country-select-field-with-contact-form-7');?> 
      		<a href="https://topsmodule.com/product/country-dropdown-for-contact-form-7/" target="_blank">
      			Pro Version 
      		</a>
      	</label>
      </fieldset>
      <fieldset>
      	<legend>Preferred Countries Attribute</legend>
      	<input type="text" data-tag-part="option" data-tag-option="preferred_countries:" class="country_preferred_countries" disabled>
      	<p class="description">
      		The countries at the top of the list. <br/> (e.g. us-gb-ch)
      	</p>
      	<label class="csfwcf7_comman_link">
      		<?php echo __('This Option Available in ','country-select-field-with-contact-form-7');?> 
      		<a href="https://topsmodule.com/product/country-dropdown-for-contact-form-7/" target="_blank">
      			Pro Version 
      		</a>
      	</label>
      </fieldset>
      <fieldset>
      	<legend>Exclude Countries</legend>
      	<input type="text" data-tag-part="option" data-tag-option="exclude_countries:" class="country_select_countries" disabled>
      	<p class="description">
      		To hide these countries <br/> (e.g. br-cx-eg)
      	</p>
      	<label class="csfwcf7_comman_link">
      		<?php echo __('This Option Available in ','country-select-field-with-contact-form-7');?> 
      		<a href="https://topsmodule.com/product/country-dropdown-for-contact-form-7/" target="_blank">
      			Pro Version 
      		</a>
      	</label>
      </fieldset>
    </div>
		<div class="insert-box">
      <div class="flex-container">
        <input type="text" class="code" readonly="readonly" onfocus="this.select();" data-tag-part="tag">
        <div class="submitbox">
          <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'country-select-field-with-contact-form-7' ) ); ?>" />
        </div>
      </div/>
      <p class="mail-tag-tip">
        <label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'country-select-field-with-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
        </label>
      </p>
    </div>
	<?php
}

?>