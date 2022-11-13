<?php
require 'calculatePrice.php';

//Obvezna polja za dodat
//----TAGOVI:
// SetOfOne - setofone
// SetOfTwo - setoftwo
// SetOfThree - setofthree
// Custom - custom
//Izmejna u SMTP - MAIL SENDER za multiple sendiblue accounts: wp-content/plugins/wp-mail-smtp/src/Providers/Sendinblue/Api.php
//private static $mailAPIKey2='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';
//protected function get_api_config() {
//
//            $num = rand(1,2);
//            
//            if ($num == 1) {
//                return Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
//            }
//            return Configuration::getDefaultConfiguration()->setApiKey('api-key', isset($this->options['api_key']) ? $this->options['api_key'] : '');
//        }


$TEST_CATEGORY_ID = 23;

//$BESTSELLING_CATEGORY_ID = 1;
//
//<editor-fold defaultstate="collapsed" desc="Metode za funkcioniranje child teme kao i css/js/icons">
//Child Theme Functions File
add_action("wp_enqueue_scripts", "enqueue_wp_child_theme");

function enqueue_wp_child_theme() {
    if ((esc_attr(get_option("childthemewpdotcom_setting_x")) != "Yes")) {
//This is your parent stylesheet you can choose to include or exclude this by going to your Child Theme Settings under the "Settings" in your WP Dashboard
        wp_enqueue_style("parent-css", get_template_directory_uri() . "/style.css");
    }

//This is your child theme stylesheet = style.css
    wp_enqueue_style("child-css", get_stylesheet_uri());

//This is your child theme js file = js/script.js
    wp_enqueue_script("child-js", get_stylesheet_directory_uri() . "/js/script.js", array("jquery"), "1.0", true);
}

// ChildThemWP.com Settings 
function childthemewpdotcom_register_settings() {
    register_setting("childthemewpdotcom_theme_options_group", "childthemewpdotcom_setting_x", "ctwp_callback");
}

add_action("admin_init", "childthemewpdotcom_register_settings");

//ChildThemeWP.com Options Page
function childthemewpdotcom_register_options_page() {
    add_options_page("Child Theme Settings", "FramesForYou Theme", "manage_options", "childthemewpdotcom", "childthemewpdotcom_theme_options_page");
}

add_action("admin_menu", "childthemewpdotcom_register_options_page");

function wpb_load_fa() {

    wp_enqueue_style('wpb-fa', get_stylesheet_directory_uri() . '/fonts/css/fontello.css');
    wp_enqueue_style('iconsPack', get_stylesheet_directory_uri() . '/fonts/css/iconspack.css');
}

add_action('wp_enqueue_scripts', 'wpb_load_fa');

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Metode koje se trenutno nigdje ne koriste">
//Trenutno se nigdje ne koristi
function showBestSellingFrames() {
    $result = "";
    $query = new WP_Query(array('category_name' => 'Best selling'));
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $splitedTextArray = explode("[FEATUREDIMAGES]", get_the_content());
            $postImages = $splitedTextArray[0];
            $postContent = $splitedTextArray[1];
            $result = $result . $postContent . ", ";
        }
    } else {
        $result = "No posts";
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    return $result;
}

function test_overwrite_fedex($rates, $package) {

    $cart = WC()->cart;
//    $cart_item_count = WC()->cart->get_cart_contents_count();
    $totalproductprice = 0;

    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $productPrice2 = $cart_item['data']->get_price();
        $imageSize = $cart_item['imageSize'];
        $frameType = $cart_item['frameType'];
        $setType = $cart_item['setType'];

        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];

        $totalproductprice = $totalproductprice + $productPrice2;
    }
    foreach ($rates as $rate) {

        if ($totalproductprice > 100 && $rate->label == 'Dostava') {
            continue;
        }

        //Set the price
        if ($rate->label == 'Dostava') {
            $rate->cost = $totalproductprice;
        }
    }

    return $rates;
}

// </editor-fold>

function fetchAllProductCategories() {

    $taxonomy = 'product_cat';
    $orderby = 'name';
    $show_count = 0;      // 1 for yes, 0 for no
    $pad_counts = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title = '';
    $empty = 0;

    $args = array(
        'taxonomy' => $taxonomy,
        'orderby' => $orderby,
        'show_count' => $show_count,
        'pad_counts' => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li' => $title,
        'hide_empty' => $empty
    );

    $all_categories = get_categories($args);
    return $all_categories;
}

