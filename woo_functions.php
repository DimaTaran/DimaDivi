<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// autoload Classes
require_once('vendor/autoload.php');


use Classes\GeneralClasses;
use Classes\LoopExtensions;
use Classes\CustomEnqueueStyles;
use Classes\CustomTaxonomy;

$global_tax_list = ['weight' => 'Масса',];
define('TAXONOMY_LIST', $global_tax_list);

require_once('cart_func/free_ship_display.php');


$CustomEnqueueStyles = new CustomEnqueueStyles();
$ProductObject = new CustomTaxonomy();
$LoopProductObject = new LoopExtensions();


add_action( 'wp_enqueue_scripts', array($CustomEnqueueStyles, 'custom_manage_woo_styles'), 99 );
add_action( 'et_header_top', array($CustomEnqueueStyles, 'add_mobile_search'), 20 );
add_action('woocommerce_after_shop_loop_item_title', array($LoopProductObject, 'attr_to_loop'), 12 );


//  free_shipping_amount_shortcode do
$free_shop_amount = new WC_Shipping_Free_Shipping(1);
$GeneralClasses = new GeneralClasses($free_shop_amount);




//add_action( 'init', array($ProductObject, 'rabitos_pa_taxonomy'), 0 );

// new terms to single product
//add_action( 'init', array($ProductObject, 'new_terms_single_product_pa_weight'), 1 );
//add_action( 'woocommerce_single_product_summary', array($ProductObject, 'new_terms_single_product_pa_weight'), 1 );






//if( is_admin() ) {
//    add_action( 'init', array($ProductObject, 'add_new_term_to_pa_weight'), 10 );
//}



//add_action( 'woocommerce_single_product_summary', 'display_product_short_info', 25 );
//add_action('init','update_my_metadata');
function display_product_short_info(){

//    $args = array(
//        'post_type' => 'product', // Only get the product
//        'post_status' => 'publish', // Only the posts that are published
//        'posts_per_page'   => -1 // Get every post
//    );
//    $posts = get_posts($args);
//    foreach ( $posts as $post ) {
//        // Run a loop and update every meta data
//        $price =  get_post_meta( $post->ID, 'price', true );
//        update_post_meta( $post->ID, '_regular_price', $price );
//        update_post_meta( $post->ID, '_price', $price );
//    }
//
//    if ( $product->has_weight() ) {
//        echo $product->get_weight();
//    }
    global $post;
    $weight = get_post_meta($post->ID, '_weight', true);

    if ( $weight ) {
        $term_for_add = $weight . ' г';
    } else $term_for_add = 5;
    $product_attributes = get_post_meta( $post->ID, '_product_attributes', true );

    $product_attributes['pa_weight'] = [
        'name'=>'pa_weight',
        'value'=>$term_for_add,
        'is_visible' => '1',
        'is_variation' => '1',
        'is_taxonomy' => '0'

    ];
    var_dump($product_attributes);

    update_post_meta( $post->ID,'_product_attributes',  $product_attributes);
//    var_dump( get_post_meta( $post->ID, '_product_attributes', true ) );

}




