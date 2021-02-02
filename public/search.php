<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Voicer
 */
get_header(); ?>
<div class="wrap7 tt-page-main">
    <div class="block block--title ch-separator tt-bc-block mb-0">
        <div class="container text-center">
            <h1 class="title-color"><?php esc_html_e('Search', 'voicer'); ?></h1>
            <?php
                if (function_exists('voicer_theme_breadcrumbs')) :
                    voicer_theme_breadcrumbs();
                endif;
            ?>
        </div>
    </div>
    <div class="block offset-80 blog-categories-tags ch-separator  bg-page bg-page-blog">
        <div class="container">
            <?php
            $sidebar_id1 = voicer_sidebars('sb_blog01');
            if (is_dynamic_sidebar($sidebar_id1)&& ! is_page() ) {
                $class = 'col-md-9 ';
            } else {
                $class = 'no-sidebar';
            }
            ?>
            <div class="row">
                <div id="primary" class="content-area <?php echo esc_attr($class); ?> aside">
                    <main id="main" role="main">
                    <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/post/content', 'excerpt' );
                            endwhile;
                            voicer_the_posts_pagination();
                        else : ?>
                            <h3><?php esc_html_e( 'Nothing Found', 'voicer' ); ?></h3>
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'voicer' ); ?></p>
                            <?php
                            get_search_form();
                        endif;
                        ?>
                    </main>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
