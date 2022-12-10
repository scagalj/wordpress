/* Javascript */
jQuery(document).ready(function ($) {
    console.log('ready');


    function myFunction(x) {
        $header = $('#sideBarHeader');
        $content = $header.next();
        if (x.matches) { // If media query matches
            $content.hide();
        } else {
            $content.show();
        }
        $header.text(function () {
            //change text based on condition
            return $content.is(":visible") ? " ˇ Sakrij filtere" : " > Prikaži filtere";
        });
    }

    var x = window.matchMedia("(max-width: 960px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes

    $("#sideBarHeader").click(function () {

        $header = $(this);
        //getting the next element
        $content = $header.next();
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function () {
            //execute this after slideToggle is done
            //change text of header based on visibility of content div
            $header.text(function () {
                //change text based on condition
                return $content.is(":visible") ? " ˇ Sakrij filtere" : " > Prikaži filtere";
            });
        });

    });

    var contactUs = function (email, ime, mobitel, naslov, poruka) {
        console.log('Uslo u contact us form;');
        $.ajax({
            url: '/wordpress/wp-content/themes/sinatra-child/contactus.php',
            type: 'POST',
            data: {
                action: 'contactus',
                email: email,
                ime: ime,
                mobitel: mobitel,
                naslov: naslov,
                poruka: poruka,
                submit: 'submit'
            },
            success: function (data) {
                console.log('Uslo u success dio;');
                console.log(data);
                alert('aaa');
                return data;
            }
        });
    };

    $('#submitBtn').click(function () {
        console.log('OnCLickSubmit');
        var email = $('#emailId').val();
        var ime = $('#imeId').val();
        var mobitel = $('#mobitelId').val();
        var naslov = $('#naslovId').val();
        var poruka = $('#porukaId').val();

        console.log('Sadrzaj: ' + email + ime + mobitel + naslov + poruka);

        contactUs(email, ime, mobitel, naslov, poruka);

    });

    $('#imageSizeId').change(function () {

        var imageSize = $('#imageSizeId').val();
        updateFrameOnImageChange(imageSize);

        updatePriceOnSelectedValues();
    });

    $('#imageFrameId').change(function () {
        updatePriceOnSelectedValues();
    });

    function updateFrameOnImageChange(imageSize) {
        console.log('size: ' + imageSize);
        if (imageSize === '40x50' || imageSize === '50x70') {
            if ($("#imageFrameId").val() !== 'none') {
                $('#outputTextHolder').html('* Odabrana veličina s okvirom nije moguća za slanje poštom.');
                $('#outputTextId').show();
            }
            $("#imageFrameId").val("none").change();
            $('#imageFrameFieldsId').hide();
        } else {
            $('#imageFrameFieldsId').show();
            $('#outputTextId').hide();
        }
    }

    function updatePriceOnSelectedValues() {

        var imageSize = $('#imageSizeId').val();
        var frameSize = $('#imageFrameId').val();
        var setType = parseInt($('#setTypeInput').val());

        var calculatedProductPrice = parseFloat($('#single_product_price').text());
        var regularPriceInput = parseFloat($('#reguladPriceInput').val());
        if (parseFloat(regularPriceInput) === 0) {
            regularPriceInput = calculatedProductPrice;
            $('#reguladPriceInput').val(regularPriceInput);
        }

        calculatedPrice2(null, imageSize, frameSize, setType, regularPriceInput);

    }

    //TODO: CIJENA U EUR I HRK
    function displayPrice(calculatedPrice) {
        $('#calculatedPriceInput').val(calculatedPrice);
        $('#single_product_price').html(number_format(parseFloat(calculatedPrice), 2, ',', '.'));
        $('#single_product_price_eur').html(number_format(parseFloat(calculatedPrice * 7.53450), 2, ',', '.'));
    }

    var calculatedPrice2 = function (productId, imageSize, frameSize, setType, originalPrice) {
        $.ajax({
            url: '/wordpress/wp-content/themes/sinatra-child/calculatePrice.php',
            type: 'POST',
            data: {
                action: 'calculatePrice',
                productId: productId,
                imageSize: imageSize,
                frameSize: frameSize,
                setType: setType,
                originalPrice: originalPrice
            },
            success: function (data) {
                displayPrice(data);
                return data;
            }
        });
    };

    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    var bla = $('#productCategoryValue').val();
    var selectedCategories = bla.split(",");

    $('input[name="categories"]').each(function () {
        if (selectedCategories.includes($(this).val())) {
            $(this).prop('checked', true);
            console.log($(this).val());
        }
    });


    $('#submitButton').click(function () {

        let checkboxes = document.querySelectorAll('input[name="categories"]:checked');
        let values = [];
        checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
        });
        $('#productCategoryValue').val(values);
    });

    $('.selectCategoriesGroup > label').click(function () {
        $('#submitButton').click();
    });


    //Predstavjla ajax request za orderby, prepraviti za filter
    $('.woocommerce-ordering2').on('change', 'select.filterby', function () {
        $(this).closest('form').trigger('submit');
    });

    $(".wpcp-post-image").hover(
            function () {
                $(this).find("img").css({'transform': 'scale(1.3)'}, {'transform-origin': '50% 50%'});
                $(this).siblings(".wpcp-post-content").css('top', '320px');
            }, function () {
        $(this).find("img").css({'transform': 'scale(1)'}, {'transform-origin': '50% 50%'});
        $(this).siblings(".wpcp-post-content").css('top', '256px');
    }
    );
    $(".wpcp-post-content").hover(
            function () {
                $(this).prev(".wpcp-slide-image").find("img").css({'transform': 'scale(1.3)'}, {'transform-origin': '50% 50%'});
                $(this).css('top', '320px');
            }, function () {
        $(this).prev(".wpcp-slide-image").find("img").css({'transform': 'scale(1)'}, {'transform-origin': '50% 50%'});
        $(this).css('top', '256px');
    }
    );
});

jQuery(function ($) {

});