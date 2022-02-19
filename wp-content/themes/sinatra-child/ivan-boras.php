<?php
/**
 * Template Name: My Page
 */
?>

<?php get_header(); ?>

<div class="mt-5">

</div>

<div class="container mt-5 doctorImageHeader">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <div style="width: 250px; height: 250px;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doctor.png" alt="Avatar" class="image" >
            </div>
        </div>
        <div class="col-0 col-sm-0 col-md-0 col-lg-7 col-xl-7 doctorName">
            <h1>Dr. Ivan Boras</h1>
            <h3 class="fw-300">Specijalist za oftalmologiju i mrežnicu</h3>

        </div>
    </div>
</div>
<div class="descriptionWrapper">
    <div class="container-fluid doctorDescription">
        <div class="row doctorNameSmallScreen">
            <div class="col-12 col-sm-12 col-md-12">
                <h1>Dr. Ivan Boras</h1>
                <h3 class="fw-300">Specijalist za oftalmologiju i mrežnicu</h3>
            </div> 
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row descriptionOne">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="titleHeader pb-3">
                                <h2 class="fw-800">OBRAZOVANJE</h2>
<!--                                <div class="separator-container">
                                    <div class="separator separator line-separator-left line-separator-location-left-blue"></div>
                                </div>-->
                            </div>
                            <div class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Medicinski fakultet Zagreb, Hrvatska</h5>
                                <p class="fw-300">2001. - 2007. godine</p>
                            </div>
                            <div  class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Očna klinika Svjetlost - specijalizant oftalmologije</h5>
                                <p class="fw-300">2009. - 2013. godine</p>
                            </div>
                            <div class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Europski odbor za oftalmologiju</h5>
                                <p class="fw-300">2017. - 2018. godine</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="titleHeader pb-3">
                                <h2 class="fw-800">ISKUSTVO</h2>
<!--                                <div class="separator-container">
                                    <div class="separator separator line-separator-left line-separator-location-left-green"></div>
                                </div>-->
                            </div>

                            <div class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Specijalist oftalmologije</h5>
                                <p class="fw-300">Poliklinika Svjetlost, Zagreb</p>
                                <p class="fw-300">2013. - 2017. godine</p>
                            </div>
                            <div class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Specijalist za oftalmologiju i mrežnicu</h5>
                                <p class="fw-300">Opća bolnica Dubrovnik</p>
                                <p class="fw-300">2017. godine - do danas</p>
                            </div>
                            <div class="aboutDocRow pb-3">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i><h5 class="fw-500">Specijalist za oftalmologiju i mrežnicu</h5>
                                <p class="fw-300">Očna klinika BoVision</p>
                                <p class="fw-300">2019. godine - do danas</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5 mt-5 pb-5">
    <div class="row pb-5 descriptionTwo">
        <div class="container mb-3">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-12 col-md-8 titleHeader">
                    <h2 class="fw-800">PODRUČJE RADA</h2>
                    <div class="separator-container">
                        <div class="separator line-separator"></div>
                    </div><br/>
                </div>
                <div class="col-12 col-sm-12 col-md-12">

                    <div>
                        <p>Glavna područja interesa doktora Borasa su bolesti stražnjeg očnog segmenta, tj. Bolesti mrežnice. Svakodnevne aktivnosti uključuju dijagnostičke i terapijske postupke kod pacijenata koji pate od različitih bolesti stražnjeg dijela oka, poput degeneracije makule, dijabetičke retinopatije i drugih. </p>
                        <p>U svom radu koristi se najmodernijim dijagnostičkim alatima kao što su OCT zametanog izvora, fluoresceinska angiografija, autofluorescencija fundusa. U liječenju bolesti mrežnice koristi najsuvremenije lijekove poput intravitrealnog ubrizgavanja anti-VEGF skupine lijekova, a za liječenje dijabetičke retinopatije i rupture mrežnice koristi najmoderniji Pascal laser. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="container mb-5 pb-5">

    <div class="row mt-4 descriptionTwo">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="titleHeader pb-3">
                <h2 class="fw-800">PODRUČJE RADA</h2>
                <div class="separator-container">
                    <div class="separator separator line-separator-left line-separator-location-left-blue"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <p>Glavna područja interesa doktora Borasa su bolesti stražnjeg očnog segmenta, tj. Bolesti mrežnice. Svakodnevne aktivnosti uključuju dijagnostičke i terapijske postupke kod pacijenata koji pate od različitih bolesti stražnjeg dijela oka, poput degeneracije makule, dijabetičke retinopatije i drugih. </p>
            <p>U svom radu koristi se najmodernijim dijagnostičkim alatima kao što su OCT zametanog izvora, fluoresceinska angiografija, autofluorescencija fundusa. U liječenju bolesti mrežnice koristi najsuvremenije lijekove poput intravitrealnog ubrizgavanja anti-VEGF skupine lijekova, a za liječenje dijabetičke retinopatije i rupture mrežnice koristi najmoderniji Pascal laser. </p>
        </div>
    </div>
</div>-->

<?php
get_footer();
