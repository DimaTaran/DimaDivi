<?php


namespace Classes;


class GeneralClasses
{
    public $free_shop_amount;

    public function __construct($free_shop_amount)
    {
        $this->free_shop_amount = $free_shop_amount;
        $this->init_shortcode();
    }

    public function init()
    {
        // display attributes in  menu
        add_filter('woocommerce_attribute_show_in_nav_menus', array( $this, 'attrForMenus' ), 1, 2);
        //Add chaeccked on checkout page to terms
        add_filter('woocommerce_terms_is_checked_default',  array( $this, 'termsChecked' ) );


    }


    public function free_shipping_amount_shortcode()
    {
	return $this->free_shop_amount->min_amount;
    }

    public function init_shortcode()
    {
        add_shortcode( 'free_shipping_amount', array( $this , 'free_shipping_amount_shortcode' ) );
    }

    public function termsChecked( $isset )
    {
        if ( $isset != true ) {
            return true;
        } else return $isset;
    }

    public function attrForMenus( $register, $name = '' )
    {
        foreach (MENU_LIST as $item) {
            if ( $name == 'pa_' . $item ) $register = true;
        }
        return $register;
    }


}