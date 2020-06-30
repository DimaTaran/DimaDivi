<?php


namespace Classes;


class CustomTaxonomy
{

   public function rabitos_pa_taxonomy()
    {
        foreach ( TAXONOMY_LIST as $tax => $name) {
            //Register custom pa_taxonomy

            if ( ! wc_check_if_attribute_name_is_reserved( $tax ) ) {
                $attr_tax_name = 'arg_attr_' . $tax;
                $$attr_tax_name = [
                    'name' => $name,
                    'slug' => $tax,
                ]; } else {
                $attr_tax_name = 'arg_attr_' . $tax;
                $$attr_tax_name = [
                    'name' => ${'labels_' . $tax},
                    'slug' => '_' .$tax,
                ];
            }

            $slug = ${$attr_tax_name}['slug'];
            $tax_name = wc_attribute_taxonomy_name( $slug );
            $tax_id = wc_attribute_taxonomy_id_by_name( $tax_name );
            $bool_attr = taxonomy_exists( $tax_name );
            if ( ! $tax_id  ) {
                //Registeк custom attribute
            wc_create_attribute( $$attr_tax_name );
            }
        }
    }

    public function new_terms_single_product_pa_weight() {
        //get global array of attributes for terms

       global $post;
       $weight = get_post_meta($post->ID, '_weight', true);

        if ( $weight ) {
            $term_for_add = $weight . ' г';
        } else { $term_for_add = '100 г'; }
        $glob_key = 'pa_weight';
        $glob_value = "Масса";
        $term_desc = 'Шоколад ' .  $glob_value . ' ' .  $term_for_add;
        $slug = $weight.'-g';


        $term_arr = term_exists($term_for_add, $glob_key);
//                update or create new term of pa_
                if ( $term_arr != null ) {
                wp_update_term($term_arr['term_id'], $glob_key, array(
                    'slug' => $slug,
                    'description' => $term_desc,
                ));
                } else {
                    $term_arr = wp_insert_term(
                        $term_for_add,  // новый термин
                        $glob_key, // таксономия
                        array(
                            'slug' => $slug,
                            'description' => $term_desc,
                            'parent' => 0
                        )
                    );
                }
        add_attribute();
        $result = wp_set_post_terms($post->ID, $term_for_add, $glob_key);
        $result = wp_set_object_terms( $post->ID, $term_arr['term_id'], $glob_key );

    }


    // 1 time use
    public function add_new_term_to_pa_weight(){

       //get global array of attributes for terms
        $global = [];
        foreach (TAXONOMY_LIST as $tax => $name) {

            if ( !wc_check_if_attribute_name_is_reserved( $tax ) ) {
                $tax_pa = 'pa_' . $tax;
            } else {
                $tax_pa = 'pa__' . $tax;
            }
            // for taxonomy use $tax for attribute use $tax_pa
            $global[$tax_pa] = $name;
        }

        //get all product
        $args = array(
            'post_type' => 'product', // Only get the product
            'post_status' => 'publish', // Only the posts that are published
            'posts_per_page'   => -1 // Get every post
        );
        $products = get_posts($args);

        foreach ( $products as $product ) {
            $weight = get_post_meta($product->ID, '_weight', true);

            if ( $weight ) {
                $term_for_add = $weight . ' г';
            } else { $term_for_add = '100 г'; }

            foreach ($global as $glob_key => $glob_value) {

                $term_desc = 'Шоколад ' .  $glob_value . ' ' .  $term_for_add;
                $slug = $weight.'-g';

//                $term_arr = term_exists($slug, $glob_key);
////                update or create new term of pa_
//                if ( $term_arr ) {
//                wp_update_term($term_arr['term_id'], $glob_key, array(
//                    'name' => $term_for_add,
//                    'slug' => $slug,
//                    'description' => $term_desc,
//                ));
//                } else {
//                    $term_arr =  wp_insert_term(
//                    $term_for_add,  // новый термин
//                    $glob_key, // таксономия
//                    array(
//                        'slug' => $slug,
//                        'description' => $term_desc,
//                        'parent' => 0
//                    )
//                );
//                }

                    //  connect product(post) with term

//                $term_taxonomy_ids = wp_set_object_terms( $product->ID, $term_for_add, 'pa_weight', true );

                    // update via custom fields
                $product_attributes = get_post_meta( $product->ID, '_product_attributes', true );

                $product_attributes['pa_weight'] = [
                    'name'=>'Масса',
                    'value'=>$term_for_add,
                    'is_visible' => '1',
                    'is_variation' => '1',
                    'is_taxonomy' => '0'

                ];
                update_post_meta( $product->ID,'_product_attributes', $product_attributes);


//                $tax_name = wc_attribute_taxonomy_name( 'weight' );
//                $term_arr = term_exists( $slug,  $tax_name );
//                if ( $term_arr ) {
//                    $result = wp_set_object_terms($product->ID,  $term_arr['term_id'], $tax_name);
////                    $result = wp_set_post_terms($product->ID, $term_for_add, $tax_name);
//                }



            }

        }
    }

}

