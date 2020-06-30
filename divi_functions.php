<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



use DiviClasses\Options;

$options = new Options();
add_action( 'wp_enqueue_scripts', array($options, 'custom_manage_woo_styles'), 99 );
//add_action('epanel_render_maintabs', 'add_liberty_liberty_epanel_tab');