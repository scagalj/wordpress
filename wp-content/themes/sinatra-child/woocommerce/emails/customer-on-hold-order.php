<?php
/**
 * Customer on-hold order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Pozdrav %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<p><?php printf(esc_html__('Narudžba #%s, je uspiješno zaprimljena!', 'woocommerce'), esc_html($order->get_order_number())); ?></p>
<p>
    Detalji o narudžbi i plaćanju nalaze se na sljedećem linku. 
    Nakon zaprimljene uplate započet ćemo s izradom Vaše narudžbe. 
</p>
<p>
    Uplatu možete izvržiti uplatom na IBAN ili skeniranjem bar koda. 
</p>

<a href="<?php echo $order->get_checkout_order_received_url() ?>" target="_blank">
    <button class="order_payment_details" style="border-radius: 5px; border-color: #96588a; color: #96588a; font-size: 12pt; padding: 10px;font-weight: 700;width: 100%;
    margin: 15px 0px 50px 0px;cursor: pointer; ">DETALJI O NARUDŽBI I PLAĆANJU</button>
</a>
<span style="font-size: 10pt; margin-bottom: 15px;">*Da bi ubrzali proces izrade Vaše narudžbe možete nam poslat potvrdu o uplati na e-mail.</span>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
