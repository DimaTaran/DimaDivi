<?php


namespace DimaDivi\Classes;


class Telegram
{
    private $token;
    private $userID;
    public $send_mode;
//    private $telegram_options = ['divi_telegram_api_key', 'divi_telegram_chat_id' , 'divi_send_on_telegram'];

    public function __construct()
    {
        $this->token =  get_option('divi_telegram_api_key');
        $this->userID =  get_option('divi_telegram_chat_id');
        $this->send_mode =  get_option('divi_send_on_telegram');
    }

    public function sendMessages( $order_id )
    {
        if ( $this->isSent() ) {
            $this->toTelegram( $order_id );
        }

    }

    /**
     * @return bool|\WC_Order|\WC_Order_Refund|\WC_Refund
     */
    private function getOrder( $order_id )
    {
        $order = wc_get_order( $order_id );
        if ( ! $order ) {
            return;
        }
        return $order;
    }

    private function getUser( $order_id )
    {
        $order = $this->getOrder( $order_id );
        $user_info = '';

        $user_info .= 'Имя: ' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . ' ';
        $user_info .= 'Тел: ' .  $order->get_billing_phone() . ' ';
        $user_info .= 'Город: ' .  $order->get_billing_city() . ' ';
        $user_info .= 'НП: ' .  $order->get_meta('_billing_new_fild11') . ' ';
        $user_info .= esc_html__('Payment method:', 'woocommerce') . ' ' .  $order->get_payment_method_title() . ' ';
        unset( $order );
        return  $user_info;
    }

    private function getProduct( $order_id )
    {
        $order = $this->getOrder( $order_id );

        $order_items  = $order->get_items();
        $text_product = '';
        $i = 0;

        foreach ( $order_items as $item_id => $item ) {
            $product = $item->get_product();
            $text_product .= ++$i . '. ' . $product->get_name() . ' ' . $item->get_quantity() . ' шт' . PHP_EOL;
        }
        unset($order);
        unset($i);
        return $text_product;
    }

    private function getToken()
    {
        return $this->token;
    }
    private function getUserID()
    {
        return $this->userID;
    }

    private function getSentMode()
    {
        return $this->send_mode;
    }
    private function isSent()
    {
        if ( $this->getSentMode() == 'on') {
            return true;
        } else return false;

    }

    private function toTelegram( $order_id )
    {
        $txt = urlencode($this->getUser( $order_id ) . PHP_EOL . $this->getProduct( $order_id ) );
        $token = $this->getToken();
        $user_id = $this->getUserID();
        $result = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$user_id}&parse_mode=html&text={$txt}","r" );
    }

}