//Na naslovnoj za prikaz liste proizvoda iz pojedine kategorije
function fetchCategoriesForName() {

//    'type' => 'external',
    $args = array(
        'limit' => 4,
        'category' => array('Hoodies')
    );
    $result = '';
    $products = wc_get_products($args);
    if (!empty($products)) {
        foreach ($products as $product) {
            $result .= createPostContentFomPost($product) . ' ';
        }
    }
    return $result;
}

//Na stranici webshop (Svi proizvodi) prikazuje se ispod slike
function woocommerce_template_loop_product_title() {
    echo '<div class="mt-2" style="text-align:center;">'
    . '<span style="color:black;" class="imageTitle">'
    . get_the_title()
    . '</span>'
    . '</div>';
}

//Na stranici webshop (Svi proizvodi) glavni dio sa slikom
function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

//Na stranici webshop (Svi proizvodi) dio povise title ispod slike
function woocommerce_template_loop_add_to_cart($args = array()) {
    echo '';
}

function woocommerce_template_loop_category_link_open($category) {
    echo '';
}

function woocommerce_template_loop_category_link_close() {
    echo '';
}

if (!function_exists('woocommerce_template_single_rating')) {

    /**
     * Output the product rating.
     */
    function woocommerce_template_single_rating() {
        if (post_type_supports('product', 'comments')) {
//			wc_get_template( 'single-product/rating.php' );
        }
    }

}

