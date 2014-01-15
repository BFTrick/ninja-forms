<?php
add_action('init', 'ninja_forms_register_display_close_form_tag');
function ninja_forms_register_display_close_form_tag(){
	add_action('ninja_forms_display_close_form_tag', 'ninja_forms_display_close_form_tag');
}

function ninja_forms_display_close_form_tag($form_id){
	
	// load the closing form template
	ninja_forms_get_template( 'form/close-form-tag.php' );
}