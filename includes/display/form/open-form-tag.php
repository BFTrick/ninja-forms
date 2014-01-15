<?php

function ninja_forms_register_display_open_form_tag() {
	add_action( 'ninja_forms_display_open_form_tag', 'ninja_forms_display_open_form_tag' );
}
add_action( 'init', 'ninja_forms_register_display_open_form_tag' );

function ninja_forms_display_open_form_tag( $form_id ) {

	$form_row = ninja_forms_get_form_by_id( $form_id );

	if ( isset ( $form_row['data']['ajax'] ) ) {
		$ajax = $form_row['data']['ajax'];
	} else {
		$ajax = 0;
	}

	if ( $ajax == 1 ) {
		$url = admin_url( 'admin-ajax.php' );
		$url = add_query_arg( 'action', 'ninja_forms_ajax_submit', $url );
		//$url = add_query_arg('action', 'test', $url);
	} else {
		$url = '';
	}

	$display = apply_filters( 'ninja_forms_display_form_visibility', 1, $form_id );

	$hide_class = "";
	if ( 1 != $display ) {
		$hide_class = " ninja-forms-no-display";
	}

	$form_class = '';

	$form_class = apply_filters( 'ninja_forms_form_class', $form_class, $form_id );

	if ( ! empty( $form_class ) ) {
		$form_class = ' ' . $form_class;
	}

	// prep data for template
	$form_classes = "ninja-forms-form" . $form_class . $hide_class;
	$form_id = 'ninja_forms_form_' . $form_id;

	// load template
	ninja_forms_get_template( 'form/open-form-tag.php', array( 'form_id' => $form_id, 'form_classes' => $form_classes, 'url' => $url ) );

}