//Na stranici o pojedinog proizvoda, tabovi za Opis, Additional Info ...
if (!function_exists('woocommerce_default_product_tabs')) {

    /**
     * Add default product tabs to product pages.
     *
     * @param array $tabs Array of tabs.
     * @return array
     */
    function woocommerce_default_product_tabs($tabs = array()) {
        global $product, $post;

        // Description tab - shows product content.
        if ($post->post_content) {
            $tabs['description'] = array(
                'title' => __('Description', 'woocommerce'),
                'priority' => 10,
                'callback' => 'woocommerce_product_description_tab',
            );
        }

        // Additional information tab - shows attributes.
        if ($product && ( $product->has_attributes() || apply_filters('wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions()) )) {
            $tabs['additional_information'] = array(
                'title' => __('Additional information', 'woocommerce'),
                'priority' => 20,
                'callback' => 'woocommerce_product_additional_information_tab',
            );
        }

        // Reviews tab - shows comments.
//		if ( comments_open() ) {
//			$tabs['reviews'] = array(
//				/* translators: %s: reviews count */
//				'title'    => sprintf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ),
//				'priority' => 30,
//				'callback' => 'comments_template',
//			);
//		}

        return $tabs;
    }

}
//Metoda koja se poziva nalazi se u calculatePrice.php
add_filter('wc_price', 'span_custom_prc', 10, 5);

//Na stranici pojedinog proizoda, ispod cijene i opcija i dodavanja u kosaricu
//pojedini podaci o meta data tipa Quantity, Categories ...
if (!function_exists('woocommerce_template_single_meta')) {

    /**
     * Output the product meta.
     */
    function woocommerce_template_single_meta() {
//		wc_get_template( 'single-product/meta.php' );
    }

}

//Na naslovoj za kreiranje pojedinog posta o proizvodu.
function createPostContentFomPost($product) {
    $productPost = '<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 pr-2 imageContainerBestSellers">'
            . '<div class="imageContainerBestSellerImage shadowBox">';

    $images = $product->get_gallery_image_ids('view');
    $hasSecondImage = !empty($images);

    $productUrl = get_permalink($product->get_id());

    $productPost .= '<a href="' . $productUrl . '" >';
    if ($hasSecondImage) {
        $productPost .= createImageTagFromImageId($product->get_image_id(), null, null, null, 'imageBestSelling img-fluid hideOnHover', null);
    } else {
        $productPost .= createImageTagFromImageId($product->get_image_id(), null, null, null, 'imageBestSelling img-fluid', null);
    }

    if ($hasSecondImage) {
        $productPost .= createImageTagFromImageId($images[0], null, null, null, 'imageBestSelling img-fluid showOnHover', null);
    }

    $productPost .= '</a>';

    $productPost .= '<div class="imageDescription">'
            . generateProductDiscountHtml($product)
            . '<div class="mt-2" style="text-align:center;">'
            . '<a href="'
            . $productUrl . '">'
            . '<span style="color:black;" class="imageTitle">'
            . $product->get_name()
            . '</span>'
            . '</a>'
            . '</div>';


    $productPost .= generateProductPriceHtml($product);

    $productPost .= '</div></div></div>';

    return $productPost;
}

//Na naslovnoj za keneriranje kvadratica s popustom na proizvodu
function generateProductDiscountHtml($product) {
    if ($product->is_on_sale()) {
        $regular_price = (float) $product->get_regular_price(); // Regular price
        $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
        // "Saving Percentage" calculation and formatting
        $precision = 0; // Max number of decimals
        $saving_percentage = '-' . round(100 - ( $sale_price / $regular_price * 100 ), $precision) . ' %';

        return '<div class="discountAmountWrapper"><span class="discountAmountValue">' . $saving_percentage . '</span></div>';
    } else {
        return '';
    }
}

//Na naslovnoj za generiranje IMAGE taga za pojedini proizvod
function createImageTagFromImageId($imageId, $widht = null, $height = null, $id = null, $class = null, $style = null) {
    $imageTag = '<img ';

    if (!empty($id)) {
        $imageTag .= 'id="' . $id . '" ';
    }

    if (!empty($class)) {
        $imageTag .= 'class="' . $class . '" ';
    }

    $imageSrc = wp_get_attachment_image_src($imageId, 'full')[0];
    if (!empty($imageSrc)) {
        $imageTag .= 'src="' . $imageSrc . '" ';
    } else {
        return null;
    }

    $imageTag .= '/>';

    return $imageTag;
}

//-----------------add to cart new custom field -------------------------

/**
 * Na stranici pojedinih proizvoda da se prikazu dodatne opcije za proizvod
 * Kao sto su: željeni tekst za custom proizvod
 * Velicina slike i vrsta okvira.
 */
function generateSingleProductAdditionalOptions() {
    global $product;

    /***
     * Samo za odredene kategorije ovo treba prikazati
     * tipa samo za Custom kategoriju treba prikazati "Željeni tekst"!
     * Ostali nisu custombilni.
     */

    $isCustomProduct = isCustomProduct($product);
    
    if($isCustomProduct){

        printf('<div class="productAdditionalFields">
        <label for="customText">Željeni tekst</label>  
        <input type="text" id="iconic-engraving" name="customText" placeholder="Unesite željeni tekst">
        </div>');
    }
    ?>

    <div class="productAdditionalFields">
        <label for="imageSizeId"><?php _e('Veličina slike'); ?></label>
        <select id="imageSizeId" name="imageSize" class="form-select" required="true" style="width: 100%">
            <option value=""><?php _e('Odaberite veličinu slike'); ?></option>
            <option selected="true" value="21x30">21 x 30 cm</option>
            <option value="30x40">30 x 40 cm</option>
            <option value="40x50">40 x 50 cm</option>
            <option value="50x70">50 x 70 cm</option>
        </select>
    </div>
    <div class="productAdditionalFields">
        <label for="imageFrameId"><?php _e('Vrsta okvira'); ?></label>
        <select id="imageFrameId" name="frameType" class="form-select" required="true" style="width: 100%">
            <option value=""><?php _e('Odaberite vrstu okvira'); ?></option>
            <option selected="" value="none">Bez okvira</option>
            <option value="BijeliOkvir">Bijeli okvir</option>
            <option value="CrniOkvir">Crni okvir</option>
            <option value="SvijtloSmeđiOkvir">Svijetlo smeđi</option>
        </select>
    </div>

    <input type="hidden" id="reguladPriceInput" value="0" name="reguladPriceInput">
    <input type="hidden" id="calculatedPriceInput" value="0" name="calculatedPriceInput">
    <input type="hidden" id="setTypeInput" value="<?php echo resolveProductSetType($product) ?>" name="setType">
    <?php
}
add_action('woocommerce_before_add_to_cart_button', 'generateSingleProductAdditionalOptions', 10);

/***
 * Izracunava broj postera za setove, 
 * ako je setoftwo, 2 su postera
 * ako je setofthree, 3 su postera
 * inace je 1 poster odnosno nije set.
 */
function resolveProductSetType($product) {
    if (is_object_in_term($product->get_id(), 'product_tag', 'setoftwo')) {
        return 2;
    } else if (is_object_in_term($product->get_id(), 'product_tag', 'setofthree')) {
        return 3;
    }
    return 1;
}

/***
 * Provjera je li proizvod custombilan,
 * Moze li klijent unijeti svoj tekst.
 */
function isCustomProduct($product){
    return is_object_in_term($product->get_id(), 'product_tag', 'custom');
}


/**
 * Prilikom odabira proizoda spremi popratne odabrane opcije 
 * u metadata od proizvoda u košarici
 *
 * @param array $cart_item_data
 * @param int   $product_id
 * @param int   $variation_id
 *
 * @return array
 */
function save_additional_options_to_cart_item($cart_item_data, $product_id, $variation_id) {
    $customText = filter_input(INPUT_POST, 'customText');
    $imageSize = filter_input(INPUT_POST, 'imageSize');
    $frameType = filter_input(INPUT_POST, 'frameType');
    $setType = filter_input(INPUT_POST, 'setType');

    if (!empty($customText)) {
        $cart_item_data['customText'] = $customText;
    }
    if (!empty($imageSize)) {
        $cart_item_data['imageSize'] = $imageSize;
    }
    if (!empty($frameType)) {
        $cart_item_data['frameType'] = $frameType;
    }
    if (!empty($setType)) {
        $cart_item_data['setType'] = $setType;
    }

//        $cart_item_data['customPrice'] = (float) 22;

    return $cart_item_data;
}

add_filter('woocommerce_add_cart_item_data', 'save_additional_options_to_cart_item', 10, 3);

/**
 * Prikazivanje odabranih dodatnih opcija iz proizvoda
 * Kao što su tekst, okvir, velicina okvira...
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function display_additional_options_on_cart($item_data, $cart_item) {
    if (!empty($cart_item['customText'])) {

        $item_data[] = array(
            'key' => __('Tekst', 'iconic'),
            'value' => wc_clean($cart_item['customText']),
            'display' => '',
        );
    }

    if (!empty($cart_item['imageSize'])) {
        $item_data[] = array(
            'key' => __('Veličina slike', 'iconic'),
            'value' => wc_clean($cart_item['imageSize']),
            'display' => '',
        );
    }

    if (!empty($cart_item['frameType'])) {
        $item_data[] = array(
            'key' => __('Vrsta okvira', 'iconic'),
            'value' => wc_clean(resolveFrameTypeValue($cart_item['frameType'])),
            'display' => '',
        );
    }

    return $item_data;
}
add_filter('woocommerce_get_item_data', 'display_additional_options_on_cart', 10, 2);

/***
 * Resolvanje teksta za pojedini naziv okvira
 */
function resolveFrameTypeValue($frameType) {

    if ($frameType == 'BijeliOkvir') {
        return _("Bijeli okvir");
    } else if ($frameType == 'CrniOkvir') {
        return _("Crni okvir");
    } else if ($frameType == 'SvijtloSmeđiOkvir') {
        return _("Svijetlo smeđi okvir");
    }
    return _("Bez okvira");
}

/**
 * * Prilikom odabira proizoda spremi popratne odabrane opcije 
 * u metadata od proizvoda u narudžbi.
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function save_additional_options_to_order_items($item, $cart_item_key, $values, $order) {
    if (!empty($values['customText'])) {
        $item->add_meta_data(__('Tekst', 'iconic'), $values['customText']);
    }

    if (!empty($values['imageSize'])) {
        $item->add_meta_data(__('Veličina slike', 'iconic'), $values['imageSize']);
    }

    if (!empty($values['frameType'])) {
        $item->add_meta_data(__('Vrsta okvira', 'iconic'), $values['frameType']);
    }

    if (!empty($values['setType'])) {
        $item->add_meta_data(__('Vrsta seta', 'iconic'), $values['setType']);
    }
}

add_action('woocommerce_checkout_create_order_line_item', 'save_additional_options_to_order_items', 10, 4);

add_action('woocommerce_before_calculate_totals', 'add_custom_price');
/***
 * Izracun cijene na stranici cart (Košarica), na listi svih dodanih proizvoda u košarici.
 */
function add_custom_price($cart_object) {
    foreach ($cart_object->cart_contents as $key => $value) {
//        $value['data']->price = $custom_price;
        // for WooCommerce version 3+ use: 

        $imageSize = $value['imageSize'];
        $frameType = $value['frameType'];
        $setType = $value['setType'];
        $price = $value['data']->get_price();

        $customPrice = calculatePrice(null, $imageSize, $frameType, $setType, $price);
        $value['data']->set_price($customPrice);
    }
}

add_filter('woocommerce_package_rates', 'hide_shipping_when_free_is_available', 100, 2);

/***
 * Izracunavanje cijene za dostavu!
 */

function hide_shipping_when_free_is_available($rates, $package) {
    $new_rates = array();
    foreach ($rates as $rate_id => $rate) {
        // Only modify rates if free_shipping is present.
        if ('free_shipping' === $rate->method_id) {
            $new_rates[$rate_id] = $rate;
            break;
        }
    }

    if (!empty($new_rates)) {
        //Save local pickup if it's present.
        foreach ($rates as $rate_id => $rate) {
            if ('local_pickup' === $rate->method_id) {
                $new_rates[$rate_id] = $rate;
                break;
            }
        }
        return $new_rates;
    }


    foreach ($rates as $rate) {

        if ($rate->label == 'Dostava') {
            $rate->cost = 99;
        }
    }

    return $rates;
}

//--------------------add to cart new custom field --------------------------


// <editor-fold defaultstate="collapsed" desc="END POINTS">

//Poziv endpoint-a!
//http://localhost/wordpress/wp-json/myplugin/v1/author/1

add_action('rest_api_init', function () {
    register_rest_route('myplugin/v1', '/author/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'my_awesome_func',
    ));
});

function my_awesome_func(WP_REST_Request $request) {
    $encode = "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";

    $title = "Tattoo : " . $_POST["tatooInput"];

    $my_post = array(
        'post_title' => $title,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'tattoo'
    );

    $upload_dir = wp_upload_dir();

    // @new
    $upload_path = str_replace('/', DIRECTORY_SEPARATOR, $upload_dir['path']) . DIRECTORY_SEPARATOR;

    $img = 'data:image/png;base64,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';
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);

    $decoded = base64_decode($img);

    $filename = 'tattoo.png';

    $hashed_filename = md5($filename . microtime()) . '_' . $filename;

    // @new
    $image_upload = file_put_contents($upload_path . $hashed_filename, $decoded);

    //HANDLE UPLOADED FILE
    if (!function_exists('wp_handle_sideload')) {

        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    // Without that I'm getting a debug error!?
    if (!function_exists('wp_get_current_user')) {

        require_once( ABSPATH . 'wp-includes/pluggable.php' );
    }

    // @new
    $file = array();
    $file['error'] = '';
    $file['tmp_name'] = $upload_path . $hashed_filename;
    $file['name'] = $hashed_filename;
    $file['type'] = 'image/png';
    $file['size'] = filesize($upload_path . $hashed_filename);

    // upload file to server
    // @new use $file instead of $image_upload
    $file_return = wp_handle_sideload($file, array('test_form' => false));

    $filename = $file_return['file'];
    $attachment = array(
        'post_mime_type' => $file_return['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
        'post_content' => '',
        'post_status' => 'inherit',
        'guid' => $wp_upload_dir['url'] . '/' . basename($filename)
    );
    $attach_id = wp_insert_attachment($attachment, $filename, 289);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
    wp_update_attachment_metadata($attach_id, $attach_data);
    $jsonReturn = array(
    );

    header('Content-Type: text/html; charset=UTF-8');
    echo '<img src="' . wp_get_attachment_image_url($attach_id, 'full') . '" >';
    exit();

    // Insert the post into the database
//    $tattoo_ID = wp_insert_post($my_post);
//    if ($tattoo_ID) {
//        add_post_meta($tattoo_ID, 'text', $_POST["tatooInput"]);
//        add_post_meta($tattoo_ID, 'image', $_POST["imageData"]);
//        add_post_meta($tattoo_ID, 'image_ID', $attach_id);
//        exit(wp_redirect(get_permalink($tattoo_ID)));
//    }
}
// </editor-fold>


?>
