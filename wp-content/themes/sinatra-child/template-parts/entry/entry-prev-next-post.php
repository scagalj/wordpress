<?php
/**
 * Template part for displaying Previous/Next Post section.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */
// Do not show if post is password protected.
if (post_password_required()) {
    return;
}

$sinatra_next_post = get_next_post();
$sinatra_prev_post = get_previous_post();

// Return if there are no other posts.
if (empty($sinatra_next_post) && empty($sinatra_prev_post)) {
    return;
}
?>

<?php do_action('sinatra_entry_before_prev_next_posts'); ?>
<div class="container-fluid mb-5">
    <?php echo do_shortcode('[sp_wpcarousel id="86"]'); ?>

</div>

<?php do_action('sinatra_entry_after_prev_next_posts'); ?>
