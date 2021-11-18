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


/** 
 * Remove on single product panel 'Additional Information' since it already says it on tab.
 */
function kawaispain_product_additional_information_heading() {
    echo '';
}

add_filter('woocommerce_product_additional_information_heading', 'kawaispain_product_additional_information_heading');
 
/** 
 * Remove on single product panel 'Additional Information' since it already says it on tab.
 */
function kawaispain_product_description_heading() {
    echo '';
}

add_filter('woocommerce_product_description_heading', 'kawaispain_product_description_heading');
