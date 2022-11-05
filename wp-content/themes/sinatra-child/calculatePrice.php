<?php

$action = $_POST['action'];
if (isset($action)) {
    if ($action == 'calculatePrice') {

        $productId = $_POST['productId'];
        $imageSize = $_POST['imageSize'];
        $frameSize = $_POST['frameSize'];
        $setType = $_POST['setType'];
        $originalPrice = $_POST['originalPrice'];

        echo calculatePrice($productId, $imageSize, $frameSize, $setType, $originalPrice);
    }
}

function calculatePrice($productId, $imageSize, $frameSize, $setType, $originalPrice) {

    $multiplicator = floatval(0);
    if ($setType == 1) {
        if ($imageSize == '21x30') {
            if ($frameSize != 'none') {
                $multiplicator = 30;
            }
        } else if ($imageSize == '30x40') {
            $multiplicator = 30;
            if ($frameSize != 'none') {
                $multiplicator += 40;
            }
        } else if ($imageSize == '40x50') {
            $multiplicator = 60;
            if ($frameSize != 'none') {
                $multiplicator += 50;
            }
        } else if ($imageSize == '50x70') {
            $multiplicator = 90;
            if ($frameSize != 'none') {
                $multiplicator += 60;
            }
        }
    } else if ($setType == 2) {
        if ($imageSize == '21x30') {
            if ($frameSize != 'none') {
                $multiplicator = 60;
            }
        } else if ($imageSize == '30x40') {
            $multiplicator = 30;
            if ($frameSize != 'none') {
                $multiplicator += 80;
            }
        } else if ($imageSize == '40x50') {
            $multiplicator = 60;
            if ($frameSize != 'none') {
                $multiplicator += 100;
            }
        } else if ($imageSize == '50x70') {
            $multiplicator = 90;
            if ($frameSize != 'none') {
                $multiplicator += 120;
            }
        }
    } else if ($setType == 3) {
        if ($imageSize == '21x30') {
            if ($frameSize != 'none') {
                $multiplicator = 80;
            }
        } else if ($imageSize == '30x40') {
            $multiplicator = 30;
            if ($frameSize != 'none') {
                $multiplicator += 100;
            }
        } else if ($imageSize == '40x50') {
            $multiplicator = 60;
            if ($frameSize != 'none') {
                $multiplicator += 120;
            }
        } else if ($imageSize == '50x70') {
            $multiplicator = 90;
            if ($frameSize != 'none') {
                $multiplicator += 140;
            }
        }
    }

    $calculatedProductPrice = $originalPrice + $multiplicator;

    return $calculatedProductPrice;
}

function displayPrice($originalPrice) {

    $calculatedPrice = calculatePriceByCurrentyRate($originalPrice);

    return "";
}

function calculatePriceByCurrentyRate($price) {
    $currenyRate = 7.53450;
    return $price * $currenyRate;
}

//Generiranje cijene s HTML
function generateProductPriceHtml($product) {
    $result = '';

    $regular_price = (float) $product->get_regular_price(); // Regular price
    $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
    // "Saving Percentage" calculation and formatting
    $precision = 0; // Max number of decimals
    $saving_percentage = '-' . round(100 - ( $sale_price / $regular_price * 100 ), $precision) . ' %';

    $result .= '<div class="imagePrice priceWrapper">';
    if ($product->is_on_sale()) {
        $result .= '<span class="regularPrice">' . number_format($sale_price, 2, ',', '.') . ' €' . '</span><span class="salePrice">' . number_format($regular_price, 2, ',', '.') . ' €' . '</span>';
        $result .= '<span style="display:block;"><span class="regularPrice priceInEur">' . number_format(calculatePriceByCurrentyRate($sale_price), 2, ',', '.') . ' kn' . '</span><span class="salePrice priceInEur">' . number_format(calculatePriceByCurrentyRate($regular_price), 2, ',', '.') . ' kn' . '</span></span>';
    } else {
        $result .= '<span class="regularPrice">' . number_format($sale_price, 2, ',', '.') . ' €' . '</span>';
        $result .= '<span style="display:block;"><span class="regularPrice priceInEur">' . number_format(calculatePriceByCurrentyRate($sale_price), 2, ',', '.') . ' kn' . '</span></span>';
    }
    $result .= '</div>';
    return $result;
}


function span_custom_prc($return, $price, $args, $unformatted_price, $original_price) {

    $formatedPriceInEUR = '<span class="woocommerce-Price-amount amount"><bdi> ( ' . number_format(calculatePriceByCurrentyRate($original_price), 2, ',', '.') . ' kn' . ' ) </bdi></span>';

    return $return . $formatedPriceInEUR;
}

// --- Dodana vrijednost u eurima za detalje pojedinog proizvoda
function custom_single_product_price($product) {

    $result = "";
    $regular_price = (float) $product->get_regular_price(); // Regular price
    $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
    $result .= '<span id="single_product_price"> ' . number_format($sale_price, 2, ',', '.') . '</span><span> ' . get_woocommerce_currency_symbol() . '</span>';
    $result .= ' ( <span id="single_product_price_eur"> ' . number_format(calculatePriceByCurrentyRate($sale_price), 2, ',', '.') . '</span><span> ' . "kn" . ' ) </span>';
    return $result;
}

?>
