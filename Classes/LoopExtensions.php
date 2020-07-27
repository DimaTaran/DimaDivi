<?php


namespace Classes;

/*
 * Class for extension loop display
 */
class LoopExtensions
{
    public function __construct()
    {
        add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 11 );
    }

    //attrib for display
    public $attributes = ['sort' => 'Вид', 'brand' => 'Бренд', 'cocao-value' => 'Содержание какао'];

    public function get_term_string($product, $name_term, $taxonomy_name) {
        $var_name = 'term_' . $name_term;
        $$var_name = wp_get_post_terms( $product->get_id(), $taxonomy_name, array() );
        $name_term = [];
        foreach ( $$var_name as $term) {
            $name_term[]= $term->name ;
        }
        return implode(', ', $name_term);
    }


   public function attr_to_loop() {
        global $product;
        ?>
        <table class="woocommerce-product-attributes shop_attributes">
        <?php  foreach ($this->attributes as $attribute => $tex_label) {
            if (  $$attribute = $this->get_term_string( $product, $attribute, 'pa_'.$attribute ) ) { ?>
           <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_grape-varieties">
                <th class="woocommerce-product-attributes-item__label"><?php echo $tex_label; ?>:</th>
                <td class="woocommerce-product-attributes-item__value"><?php echo $$attribute; ?></td>
           </tr>
           <?php
            }
        } if ( $product->has_weight() ) { ?>
            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
                <th class="woocommerce-product-attributes-item__label"><?php _e('Weight', 'woocommerce') ?>:</th>
                <td class="woocommerce-product-attributes-item__value"><?php echo $product->get_weight() .  get_option('woocommerce_weight_unit') ; ?></td>
            </tr>
           <?php } ?>
        </table>
        <?php
    }

}

