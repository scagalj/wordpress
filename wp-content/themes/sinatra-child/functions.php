<?php
//Child Theme Functions File
add_action( "wp_enqueue_scripts", "enqueue_wp_child_theme" );


$TEST_CATEGORY_ID = 23;
//$BESTSELLING_CATEGORY_ID = 1;

function testMethod(){
    return "<h2>TEST METHOD</h2>";
}

function fetchAllProductCategories(){
    
    $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
  
  $all_categories = get_categories( $args );
 return $all_categories;
}

function logToConsole($output, $with_script_tags = true){
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function fetchCategoriesForName(){
    
//    'type' => 'external',
    $args = array(
        'limit' => 4,
        'category' => array( 'Hoodies' )
    );
    $result = '';
    $products = wc_get_products( $args );
    if(!empty($products)){
        foreach ($products as $product) {
            $productPost = '<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 pr-2 imageContainerBestSellers">'
                    . '<div class="imageContainerBestSellerImage">';
            
            $images = $product->get_gallery_image_ids('view');
            $hasSecondImage = !empty($images);
            
            $productUrl = get_permalink($product->get_id());
            
            $productPost .= '<a href="' . $productUrl . '" >';
            if($hasSecondImage){
                $productPost .= createImageTagFromImageId($product->get_image_id(), null, null, null, 'imageBestSelling img-fluid hideOnHover', null);
            }else{
                $productPost .= createImageTagFromImageId($product->get_image_id(), null, null, null, 'imageBestSelling img-fluid', null);
            }
                    
            if($hasSecondImage){
                $productPost .= createImageTagFromImageId($images[0], null, null, null, 'imageBestSelling img-fluid showOnHover', null);
            }
            
            $productPost .= '</a>';
            
            $productPost .= '<div class="imageDescription">'
                    . '<div class="mt-2">'
                    . '<a href="'
                    . $productUrl . '">'
                    . '<span style="color:black;" class="imageTitle">' 
                    . $product->get_name()
                    . '</span>'
                    . '</a>'
                    . '</div>'
                    . '<div class="imagePrice mt-1">'
                    . 'Cijena: '
                    . $product->get_price() 
                    . '</div></div></div></div>';
            
            $result .= $productPost . ' '; 
        }
    }
    return $result;
}


function createImageTagFromImageId($imageId, $widht = null, $height = null, $id = null, $class = null, $style = null){
    $imageTag = '<img ';
    
    if(!empty($id)){
        $imageTag .= 'id="' . $id . '" ';
    }

    if(!empty($class)){
        $imageTag .= 'class="' . $class . '" ';
    }
    
    $imageSrc = wp_get_attachment_image_src($imageId, 'full')[0];
    if(!empty($imageSrc)){
        $imageTag .= 'src="' . $imageSrc . '" ';
    }else{
        return null;
    }
    
    $imageTag .= '/>';
    
    return $imageTag;
}





function showBestSellingFrames(){
$result = "";
$query = new WP_Query( array( 'category_name' => 'Best selling' ) );
if($query->have_posts()){
while($query->have_posts()){
$query->the_post();
$splitedTextArray = explode("[FEATUREDIMAGES]", get_the_content());
$postImages = $splitedTextArray[0];
$postContent = $splitedTextArray[1];
$result = $result . $postContent .  ", ";
}
}else{
$result = "No posts";
}
/* Restore original Post Data */
wp_reset_postdata();
return $result;
}


function enqueue_wp_child_theme() 
{
if((esc_attr(get_option("childthemewpdotcom_setting_x")) != "Yes")) 
{
//This is your parent stylesheet you can choose to include or exclude this by going to your Child Theme Settings under the "Settings" in your WP Dashboard
wp_enqueue_style("parent-css", get_template_directory_uri()."/style.css" );
}

//This is your child theme stylesheet = style.css
wp_enqueue_style("child-css", get_stylesheet_uri());

//This is your child theme js file = js/script.js
wp_enqueue_script("child-js", get_stylesheet_directory_uri() . "/js/script.js", array( "jquery" ), "1.0", true );
}


// ChildThemWP.com Settings 
function childthemewpdotcom_register_settings() 
{ 
register_setting( "childthemewpdotcom_theme_options_group", "childthemewpdotcom_setting_x", "ctwp_callback" );
}
add_action( "admin_init", "childthemewpdotcom_register_settings" );

//ChildThemeWP.com Options Page
function childthemewpdotcom_register_options_page() 
{
add_options_page("Child Theme Settings", "My Child Theme", "manage_options", "childthemewpdotcom", "childthemewpdotcom_theme_options_page");
}
add_action("admin_menu", "childthemewpdotcom_register_options_page");


function wpb_load_fa() {

wp_enqueue_style( 'wpb-fa', get_stylesheet_directory_uri() . '/fonts/css/fontello.css' );
wp_enqueue_style( 'iconsPack', get_stylesheet_directory_uri() . '/fonts/css/iconspack.css' );

}

add_action( 'wp_enqueue_scripts', 'wpb_load_fa' );

