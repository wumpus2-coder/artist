<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Voicer
 */
    get_header(); 
?>
<div class="block block--title ch-separator tt-bc-block mb-0">
    <div class="container">
        <div class="text-center">
            <h1 class="title-color"><?php esc_html_e('404', 'voicer'); ?></h1>
            <?php if (function_exists('voicer_theme_breadcrumbs')) voicer_theme_breadcrumbs(); ?>
        </div>
    </div>
</div>
<div class="block offset-80 blog-categories-tags ch-separator bg-page bg-page-blog">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="four-zero-page-area">
                    <h2><?php esc_html_e('404', 'voicer'); ?></h2>
                    <h3><?php esc_html_e('Sorry Page Was Not Found', 'voicer'); ?></h3>
                    <p><?php esc_html_e('The page you are looking is not available or has been removed.', 'voicer'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>