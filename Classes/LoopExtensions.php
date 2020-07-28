<?php


namespace Classes;

/*
 * Class for extension loop display
 */
class LoopExtensions
{
    public function __construct()
    {
        // Add buttom  add to cart action
        add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 11 );
        add_action('woocommerce_after_shop_loop', array($this, 'archiveTextFooter'), 12 );
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

    public function archiveTextFooter()
    {
        if ( is_tax( 'pa_cocao-value', 'cocoa-100' ) ) {
            ?>
            <div class="faq-desc" itemscope itemtype="https://schema.org/FAQPage">
                <h3 class="main-faq-title">Дополнительная информация:</h3>
                <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h2 class="faq-title" itemprop="name">🍫 100-процентный шоколад vs шоколад 100% какао</h2>
                    <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <div class="faq-text" itemprop="text">
                            <p>Иногда в описании шоколада проскакивает фраза «стопроцентный шоколад», по которой понимается, что это именно оригинальный шоколад, например 100%-й швейцарский шоколад или стопроцентный бельгийский шоколад. Это означает, что шоколад был произведен именно в Швейцарии, а не был привезен в Украину большим куском и сформирован вручную здесь. Или даже плитки были сделаны в Украине, но использовалось шоколадное сырье именно из конкретной страны.
                            <p>В противовес этому определению есть шоколад со 100% содержанием какао. Здесь имеется в виду, что в состав шоколада входит только продукты дерева какао: тертые какао-бобы и какао-масло без каких-либо добавок. Естественно, этот шоколад для гурманов или для кондитерских изделий. Аромат и вкус будут отличаться в зависимости от места произрастания какао. Как и с вином, вкус определяется апелласьоном.

                        </div>
                    </div>
                </div>
            </div>
            <?php



        }


    }

}

