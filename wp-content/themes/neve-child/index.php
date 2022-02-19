<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */
?>

<?php get_header(); ?>
<div id="fullPageHeader" class="container-fluid fullPageHeaderMain">
    <div id="headerContent" class="pageContent">
        <div class="container-fluid pr-4">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-4">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 pr-20">
                    <div class="text-center">
                        <h1 class="headerTitle">Bo Vision & Luxal poliklinika </h1>
                        <div class="separator-container">
                            <div class="separator line-separator">¤</div>
                        </div>
                        <!--<h1 class="headerTitle text-center name">Dr. Ivan Boras </h1>-->
                    </div>
                </div>
                <div class="col-sm-2 col-md-4 col-lg-4 col-xl-6">
                </div>
                <div class="col-sm-10 col-md-8 col-lg-8 col-xl-6 pr-20">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-0 col-sm-0 col-md-5">
                            </div>  
                            <div class="col-12 col-sm-12 col-md-7">
                                <h3 class="name">Radno vrijeme: </h3>
                            </div>
                        </div>
                        <div class="row working-hours">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Ponedjeljak: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>12:00 - 20:00h</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Utorak: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>12:00 - 20:00h</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Srijeda: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>12:00 - 20:00h</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Èetvrtak: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>12:00 - 20:00h</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Petak: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>12:00 - 20:00h</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p>Subota: </p>
                            </div>  
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                                <p>08:00 - 14:00h</p>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center text-center pt-4">
                        <div class="col-md-auto">
                            <a href="<?php echo site_url() ?>/kontakt" >
                                <button type="button" class="btn btn-outline-primary">
                                    Naruèite se
                                </button></a>
                            <span style="padding-right: 10px;" ></span>
                            <a href="<?php echo site_url() ?>/cjenik" >
                                <button type="button" class="btn btn-outline-primary">
                                    Cjenik
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container-fluid mt-5">
    <div class="row">

        <!--BENEFITS-->

        <div class="container mb-3 mt-5">
            <div class="row justify-content-center text-center">
                <div class="col-6">
                    <h2><?php 
                    $text = 'Naše usluge';
                    echo mb_convert_encoding($text, "ISO-8859-1", "UTF-8");
                    echo utf8_uri_encode($text, strlen($text)); ?></h2>
                    <div class="separator-container">
                        <div class="separator line-separator">¤</div>
                    </div>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>-->
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-sm-3 benefitWrapper">
            <div class="benefitIcon benefitIconBorder">
                <a href="<?php echo site_url() . '/kontakt' ?>">
                    <i class="icon-testing-glasses2 service_icon" ></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/face-botox.png">-->
            </div>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Nullam in viverra sapien.</p>
            </div>
        </div>
        <div class="col-sm-3 benefitWrapper">
            <div class="benefitIcon benefitIconBorder">
                <a href="<?php echo site_url() . '/kontakt' ?>">
                    <i class="icon-beauty2 service_icon" ></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/laser-surgery1.png">-->
            </div>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Curabitur eleifend a massa rhoncus gravida.</p>
<!--                <div class="benefirButton">
                    <a href="#" type="button" class="btn btn-outline-primary">Saznaj vise</a>
                </div>-->
            </div>
        </div>
        <div class="col-sm-3 benefitWrapper">
            <div class="benefitIcon benefitIconBorder">
                <a href="<?php echo site_url() . '/kontakt' ?>">
                    <i class="icon-laser-surgery1 service_icon" ></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/ophthalmologist.png">-->
            </div>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
        <div class="col-sm-3 benefitWrapper">
            <div class="benefitIcon">
                <a href="<?php echo site_url() . '/kontakt' ?>">
                    <i class="icon-sunglasses2 service_icon" ></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/scalpel.png">-->
            </div>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
    </div>
</div>


<!--SERICE TEST-->

<hr style="
    height: 10px;
    width: 100%;
    ">


<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-sm-3 pr-2">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image1">
                </div>
                <i class="fa icon-testing-glasses2 icontest1" ></i>
            </a>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Nullam in viverra sapien.</p>
            </div>
        </div>
        <div class="col-sm-3 pr-2">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image2">

    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/face-botox.png">-->
                </div>
                <!--<i class="fa icon-optometrist5 fa-5x circle-icon"/>-->
                <i class="fa icon-beauty2 icontest1" ></i>
                <!--                <div class="imageicon1">
                                </div>-->
            </a>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Curabitur eleifend a massa rhoncus gravida.</p>
<!--                <div class="benefirButton">
                    <a href="#" type="button" class="btn btn-outline-primary">Saznaj vise</a>
                </div>-->
            </div>
        </div>
        <div class="col-sm-3 pr-2">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image3">

    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/face-botox.png">-->
                </div>
                <!--<i class="fa icon-optometrist5 fa-5x circle-icon"/>-->
                <i class="fa icon-laser-surgery1 icontest1" ></i>
                <!--                <div class="imageicon1">
                                </div>-->
            </a>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
        <div class="col-sm-3 pr-2">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image4">

    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/face-botox.png">-->
                </div>
                <!--<i class="fa icon-optometrist5 fa-5x circle-icon"/>-->
                <i class="fa icon-sunglasses2 icontest1" ></i>
                <!--                <div class="imageicon1">
                                </div>-->
            </a>
            <div class="benefitHeader">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
    </div>
