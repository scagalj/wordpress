<?php
/**
 * Template Name: Kontakt
 */
?>

<?php get_header(); ?>
<div class="mt-5 mb-5"></div>

<a href="http://localhost/wordpress/wp-json/myplugin/v1/author/1" />

<h2 class="mt-5"> test a; <?php echo get_stylesheet_directory_uri(); ?></h2>
<img id="barcodeedisplay" src="" >
<div id="barcodeedisplaytes"></div>

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

        paymentParams.Iznos = '1110,00';
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
        paymentParams.OpisPlacanja = 'Troskovi benzine';

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
        
        const img = canvas.toDataURL('image/png');
        document.getElementById('barcodeedisplay').src = img;
//        document.getElementById('x_barcodeedisplay').src = img;
        document.getElementById('barcodeedisplaytes').innerHTML += img;
        
    }

</script>

<input type="button" onclick="GenerirajBarkod();
         return false;" value="Generiraj barkod">

<div id="barcode"></div>

<div class="container mt-5" style="text-align: center;">
    <h2>KONTAKTIRAJTE NAS</h2>
</div>

<style>
    p{
        margin-top: 0.5em;
        margin-bottom: 0.5em;
    }
    h4{
        margin-top: 0px;
    }
    .border-spacer{
        border: 1px solid black;
        width: 10px;
        height: 2px;
    }
    .inputFormBorder{
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
    }
</style>


<div id="data" style="width: 100%; height: 30px;">

</div>

<div class="container mt-5 mb-5 doctorImageHeader">
    <div class="row mb-5">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div>
                <h4>Adresa</h4>
                <p>Obrt za trgovinu i uslugu</p>
                <p>vl. Maria Budić</p>
                <p>OIB: 123123123123</p>
                <p>Sjedište: Lisičina 2, 21310 Omiš, Hrvatska</p>
                <p>Žiro račun: HR123123123123123123</p>
            </div>

            <div class="border-spacer mt-4 mb-2"></div>

            <div>
                <h4>Osobno preuzimanje</h4>
                <p> Mogućnost osobnog preuzimanja na području Splita.</p>
            </div>

            <div class="border-spacer mt-4 mb-2"></div>

            <div>
                <p>framesforyou1@gmail.com</p>
                <p>info@framesforyou.hr</p>

                <div class="mb-5">
                    <span id="aboutusf" style="padding-right: 15px;">
                        <a href="https://www.facebook.com/people/Frames-For-You-Personalizirani-Okviri/100070659595349/" target="_blank" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                    </span>
                    <span id="aboutusi">
                        <a href="https://www.instagram.com/_framesforyou_/" target="_blank" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

            <?php echo do_shortcode('[wpforms id="286"]'); ?>


            <form id="kontaktUsForm" method="post" action="#">
                <div class="form-group">
                    <input id="emailId" type="email"name="email" required="true" class="form-control inputFormBorder" placeholder="Email *">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <input id="imeId" type="text" name="ime" required="true" class="form-control inputFormBorder" placeholder="Ime *">
                        </div>
                        <div class="col">
                            <input id="mobitelId" type="text" name="mobitel" class="form-control inputFormBorder" placeholder="Mobitel">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input id="naslovId" type="header" required="true" name="naslov" class="form-control inputFormBorder" placeholder="Naslov *">
                </div>
                <div class="form-group">
                    <textArea id="porukaId" type="message" rows="3" required="true" name="poruka" class="form-control inputFormBorder" placeholder="Poruka *" ></textArea>
                </div>

                <button type="submit" id="submitBtn" class="btn btn-primary">Pošalji</button>
            </form>
        </div>
    </div>
</div>


 <div></div>

<?php
get_footer();
