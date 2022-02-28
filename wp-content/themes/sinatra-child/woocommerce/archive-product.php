<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
    <div>
         <div class="container">
         <div class="row selectCategoriesGroup">
            <?php foreach ( fetchAllProductCategories() as $cat ) : ?>
             <label class="selectCategoriesLabel">  <input class="selectCategoriesInput" name="categories" type="checkbox" value="<?php echo  $cat->slug ?>" > <?php echo $cat->name ?> </label>
            <?php endforeach; ?>
        </div>
        </div>
        <form id="productsForm" name="test1" class="woocommerce-ordering2" method="get">
        
        <!--<select multiple name="product_cat" id="productCategory" onchange="this.form.submit()" class="select wppp-select">-->
        <!--<input id="minPriceInput" type="number" class="woof_price_filter_txt woof_price_filter_txt_from form-control" name="min_price" data-value="0.00" placeholder="<?php echo $_GET['min_price'] ?>" value="<?php if($_GET['min_price']) {echo $_GET['min_price'];} else{ echo 0;} ?>">-->
<!--        <select multiple id="productCategory" style="height: 200px; width: 180px;"  class="select wppp-select">
            <?php foreach ( fetchAllProductCategories() as $cat ) : ?>
                <option <?php if ($_GET['product_cat'] == $cat->slug) { ?>selected="true" <?php }; ?> value="<?php echo  $cat->slug ?>" > <?php echo $cat->name ?> </option>
            <?php endforeach; ?>
        </select>-->
        
        
<!--        <input type="Checkbox" name="blue" value="yes" Checked>Blue
        <input type="Checkbox" name="red" value="yes">Red
        <input type="Checkbox" name="green" value="yes">Green-->
        
        
        <!--<input id="minPrice" type="number" name="min_price"/>-->
        <!--<input id="maxPrice" type="number" name="max_price"/>-->
        
        <!--<input id="minPriceInput" type="number" class="woof_price_filter_txt woof_price_filter_txt_from" name="min_price" data-value="0.00" placeholder="<?php echo $_GET['min_price'] ?>" value="<?php if($_GET['min_price']) {echo $_GET['min_price'];} else{ echo 0;} ?>">-->
        <!--<input id="maxPriceInput" type="number" class="woof_price_filter_txt woof_price_filter_txt_to" name="max_price" data-value="0.00" placeholder="<?php echo $_GET['max_price'] ?>" value="500">-->
        
        
        
        <input type="hidden" id="productCategoryValue"  name="product_cat" value="<?php if($_GET['product_cat']) {echo $_GET['product_cat'];}; ?>" />
        <input type="hidden" name="paged" value="1" />
        <?php wc_query_string_form_fields(null, array('product_cat', 'submit', 'paged', 'product-page')); ?>
         
        
        <input id="submitButton" style="display: none;" type="submit" value="Submit" >
    </form>
        
    </div>
            
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loophow t' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
