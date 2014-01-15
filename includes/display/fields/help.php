<?php
/**
 * Outputs the HTML of the help icon if it is set to display.
 *
**/

function ninja_forms_display_field_help( $field_id, $data ){
	$plugin_settings = get_option( 'ninja_forms_settings' );

	if( isset( $data['show_help'] ) ){
		$show_help = $data['show_help'];
	}else{
		$show_help = 0;
	}

	$help_text = '';
	if( isset( $data['help_text'] ) ) {
		$help_text = htmlentities( $data['help_text'] );
	}

	// only proceed if we're supposed to show the help field
	if( $show_help ) {

		// get the help image
		$img_src = NINJA_FORMS_URL . '/images/question-ico.gif';

		// load the help image template
		ninja_forms_get_template( 'fields/help.php', array( 'img_src' => $img_src, 'help_text' => $help_text ) );
	}
}	

add_action( 'ninja_forms_display_field_help', 'ninja_forms_display_field_help', 10, 2 );