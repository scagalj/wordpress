<?php declare(strict_types=1) ?>
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
<div id="fullPageHeader" class="container-fluid fullPageHeaderMain" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/framesforyouheader.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
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
                <h1 class="whiteColor">Pronađite najbolje postere <br/> koji se uklapaju Vašim potrebama</h1>
            </div>
            <div class="headerButton">
                <a href="<?php echo site_url() ?>/shop" >
                    <button type="button" class="btn btn-lg btn-header">
                        POGLEDAJTE PONUDU
                    </button></a>
            </div>
        </div>
    </div>




</div>
<!---------------HEADER END--------------------->


<!--<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/CiHt53rM71n/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> 
        <a href="https://www.instagram.com/reel/CiHt53rM71n/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> 
            <div style=" display: flex; flex-direction: row; align-items: center;"> 
                <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> 
                <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> 
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> 
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                </div>
            </div>
            <div style="padding: 19% 0;"></div> 
            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" 
                     xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                            <g>
                                <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div style="padding-top: 8px;"> 
                <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
            </div>
            <div style="padding: 12.5% 0;"></div> 
            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> 
                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> 
                    <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                </div>
                <div style="margin-left: 8px;"> 
                    <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> 
                    <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                </div>
                <div style="margin-left: auto;"> 
                    <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> 
                    <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> 
                    <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                </div>
            </div> 
            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> 
                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> 
                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a>
        <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
            <a href="https://www.instagram.com/reel/CiHt53rM71n/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Okviri (@_framesforyou_)</a></p></div>
</blockquote> 
<script async src="//www.instagram.com/embed.js"></script>-->

<!---------------SERICE ---------------------->

<div class="container-fluid">
    <div class="container" style="margin-top:19px;">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-1 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=new-arrivals' ?>">
                    <div class="image-container">
                        <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/proba2.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                                <div class="headerButton">
                                    <button type="button" class="btn btn-lg btn-header">
                                        NA POPUSTU
                                    </button>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-1 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=personalized' ?>">
                    <div class="image-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img10.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                                <div class="headerButton">
                                    <button type="button" class="btn btn-lg btn-header">
                                        NOVO
                                    </button>
                                </div>
                            </div>
                    </div>

                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pr-0 pb-4">
                <a href="<?php echo site_url() . '/shop/?product_cat=best-sellers' ?>">
                    <div class="image-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/proba1.jpg" alt="Avatar" class="image img-fluid" style="width:100%">
                            <div class="middle">
                                <div class="headerButton">
                                    <a href="<?php echo site_url() ?>/kontakt" >
                                        <button type="button" class="btn btn-lg btn-header" style="word-break: normal;">
                                            NAJPRODAVANIJE
                                        </button></a>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class=" mt-5" style="padding-left: 15%; padding-right: 15%; font-size: 11pt;">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <p class="text-center">
                    Mi znamo koliki luksuz i osvježenje svakom domu daju slike na zidovima, stoga smo za Vas pripremili širok i raznolik asortiman postera za Vaš dom. </p>
                <p class="text-center">
                    Da bi se posteri uklopili u svaki prostor bio on veći ili manji pobrinuli smo se da u ponudi imamo čak 4 standardne dimenzije: 21x30cm, 30x40cm, 40x50cm, 50x70cm.</p>
                <p class="text-center">
                    Ono po čemu smo drugačiji su naši personalizirani posteri koje je moguće upotpuniti Vašim imenima, inicijalima, Vama bitnim datumima ili nekim citatom. Svi personalizirani posteri dizajniraju se individualno za Vas te ih prije tiska šaljemo Vama na uvid putem e-mail adrese.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container mt-5 mb-5">

        <div class="row justify-content-center">
            <h4>NAŠI FAVORITI</h4>
        </div>
        <div class="row justify-content-center mt-2">
            <?php echo fetchCategoriesForName(); ?>
        </div>
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


<div class="container-fluid">
    <div class="container mt-5">
        <div class="row d-flex mt-5">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div style="height: 500px; background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/personaliziraniPosteriHeader.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
                    <div class="verticalmiddle">
                        <div class="headerButton">
                            <button type="button" class="btn btn-lg btn-header">
                                Personalizirani posteri
                            </button>
                        </div>
                    </div>
                    <!--                <div class="row promotingContent">
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
                                    </div>-->
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

<div class="container-fluid">
    <div class="container mt-3 mb-3">
        <div class="row d-flex">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 pr-0 pb-4">
                <a href="<?php echo site_url() . '/kontakt' ?>">
                    <div class="image-container">
                        <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/proba6.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="verticalmiddle">
                                <div class="headerButton">
                                    <button type="button" class="btn btn-lg btn-header">
                                        Inspirativni posteri
                                    </button>
                                </div>
                            </div>
                    </div>

                </a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 pb-4">
                <a href="<?php echo site_url() . '/galerija' ?>">
                    <div class="image-container">
                        <!--<img src="<?php echo bloginfo('template_url'); ?>/images/download5.jpg" alt="Avatar" class="image" style="width:100%">-->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/vaseslikenaslovna1.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="verticalmiddle">
                                <div class="headerButton">
                                    <button type="button" class="btn btn-lg btn-header">
                                        Vaši posteri
                                    </button>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
                <div class="importantNoticeIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                    </svg>
                </div>
                <div class="importantNoticeTitle">
                    <h6>PERSONALIZACIJA</h6>
                </div>
                <div class="importantNoticeDescription">
                    <span>Mogućnost personalizacije prema Vašim željama</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
                <div class="importantNoticeIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg>
                </div>
                <div class="importantNoticeTitle">
                    <h6>BESPLATNA DOSTAVA</h6>
                </div>
                <div class="importantNoticeDescription">
                    <span>Besplatna dostava iznad 240 kuna</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 pr-5 pb-3 justify-content-center text-center">
                <div class="importantNoticeIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                </div>
                <div class="importantNoticeTitle">
                    <h6>BRZA DOSTAVA</h6>
                </div>
                <div class="importantNoticeDescription">
                    <span>Brza i sigurna dostava unutar 4-6 radnih dana</span>
                </div>
            </div><div class="col-12 col-sm-12 col-md-6 col-lg-3 pb-3 justify-content-center text-center">
                <div class="importantNoticeIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                </div>
                <div class="importantNoticeTitle">
                    <h6>JEDNOSTAVNO PLAĆANJE</h6>
                </div>
                <div class="importantNoticeDescription">
                    <span>Mogućnost plaćanja na račun ili pouzećem</span>
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="mt-3">

</div>
<?php get_footer(); ?> 