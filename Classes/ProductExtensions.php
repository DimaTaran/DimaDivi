<?php


namespace DimaDivi\Classes;


class ProductExtensions
{

    public function init()
    {
        //Add a custom product data tab
        add_filter( 'woocommerce_product_tabs', array( $this, 'woo_new_product_tab' ) );

    }


    /**
     * Add a custom product data tab
     */
    public function woo_new_product_tab( $tabs ) {

        // Adds the new tab

        $tabs['faq'] = array(
            'title' 	=> __( 'Упаковка и доставка', 'woocommerce' ),
            'priority' 	=> 50,
            'callback' 	=> array ( $this, 'display_faq_info' )
        );

        return $tabs;
    }


    public function display_faq_info(){

        ?>
        <div class="faq-desc" itemscope itemtype="https://schema.org/FAQPage">
            <h3 class="main-faq-title">Часто задаваемые вопросы:</h3>
            <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h2 class="faq-title" itemprop="name">🍫 Как осуществляется упаковка?</h2>
                <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p class="faq-text" itemprop="text">
                        Все шоколадные изделия упаковываются так, чтобы уменьшить влияние температуры окружающей среды. Перед отправкой они хранятся в прохладном месте, оборачиваются стрейч пленкой и упаковываются в картонную коробку.
                        Это дает возможность полностью избежать влияний перепадов температур.
                    </p>
                </div>
            </div>
            <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h2 class="faq-title" itemprop="name">🍫 Как быстро осуществляется доставка?</h2>
                <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p class="faq-text" itemprop="text">
                        В течение дня происходит обработка заказов и если нет каких-то особых условий, то посылка по Новой почте отправляется на следуюущий день утром.
                        Доставка на ваше отделение Новой почты происходит согласно расписанию компании, но в большинстве случаев это на следующий день.
                        Доставка на отделение УкрПочты примерно 2-3 дня. Justin – согласно графику компании (1-2 дня).
                    </p>
                </div>
            </div>



        </div>
        <?php
    }

}