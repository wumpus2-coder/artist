<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
?>
<article id="post-<?php the_ID(); ?>" class="<?php  get_post_class(); ?>content-page tt-entry-header <?php esc_attr(get_post_meta($post->ID, 'tt_title_state', true )); ?> <?php echo esc_html(get_post_meta($post->ID, 'tt_block_css', true )); ?>">
    <?php if (!isset($tt_title_state) || $tt_title_state != true) : ?>
    <div class="block block--title ch-separator <?php echo esc_html (get_post_meta($post->ID, 'tt_title_class_outer', true )); ?> tt-bc-block mb-0">
    <div class="container">
            <div class="text-center">
                <?php the_title( '<h1 class="entry-title7 title-color '.esc_html(get_post_meta($post->ID, 'tt_title_class', true )).'">', '</h1>' ); ?>
                <?php if (function_exists('voicer_theme_breadcrumbs'))  voicer_theme_breadcrumbs(); ?>
                <?php echo (isset($tt_promo_content) && $tt_promo_content != '' ? '<p class="p--lg">'.wp_kses($tt_promo_content, voicer_tags()).'</p>' : '');  ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="<?php echo 'theme_plugin_detect_'.voicer_plugin_detect('shortcodes'); ?>  block inset-80 <?php echo (( comments_open() || get_comments_number() ) ? 'pb-0' : ''); ?>">
        <div class="container">
            <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'voicer' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
    </div>
</article>