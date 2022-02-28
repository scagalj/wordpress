<?php

//Child Theme Functions File
add_action("wp_enqueue_scripts", "enqueue_wp_child_theme");


$TEST_CATEGORY_ID = 23;

//$BESTSELLING_CATEGORY_ID = 1;

function testMethod() {
    return "<h2>TEST METHOD</h2>";
}

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

function logToConsole($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

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

function woocommerce_template_loop_product_title() {
    echo  '<div class="mt-2" style="text-align:center;">'
            . '<span style="color:black;" class="imageTitle">'
            . get_the_title()
            . '</span>'
            . '</div>';
}

function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

function woocommerce_template_loop_add_to_cart($args = array()) {
    echo '';
}

function woocommerce_template_loop_category_link_open($category) {
    echo '';
}

function woocommerce_template_loop_category_link_close() {
    echo '';
}

if ( ! function_exists( 'woocommerce_template_single_rating' ) ) {

	/**
	 * Output the product rating.
	 */
	function woocommerce_template_single_rating() {
		if ( post_type_supports( 'product', 'comments' ) ) {
//			wc_get_template( 'single-product/rating.php' );
		}
	}
}

if ( ! function_exists( 'woocommerce_default_product_tabs' ) ) {

	/**
	 * Add default product tabs to product pages.
	 *
	 * @param array $tabs Array of tabs.
	 * @return array
	 */
	function woocommerce_default_product_tabs( $tabs = array() ) {
		global $product, $post;

		// Description tab - shows product content.
		if ( $post->post_content ) {
			$tabs['description'] = array(
				'title'    => __( 'Description', 'woocommerce' ),
				'priority' => 10,
				'callback' => 'woocommerce_product_description_tab',
			);
		}

		// Additional information tab - shows attributes.
		if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
			$tabs['additional_information'] = array(
				'title'    => __( 'Additional information', 'woocommerce' ),
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


if ( ! function_exists( 'woocommerce_template_single_meta' ) ) {

	/**
	 * Output the product meta.
	 */
	function woocommerce_template_single_meta() {
//		wc_get_template( 'single-product/meta.php' );
	}
}



function createPostContentFomPost($product) {
    $productPost = '<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 pr-2 imageContainerBestSellers">'
            . '<div class="imageContainerBestSellerImage">';

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

function generateProductPriceHtml($product) {
    $result = '';

    $regular_price = (float) $product->get_regular_price(); // Regular price
    $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
    // "Saving Percentage" calculation and formatting
    $precision = 0; // Max number of decimals
    $saving_percentage = '-' . round(100 - ( $sale_price / $regular_price * 100 ), $precision) . ' %';

    $result .= '<div class="imagePrice priceWrapper">';
    if ($product->is_on_sale()) {
        $result .= '<span class="regularPrice">' . number_format($sale_price, 2) . ' HRK' . '</span><span class="salePrice">' . number_format($regular_price, 2) . ' HRK' . '</span>';
    } else {
        $result .= '<span class="regularPrice">' . number_format($sale_price, 2) . ' HRK' . '</span>';
    }
    $result .= '</div>';
    return $result;
}

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
    add_options_page("Child Theme Settings", "My Child Theme", "manage_options", "childthemewpdotcom", "childthemewpdotcom_theme_options_page");
}

add_action("admin_menu", "childthemewpdotcom_register_options_page");

function wpb_load_fa() {

    wp_enqueue_style('wpb-fa', get_stylesheet_directory_uri() . '/fonts/css/fontello.css');
    wp_enqueue_style('iconsPack', get_stylesheet_directory_uri() . '/fonts/css/iconspack.css');
}

add_action('wp_enqueue_scripts', 'wpb_load_fa');

