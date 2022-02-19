<?php
/**
 * Template Name: Page template
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
        <div id="primary" class="content-area">

        <?php do_action('sinatra_before_content'); ?>

        <main id="content" class="site-content" role="main"<?php sinatra_schema_markup('main'); ?>>
            <?php
            do_action('sinatra_before_singular');
            do_action('sinatra_content_singular');

            do_action('sinatra_after_singular');
            ?>

        </main><!-- #content .site-content -->

        <?php do_action('sinatra_after_content'); ?>

    </div><!-- #primary .content-area -->
</div>

<?php
get_footer();
