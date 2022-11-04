<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */
defined('ABSPATH') || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
    return;
}

$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads = $order->get_downloadable_items();
$show_downloads = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
    wc_get_template(
            'order/order-downloads.php',
            array(
                'downloads' => $downloads,
                'show_title' => true,
            )
    );
}
?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bcmath-min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/pdf417-min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/BarcodePayment.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function () {


        // Initialize the library
        BarcodePayment.Init({
            ValidateIBAN: false, // Validation is not yet implemented
            ValidateModelPozivNaBroj: true // Validation is not yet implemented
        });
        GenerirajBarkod();
    });

    function GetPaymentParams() {
        var paymentParams = new BarcodePayment.PaymentParams();

        paymentParams.Iznos = '<?php echo number_format($order->get_total(), 2, ',', ''); ?>';
        paymentParams.ImePlatitelja = '';
        paymentParams.AdresaPlatitelja = ''
        paymentParams.SjedistePlatitelja = '';
        paymentParams.Primatelj = 'Stjepan Cagalj'
        paymentParams.AdresaPrimatelja = 'Cetvrt vrilo 5'
        paymentParams.SjedistePrimatelja = '21310 Omis'
        paymentParams.IBAN = 'HR5524070003234227868';
        paymentParams.ModelPlacanja = '99';
        paymentParams.PozivNaBroj = '';
        paymentParams.SifraNamjene = 'OTHR';
        paymentParams.OpisPlacanja = '<?php printf(esc_html__('%s-%s', 'framesforyou'), esc_html($order->get_order_number()), esc_html($order->get_billing_first_name())) ?>';

        return paymentParams
    }

    function HandleValidation(paymentParams) {
        var result = BarcodePayment.ValidatePaymentParams(paymentParams);
    }

    var StringNotDefinedOrEmpty = function (str) {
        return str == undefined || str == null || str.length == 0;
    }

    function GenerirajBarkod() {
        var generateBarcode = true;
        var paymentParams = GetPaymentParams();
        var textToEncode = BarcodePayment.GetEncodedText(paymentParams);

        if (textToEncode == BarcodePayment.ResultCode.InvalidContent) {
            HandleValidation(paymentParams);
            generateBarcode = false;
            alert('Sadržaj forme nije ispravan za generiranja barkoda');
        } else if (textToEncode == BarcodePayment.ResultCode.InvalidObject || StringNotDefinedOrEmpty(textToEncode)) {
            alert('Došlo je do greške kod generiranja barkoda');
            generateBarcode = false;
        }

        // Barcode generation sample copied from library sample
        PDF417.init(textToEncode);
        var barcode = PDF417.getBarcodeArray();
        // block sizes (width and height) in pixels
        var bw = 2;
        var bh = 2;
        // create canvas element based on number of columns and rows in barcode
        var container = document.getElementById('barcode');
        if (container.firstChild) {
            container.removeChild(container.firstChild);
        }
        var canvas = document.createElement('canvas');
        canvas.width = bw * barcode['num_cols'];
        canvas.height = bh * barcode['num_rows'];
        container.appendChild(canvas);

        if (generateBarcode) {
            var ctx = canvas.getContext('2d');
            // graph barcode elements
            var y = 0;
            // for each row
            for (var r = 0; r < barcode['num_rows']; ++r) {
                var x = 0;
                // for each column
                for (var c = 0; c < barcode['num_cols']; ++c) {
                    if (barcode['bcode'][r][c] == 1) {
                        ctx.fillRect(x, y, bw, bh);
                    }
                    x += bw;
                }
                y += bh;
            }
        }

//        const img = canvas.toDataURL('image/png');
//        document.getElementById('barcodeedisplay').src = img;
//        document.getElementById('x_barcodeedisplay').src = img;
//        document.getElementById('barcodeedisplaytes').innerHTML += img;

    }

</script>

<style>
    li p{
        margin: 0px !important;
    }

    .paymentDetails{
        margin: 0px !important;
        padding-bottom: 5px !important;
    }

    .woocommerce table.shop_table th, .woocommerce table.shop_table td {
        padding: 10px 12px !important;
    }

</style>

<section class="woocommerce-order-details">

    <?php do_action('woocommerce_order_details_before_order_table', $order); ?>

    <h2 class="woocommerce-order-details__title"><?php esc_html_e('Order details', 'woocommerce'); ?></h2>

    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

        <thead>
            <tr>
                <th class="woocommerce-table__product-name product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
                <th class="woocommerce-table__product-table product-total"><?php esc_html_e('Total', 'woocommerce'); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php
            do_action('woocommerce_order_details_before_order_table_items', $order);

            foreach ($order_items as $item_id => $item) {
                $product = $item->get_product();

                wc_get_template(
                        'order/order-details-item.php',
                        array(
                            'order' => $order,
                            'item_id' => $item_id,
                            'item' => $item,
                            'show_purchase_note' => $show_purchase_note,
                            'purchase_note' => $product ? $product->get_purchase_note() : '',
                            'product' => $product,
                        )
                );
            }

            do_action('woocommerce_order_details_after_order_table_items', $order);
            ?>
        </tbody>

        <tfoot>
            <?php
            foreach ($order->get_order_item_totals() as $key => $total) {
                ?>
                <tr>
                    <th scope="row"><?php echo esc_html($total['label']); ?></th>
                    <td><?php echo ( 'payment_method' === $key ) ? esc_html($total['value']) : wp_kses_post($total['value']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped    ?></td>
                </tr>
                <?php
            }
            ?>
            <?php if ($order->get_customer_note()) : ?>
                <tr>
                    <th><?php esc_html_e('Note:', 'woocommerce'); ?></th>
                    <td><?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?></td>
                </tr>
            <?php endif; ?>
        </tfoot>
    </table>

    <h2 class="woocommerce-order-details__title"><?php esc_html_e('Payment details', 'framesforyou'); ?></h2>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

            <p class="paymentDetails"><?php esc_html_e('Plačanje možete izvršiti uplatnom na sljedeći IBAN i pripadajućim podacima ili skeniranjem bar koda.', 'framesforyou'); ?></p>
            <p class="paymentDetails"> <b>Obrt za usluge i trgovinu vl. Maria Budić</b></p>
            <p class="paymentDetails"><b>Lisičina 2, 10000 Omiš</b></p>
            <p class="paymentDetails"><b>HR1231231231323123</b></p>
            <!--<p><b>Iznos: <?php printf(number_format($order->get_total(), 2, ',', '')); ?></b></p>-->
            <p class="paymentDetails"><b>Opis plaćanja: <?php printf(esc_html__('%s-%s', 'framesforyou'), esc_html($order->get_order_number()), esc_html($order->get_billing_first_name())) ?></b></p>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="text-align: center; padding-top: 15px;">
            <div id="barcode"></div>
        </div>

    </div>

    <?php do_action('woocommerce_order_details_after_order_table', $order); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
    wc_get_template('order/order-details-customer.php', array('order' => $order));
}