</div>


<!--2.-->
<hr style="
    height: 10px;
    width: 100%;
    ">
<div class="container">
    <div class="row">
        <div class="col-sm-6 benefitWrapper1">
            <div class="benefitIcon ">
                <a href="http://localhost/wordpress/kontakt">
                    <i class="icon-testing-glasses2 service_icon1"></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/laser-surgery1.png">-->
            </div>
            <div class="benefitHeader1" style="
                 text-align: left;
                 ">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent1">
                <p>Curabitur eleifend a massa rhoncus gravida.</p>
                <!--                <div class="benefirButton">
                                    <a href="#" type="button" class="btn btn-outline-primary">Saznaj vise</a>
                                </div>-->
            </div>
        </div>
        <div class="col-sm-6 benefitWrapper1">
            <div class="benefitIcon ">
                <a href="http://localhost/wordpress/kontakt">
                    <i class="icon-beauty2 service_icon1"></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/laser-surgery1.png">-->
            </div>
            <div class="benefitHeader1" style="
                 text-align: left;
                 ">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent1">
                <p>Curabitur eleifend a massa rhoncus gravida.</p>
                <!--                <div class="benefirButton">
                                    <a href="#" type="button" class="btn btn-outline-primary">Saznaj vise</a>
                                </div>-->
            </div>
        </div>

    </div>
    <div class="row justify-content-center text-left">
        <div class="col-sm-6 benefitWrapper1">
            <div class="benefitIcon ">
                <a href="http://localhost/wordpress/kontakt">
                    <i class="icon-laser-surgery1 service_icon1"></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/ophthalmologist.png">-->
            </div>
            <div class="benefitHeader1">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent11">
                <p>Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
        <div class="col-sm-6 benefitWrapper1">
            <div class="benefitIcon">
                <a href="http://localhost/wordpress/kontakt">
                    <i class="icon-sunglasses2 service_icon1"></i></a>
                    <!--<img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/scalpel.png">-->
            </div>
            <div class="benefitHeader1">
                <h4>Estetska kirurgija</h4>
            </div>
            <div class="benefirContent11">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            </div>
        </div>
    </div>
</div>




<!--SERICE TEST END-->


<div class="container mb-5 mt-5 monthlyAction">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 monthlyActionImage align-self-center">
            <img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/companyLogo.png" alt=""/>
        </div> 
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 monthlyActionText align-self-center text-center">
            <h2>Akcija mjeseca</h2>
            <div class="separator-container">
                <div class="separator line-separator">?</div>
            </div>
            <h3>Narucite se za pregled do 29.6.2020 da ostavite popust</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
            <h1 class="actionSize goldColor">280 Kn</h1>
            <a href="#" type="button" class="btn btn-outline-primary">RREZERVIRAJTE TERMIN</a>
        </div> 
    </div>
</div> 

<!--SERVICES-->
<div class="container mb-5 mt-5 pl-0 pr-0">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pr-4">
            <div class="serviceContainer servicesOne">
                <div class="serviceContainerOverlay">
                    <div class="serviceContainerOverlayHeader ">
                        <h4>Neki novi naslov za prikaz</h4>
                    </div>
                    <div class="serviceContainerOverlayContent">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
                        <div class="serviceuButton">
                            <a href="#" type="button" class="btn btn-outline-primary">Naruci se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pr-4 servicePadding">
            <div class="serviceContainer servicesTwo">
                <div class="serviceContainerOverlay">
                    <div class="serviceContainerOverlayHeader ">
                        <h4>Neki novi naslov za prikaz u dva reda</h4>
                    </div>
                    <div class="serviceContainerOverlayContent">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
                        <div class="serviceuButton">
                            <a href="#" type="button" class="btn btn-outline-primary">Naruèi se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pr-4 servicePadding">
            <div class="serviceContainer servicesThree">
                <div class="serviceContainerOverlay">
                    <div class="serviceContainerOverlayHeader ">
                        <h4>Neki novi naslov za prikaz</h4>
                    </div>
                    <div class="serviceContainerOverlayContent">
                        <p>TLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
                        <div class="serviceuButton">
                            <a href="#" type="button" class="btn btn-outline-primary">Naruèi se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--SERVICES END-->




<!--SLIDER NEWS-->

<div class="container mb-3 mt-5">
    <div class="row justify-content-center text-center">
        <div class="col-6">
            <h2>Novosti</h2>
            <div class="separator-container">
                <div class="separator line-separator">?</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien.</p>
        </div>
    </div> 
</div>

<div class="container-fluid">
    <?php echo do_shortcode('[sp_wpcarousel id="86"]'); ?>

</div>

<div class="container">
 <?php echo do_shortcode('[sp_wpcarousel id="132"]'); ?>
</div>

<!--LOCATION-->


<div class="container-fluid">
    <div class="row">
        <div class="col pr-0 pl-0">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d733.7393178840098!2d18.109665913831744!3d42.641065779688155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134c0b32fe72ddcd%3A0xf3698b62ee28fd17!2sLa%20Bodega%20Dubrovnik!5e0!3m2!1shr!2shr!4v1590312877422!5m2!1shr!2shr" frameborder="0" style="border:0; width: 100%; height: 600px;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>


<div class="si-container">


</div><!-- END .si-container -->

<?php
get_footer();
