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


    public function free_shipping_amount_shortcode()
    {
	return $this->free_shop_amount->min_amount;
    }

    public function init_shortcode()
    {
        add_shortcode( 'free_shipping_amount', array( $this , 'free_shipping_amount_shortcode' ) );
    }


}