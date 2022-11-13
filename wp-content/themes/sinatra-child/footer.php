<?php
/**
 * The template for displaying the footer in our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */
?>

<style>

    #sinatra-copyright{
        background-color: #23282d;
        color: #9BA1A7;
    }

</style>

<?php do_action('sinatra_main_end'); ?>

</div><!-- #main .site-main -->
<?php do_action('sinatra_after_main'); ?>

<?php do_action('sinatra_before_colophon'); ?>

<?php if (sinatra_is_colophon_displayed()) { ?>
    <footer id="colophon" class="site-footer" role="contentinfo"<?php sinatra_schema_markup('footer'); ?>>

        <div class="container pt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="wp-block-columns">
                        <div class="wp-block-column" style="flex-basis:100%">
                            <ul class="wp-block-page-list" style="list-style-type: none;">
                                <li class="wp-block-pages-list__item">
                                    <a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja' ?>" >Svi proizvodi</a>
                                </li>
                                <li class="wp-block-pages-list__item">
                                    <a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/cesto-postavljena-pitanja' ?>" >Personalizirani posteri</a>
                                </li>
                                <li class="wp-block-pages-list__item">
                                    <a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/o-nama' ?>" >Posteri u setovima</a>
                                </li>
                                <li class="wp-block-pages-list__item">
                                    <a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/kontakt' ?>" >Line posteri</a>
                                </li>
                                <li class="wp-block-pages-list__item">
                                    <a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/kontakt' ?>" >Inspirativni posteri</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="wp-block-columns">
                        <div class="wp-block-column" style="flex-basis:100%">
                            <ul class="wp-block-page-list" style="list-style-type: none;">
                                <li class="wp-block-pages-list__item">
                                    Ime obrta
                                </li>
                                <li class="wp-block-pages-list__item">
                                    Adresa obrta 1
                                </li>
                                <li class="wp-block-pages-list__item">
                                    Hravsta
                                </li>
                                <li class="wp-block-pages-list__item">
                                    IBAN: HR1231231231223123
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div style="text-align: center;font-size: 11pt;">
                        <b>Fiksni tečaj EUR prema HRK
                            <div>1 EUR = 7,53450 HRK</div></b>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="padding-left: 5rem;">
                    
                    
                    <div class="wp-block-columns">
                        <div class="wp-block-column" style="flex-basis:100%">
                            <ul class="wp-block-page-list" style="list-style-type: none;">
                                <li class="wp-block-pages-list__item">
                                   <a href="<?php echo site_url() ?>/kontakt" target="_blank">
                            <div>
                                <i class="fa fa-solid fa-envelope  contact-icon" ></i> <span>
                                    framesforyou1@gmail.com
                                </span>
                            </div>
                        </a>
                                </li>
                                <li class="wp-block-pages-list__item">
                                    <a href="https://www.instagram.com/_framesforyou_/" target="_blank">
                            <div>
                                <i class="icon-instagram contact-icon" ></i>
                                <span>_framesforyour_</span>	
                            </div>
                        </a>
                                </li>
                                <li class="wp-block-pages-list__item">
<a href="https://www.facebook.com/people/Frames-For-You-Personalizirani-Okviri/100070659595349/" target="_blank">
                            <div>
                                <i class="icon-facebook contact-icon" ></i>
                                <span>Frames for you</span>
                            </div>
                        </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                   
                </div>

            </div>

            <div class="uvjetiPoslovanja mt-4" style="text-align: center; font-size: 10pt;">
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja' ?>" >Opći uvjeti poslovanja</a></span>
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja/#placanje' ?>" >Način plaćanja</a></span>
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja/#dostava' ?>" >Dostava</a></span>
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja/#reklamacije' ?>" >Reklamacija</a></span>
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja/#pravilaprivatnosti' ?>" >Zaštita osobnih podataka</a></span>
                <span class="pr-4" ><a class="wp-block-pages-list__item__link" href="<?php echo site_url() . '/uvjeti-poslovanja/#faq' ?>" >Često postavljanja pitanja</a></span>
            </div>
        </div>




    </div>


    <?php do_action('sinatra_footer'); ?>

    </footer><!-- #colophon .site-footer -->
<?php } ?>

<?php do_action('sinatra_after_colophon'); ?>

</div><!-- END #page -->
<?php do_action('sinatra_after_page_wrapper'); ?>
<?php wp_footer(); ?>

</body>
</html>
