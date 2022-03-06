<?php

    
    $action = $_POST['action'];
    if(isset($action)){
        if($action == 'calculatePrice'){
            
            $productId = $_POST['productId'];
            $imageSize = $_POST['imageSize'];
            $frameSize = $_POST['frameSize'];
            $setType = $_POST['setType'];
            $originalPrice = $_POST['originalPrice'];
            
            echo calculatePrice($productId, $imageSize, $frameSize, $setType, $originalPrice);
        }
    }
    
    function calculatePrice($productId, $imageSize, $frameSize, $setType, $originalPrice){
        
        $multiplicator = floatval(0);
        if ($setType == 1){
            if($imageSize == '21x30'){
                if($frameSize != 'none'){
                    $multiplicator = 30;
                }
            }else if($imageSize == '30x40'){
                $multiplicator = 30;
                if($frameSize != 'none'){
                    $multiplicator += 40;
                    
                }
            }else if($imageSize == '40x50'){
                    $multiplicator = 60;
                if($frameSize != 'none'){
                    $multiplicator += 50;
                }
            }else if($imageSize == '50x70'){
                    $multiplicator = 90;
                if($frameSize != 'none'){
                    $multiplicator += 60;
                }
            }
        }else if($setType == 2){
            if($imageSize == '21x30'){
                if($frameSize != 'none'){
                    $multiplicator = 60;
                }
            }else if($imageSize == '30x40'){
                $multiplicator = 30;
                if($frameSize != 'none'){
                    $multiplicator += 80;
                    
                }
            }else if($imageSize == '40x50'){
                    $multiplicator = 60;
                if($frameSize != 'none'){
                    $multiplicator += 100;
                }
            }else if($imageSize == '50x70'){
                    $multiplicator = 90;
                if($frameSize != 'none'){
                    $multiplicator += 120;
                }
            }
        }else if($setType == 3){
            if($imageSize == '21x30'){
                if($frameSize != 'none'){
                    $multiplicator = 80;
                }
            }else if($imageSize == '30x40'){
                $multiplicator = 30;
                if($frameSize != 'none'){
                    $multiplicator += 100;
                    
                }
            }else if($imageSize == '40x50'){
                    $multiplicator = 60;
                if($frameSize != 'none'){
                    $multiplicator += 120;
                }
            }else if($imageSize == '50x70'){
                    $multiplicator = 90;
                if($frameSize != 'none'){
                    $multiplicator += 140;
                }
            }
        }
        
        $calculatedProductPrice = $originalPrice + $multiplicator;
        
        return $calculatedProductPrice;
    }

?>
