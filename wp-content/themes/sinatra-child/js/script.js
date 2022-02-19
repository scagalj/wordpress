/* Javascript */
jQuery(document).ready(function ($) {
    console.log('ready');
    
    var bla = $('#productCategoryValue').val();
    var selectedCategories = bla.split(",");
    
    $('input[name="categories"]').each(function () {
        if(selectedCategories.includes($(this).val())){
            $(this).prop('checked', true);
            console.log($(this).val());
        }
    });
    
    
     $('#submitButton').click( function(){
            
        let checkboxes = document.querySelectorAll('input[name="categories"]:checked'); 
        let values = [];
            checkboxes.forEach((checkbox) => {
                values.push(checkbox.value);
            });
            $('#productCategoryValue').val(values);
        });
        
        $('.selectCategoriesGroup > label').click(function(){
            $('#submitButton').click();
        });
        
    
    //Predstavjla ajax request za orderby, prepraviti za filter
    $('.woocommerce-ordering2').on('change', 'select.filterby', function () {
        $(this).closest('form').trigger('submit');
    });
    
    $(".wpcp-post-image").hover(
            function () {
                $(this).find("img").css({'transform': 'scale(1.3)'},{'transform-origin' : '50% 50%'});
                $(this).siblings(".wpcp-post-content").css('top', '320px');
            }, function () {
                $(this).find("img").css({'transform': 'scale(1)'},{'transform-origin' : '50% 50%'});
                $(this).siblings(".wpcp-post-content").css('top', '256px');
            }
    );
    $(".wpcp-post-content").hover(
            function () {
                $(this).prev(".wpcp-slide-image").find("img").css({'transform': 'scale(1.3)'},{'transform-origin' : '50% 50%'});
                $(this).css('top', '320px');
            }, function () {
                $(this).prev(".wpcp-slide-image").find("img").css({'transform': 'scale(1)'},{'transform-origin' : '50% 50%'});
                $(this).css('top', '256px');
            }
    );
});

jQuery( function( $ ) {
    
});