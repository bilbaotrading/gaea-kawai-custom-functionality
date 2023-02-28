<?php
/**
 * Plugin Name: Kawai Custom Functionality
 * Version: 0.1-alpha
 * Description: Implementa las funcionalidades especificas para la página de kawaispain.com
 * Author: Gaby Molina Goigoux
 * Author URI: gabymg.com
 * Text Domain: kawai_custom_functionality
 * Domain Path: /languages
 * @package Kawai_custom_functionality
 */
require 'post-types/technology.php';
require 'post-types/testimonial.php';

function kawaispain_custom_date_format( $date_format ) {
    $date_format = "Y"; // will print the date as 2014
    return $date_format;
}

add_filter( 'timeline_express_custom_date_format' , 'kawaispain_custom_date_format' , 10 );

/******************************************************************************
 *
 * WOOCOMMERCE
 *
 *****************************************************************************/

/*
 * Rename 'Additional Infomation' tab heading text
 *
 * See https://www.pivotaltracker.com/story/show/184577481 for more information.
 */
add_filter( 'woocommerce_product_tabs', 'gaea_woo_rename_tabs', 98 );

function gaea_woo_rename_tabs( $tabs ) {
    $tabs[ 'additional_information' ][ 'title' ] = 'Especificaciones' ;

    return $tabs;
}

/******************************************************************************
 *
 * GRAVITY FORMS VALIDATION
 *
 *****************************************************************************/

function is_serialnumber( $serial_number ) {
    return false;
}

function kawaispain_validation_tech_support( $validation_result ) {
    $form = $validation_result[ 'form' ];

    foreach( $form['fields'] as &$field ) {
    	if( strpos( $field->cssClass, 'validate-serialnumber' ) === true ) {
		$serial_number = rgpost( "input_{$field['id']}" );
		
		$is_valid = is_serialnumber( $serial_number );

		if( !$is_valid ) {
			$validation_result[ 'is_valid' ] = false;

			$field->failed_validation = true;
			$field->validation_message = 'Has inroducido un número de serie incorrecto';
		}	
	}
    }

    $validation_result[ 'form' ] = $form;
    return $validation_result;
}

add_filter( 'gform_validation_2', 'kawaispain_validation_tech_support' );
