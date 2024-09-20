<?php

add_action( 'admin_menu', 'marketo_options_page' );
add_action( 'admin_init',  'marketo_register_settings' );
 
function marketo_register_settings(){
    
    register_setting(
        'marketo_settings', // settings group name
        'number_of_marketo_params', // option name
        'absint' // sanitization function
    );

    add_settings_field(
        'number_of_marketo_params',
        'Number of Parameters',
        'marketo_number_of_marketo_params_field', // function which prints the field
        'marketo-options', // page slug
        'marketo_settings_section_primary', // section ID
        array( 
            'label_for' => 'number_of_marketo_params',
            'class' => 'marketo-field', // for <tr> element
        )
    );

    add_settings_section(
		'marketo_settings_section_primary', // section ID
		'', // title (if needed)
		'', // callback function (if needed)
		'marketo-options' // page slug
	);

    $number_of_marketo_params = get_option( 'number_of_marketo_params' );

    for($i = 0; $i < $number_of_marketo_params; $i++){
        register_setting(
            'marketo_settings', // settings group name
            'utm_param_' . $i, // option name
            'sanitize_text_field' // sanitization function
        );
        register_setting(
            'marketo_settings', // settings group name
            'marketo_field_name_' . $i, // option name
            'sanitize_text_field' // sanitization function
        );

        add_settings_section(
            'marketo_settings_section_' . $i, // section ID
            '', // title (if needed)
            '', // callback function (if needed)
            'marketo-options' // page slug
        );

        add_settings_field(
            'utm_param_' . $i,
            'UTM Parameter ' . ($i + 1),
            'marketo_utm_param_field', // function which prints the field
            'marketo-options', // page slug
            'marketo_settings_section_' . $i, // section ID
            array( 
                'label_for' => 'marketo_utm_param_field_' . $i,
                'class' => 'marketo-field', // for <tr> element
                'index' => $i
            )
        );

        add_settings_field(
            'marketo_field_name_' . $i,
            'Marketo Field Name ' . ($i + 1),
            'marketo_field_name_field', // function which prints the field
            'marketo-options', // page slug
            'marketo_settings_section_' . $i, // section ID
            array( 
                'label_for' => 'marketo_field_name_' . $i,
                'class' => 'marketo-field', // for <tr> element
                'index' => $i
            )
        );
    }
 
}
 
function marketo_number_of_marketo_params_field(){
	$number_of_marketo_params = get_option( 'number_of_marketo_params' );
	printf(
		'<input type="number" id="number_of_marketo_params" name="number_of_marketo_params" value="%s" />',
		esc_attr( $number_of_marketo_params )
	);
}

function marketo_utm_param_field($args){
    $field = 'utm_param_' . $args['index'];
	$val = get_option( $field );
	printf(
		'<input type="text" id="'.$field.'" name="'.$field.'" value="%s" />',
		esc_attr( $val )
	);
}

function marketo_field_name_field($args){
    $field = 'marketo_field_name_' . $args['index'];
	$val = get_option( $field );
	printf(
		'<input type="text" id="'.$field.'" name="'.$field.'" value="%s" />',
		esc_attr( $val )
	);
}
 
function marketo_options_page() {
	add_menu_page(
		'Marketo/UTM Integrations', 
		'Marketo/UTM Integrations', 
		'manage_options', 
		'marketo-options', 
		'marketo_page_content', 
		'dashicons-star-half', 
		5 
	);
}
 
function marketo_page_content(){
 
	echo '<div class="wrap">
	<h1>Marketo/UTM Parameter Settings</h1>
	<form method="post" action="options.php">';
 
		settings_fields( 'marketo_settings' ); // settings group name
		do_settings_sections( 'marketo-options' ); // just a page slug
		submit_button();
 
	echo '</form></div>';
 
}