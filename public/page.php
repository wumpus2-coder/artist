<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main page-main  ch-separator" role="main">
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/page/content', 'page' );

                if ( comments_open() || get_comments_number() ) :
                    echo '<div class="container pb-8">';
                    comments_template();
                    echo '</div>';
                endif;
            endwhile;
            ?>
        </main>
    </div>
<?php get_footer();
