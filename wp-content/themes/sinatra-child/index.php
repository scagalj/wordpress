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

<!---------------HEADER--------------------->
<div id="fullPageHeader" class="container-fluid fullPageHeaderMain" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/header1.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
    <!--<div id="fullPageHeader" class="container-fluid fullPageHeaderMain" >-->
    <!--
   <div id="headerContent" class="pageContent">
       <div class="container-fluid pr-4">
           <div class="row">
               <div class="col-sm-2 col-md-2 col-lg-2 col-xl-4">
               </div>
               <div class="col-sm-10 col-md-10 col-lg-10 col-xl-8 pr-20">
                   <div class="text-center">
                       <h1 class="headerTitle">Bo Vision 2<span>poliklinika </span></h1>
    <!--                        <div class="separator-container">
                                <div class="separator line-separator"></div>
                            </div><br/>
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
            <h5 class="name fw-800">RADNO VRIJEME </h5>
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
            <p>Četvrtak: </p>
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
            <button type="button" class="btn btn-header btn-darkblue btn-outline-primary">
                Naručite se
            </button></a>
        <span style="padding-right: 10px;" ></span>
        <a href="<?php echo site_url() ?>/cjenik" >
            <button type="button" class="btn btn-header btn-outline-primary">
                Cjenik
            </button>
        </a>
    </div>
</div>
</div>
</div>
</div>

</div>
    -->
    <style>
        .headerButton{
            text-align: center;
            padding-top: 15px;
        }
        .btn-header{
            background-color: black;
            border-radius: 0px;
            color:white;
        }

        .btn-header:hover{
            background-color: white;
        }

        .headerName{
            text-align: center;
            padding-top: 200px;
        }

        .whiteColor{
            color:white !important;
        }
    </style>

    <div id="headerContent" class="pageContent">
        <div class="container-fluid">
            <div class="headerName">
                <h1 class="whiteColor">Find best posters <br/> that suits your place</h1>
            </div>
            <div class="headerButton">
                <a href="<?php echo site_url() ?>/shop" >
                    <button type="button" class="btn btn-lg btn-header">
                        ORDER NOW
                    </button></a>
            </div>
        </div>
    </div>




</div>
<!---------------HEADER END--------------------->

<!---------------SERICE ---------------------->

<div class="container-fluid">
    <!--    <div class="row pb-5">
            <div class="container mb-3">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-8">
                        <h2 class="fw-600">Naše usluge</h2>
                        <div class="separator-container">
                            <div class="separator line-separator"></div>
                        </div><br/>
                        <div>
                            <h4 class="fw-300">Nudimo veliki spektar usluga, pomoću vrlo kvalitetnih uređaja i osoblja. Kvalitetnu kontrolu dioptrije kao i veliki spektar dioptrijskih i sunčanih naočala.</h4>
                        </div>
                    </div>
                    <div>
                    </div> 
                </div>
            </div>
        </div>-->
    <!--    <div class="container mb-5">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-sm-3 benefitWrapper">
                    <div class="benefitIcon benefitIconBorder">
                        <a href="<?php echo site_url() . '/kontakt' ?>">
                            <i class="icon-optometry service_icon" ></i></a>
                            <img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/face-botox.png">
                    </div>
                    <div class="benefitHeader">
                        <h4>Oftamološki pregled</h4>
                    </div>
                    <div class="benefirContent">
                        <p>Mjerenje očnog tlaka, određivanje dioptrije, i pregled biomikroskopom</p>
                    </div>
                </div>
                <div class="col-sm-3 benefitWrapper">
                    <div class="benefitIcon benefitIconBorder">
                        <a href="<?php echo site_url() . '/kontakt' ?>">
                            <i class="icon-view service_icon" ></i></a>
                            <img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/laser-surgery1.png">
                    </div>
                    <div class="benefitHeader">
                        <h4>Estetske korekcije</h4>
                    </div>
                    <div class="benefirContent">
                        <p>Uklonite sitne i duboke bore, poboljšajte konture lica i očiju pomoću botox-a. Učink je vidljiv u roku od nekoliko dana, bez straha od kirurškog noža.</p>
                                        <div class="benefirButton">
                                            <a href="#" type="button" class="btn btn-outline-primary">Saznaj vise</a>
                                        </div>
                    </div>
                </div>
                <div class="col-sm-3 benefitWrapper">
                    <div class="benefitIcon benefitIconBorder">
                        <a href="<?php echo site_url() . '/kontakt' ?>">
                            <i class="icon-laser-surgery4 service_icon" ></i></a>
                            <img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/ophthalmologist.png">
                    </div>
                    <div class="benefitHeader">
                        <h4>Laserska korekcija vida</h4>
                    </div>
                    <div class="benefirContent">
                        <p>Uklonite dioptriju uz pomoć laserske korekcije vida.</p>
                    </div>
                </div>
                <div class="col-sm-3 benefitWrapper">
                    <div class="benefitIcon">
                        <a href="<?php echo site_url() . '/kontakt' ?>">
                            <i class="icon-glasses service_icon" ></i></a>
                            <img class="img-responsive" src="http://localhost/wordpress/wp-content/uploads/2020/11/scalpel.png">
                    </div>
                    <div class="benefitHeader">
                        <h4>Luxal optika</h4>
                    </div>
                    <div class="benefirContent">
                        <p>Nudimo široki spektar dioptrijskih i sunčanih naočala.</p>
                        
                    </div>
                </div>
            </div>
        </div>-->


    <!--SERICE TEST-->


    <div class="container" style="margin-top:19px;">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-1 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=new-arrivals' ?>">
                    <div class="image-container">
                        <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doctor_v1.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                            <div class="headerButton">
                                <button type="button" class="btn btn-lg btn-header">
                                    NEW ARRIVALS
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-1 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=personalized' ?>">
                    <div class="image-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img7.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                            <div class="headerButton">
                                <button type="button" class="btn btn-lg btn-header">
                                    PERSONALIZED
                                </button>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-0 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=best-sellers' ?>">
                    <div class="image-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/optika1.jpg" alt="Avatar" class="image img-fluid" style="width:100%">
                        <div class="middle">
                            <div class="headerButton">
                                <a href="<?php echo site_url() ?>/kontakt" >
                                    <button type="button" class="btn btn-lg btn-header">
                                        BEST SELLERS
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5" >
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
            <div class="importantNoticeIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alt" viewBox="0 0 16 16">
                <path d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z"/>
                </svg>
            </div>
            <div class="importantNoticeTitle">
                <h6>FAST DELIVERY</h6>
            </div>
            <div class="importantNoticeDescription">
                <span>Delivery will be done in 3-5 working days</span>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
            <div class="importantNoticeIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                </svg>
            </div>
            <div class="importantNoticeTitle">
                <h6>FAST DELIVERY</h6>
            </div>
            <div class="importantNoticeDescription">
                <span>Delivery will be done in 3-5 working days</span>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
            <div class="importantNoticeIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-balloon-heart" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"/>
                </svg>
            </div>
            <div class="importantNoticeTitle">
                <h6>FAST DELIVERY</h6>
            </div>
            <div class="importantNoticeDescription">
                <span>Delivery will be done in 3-5 working days</span>
            </div>
        </div><div class="col-12 col-sm-12 col-md-6 col-lg-3 pb-3 justify-content-center text-center">
            <div class="importantNoticeIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
            </div>
            <div class="importantNoticeTitle">
                <h6>FAST DELIVERY</h6>
            </div>
            <div class="importantNoticeDescription">
                <span>Delivery will be done in 3-5 working days</span>
            </div>
        </div>
    </div>
</div>  

<style>
    .redBackground{
        background-color: red;
    }


</style>

<div class="container mt-5">

        <div class="row justify-content-center">
            <h4>OUR BEST SELLINGS</h4>
        </div>
        <div class="row justify-content-center">
            <?php echo fetchCategoriesForName(); ?>
        </div>
</div>

<style>
    .promotingContentText{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .promotingContent{
        align-items: center;
        justify-content: right;
        height: 100%;
    }

    .wg-primary{
        background-color: white !important ;
    }

</style>



<div class="container mt-5">
    <div class="row d-flex mt-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div style="height: 400px; background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/header1.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
                <div class="row promotingContent">
                    <div class="col-6 col-sm-5 col-md-4 col-lg-3">
                        <div class="embed-responsive embed-responsive-1by1 text-center" style="padding-bottom:60px;">
                            <div class="embed-responsive-item wg-primary promotingContentText">
                                <h4>Dječije kartice</h4>
                                <a href="<?php echo site_url() ?>/kontakt" >
                                    <button type="button" class="btn btn-md btn-header">
                                        ORDER NOW
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .imageTextDescription{
        padding: 12px;
        background-color: wheat;
    }

</style>

<div class="container mt-3 mb-3">
    <div class="row d-flex">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 pr-0 pb-4">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image-container">
                    <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doctor_v1.jpg" alt="Avatar" class="image" style="width:100%">
                </div>

            </a>
            <div class="imageTextDescription">
                <h4>Best selling frames <i class="fa fa-arrow-right"></i></h4>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 pb-4">
            <a href="<?php echo site_url() . '/kontakt' ?>">
                <div class="image-container">
                    <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doctor_v1.jpg" alt="Avatar" class="image" style="width:100%">
                </div>
            </a>
            <div class="imageTextDescription">
                <h4>Inspiration home quote's <i class="fa fa-arrow-right"></i></h4>
            </div>
        </div>
    </div>
</div>



<div class="mt-3">

</div>
<?php get_footer(); ?> 