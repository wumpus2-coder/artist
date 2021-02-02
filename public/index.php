<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists. *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */

get_header();
?>
<div class="wrap7 tt-page-main 777 bg-page bg-page-blog">
	<?php
if ( is_home() && ! is_front_page() ) :

    $page_id = voicer_get_parent_blog_page();
    $tt_title_state = esc_attr(get_post_meta($page_id, 'tt_title_state', true ));

    if (single_post_title('',false) != '') :
        ?>
        <div class="block tt-blog-posts-page tt-page-index pt-0 pb-0">
            <?php if (!isset($tt_title_state) || $tt_title_state != true) : ?>
            <div class="block block--title ch-separator tt-bc-block mb-0 ">
                <div class="container text-center">
                    <h1 class="title-color"><?php single_post_title(); ?></h1>
                    <?php
                    if (function_exists('voicer_theme_breadcrumbs')) :
                        voicer_theme_breadcrumbs();
                    endif;
                    ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php
    endif;
else :
    ?>
    <div class="block block--title ch-separator tt-bc-block pt-0 pb-0">
        <div class="container text-center">
            <h1 class="title-color title--posts-page"><?php esc_html_e( 'Blog Posts', 'voicer' ); ?></h1>
            <?php
            if (function_exists('voicer_theme_breadcrumbs')) :
            voicer_theme_breadcrumbs();
            endif;
            ?>
        </div>
    </div>


    </div>
	<?php endif; ?>
<?php if ( have_posts() ) : ?>
    <div class="block offset-80 <?php echo (get_theme_mod('voicer_blog_type') == 'grid' ? 'mt-0' : ''); ?> blog-all-posts tt-page-index ch-separator <?php echo (get_theme_mod('voicer_blog_type') == 'grid' ? 'ch-index-isotope' : 'ch-index-column'); ?>">
<?php endif; ?>
    <div class="container <?php echo (get_theme_mod('voicer_blog_type') == 'grid' ? 'grid' : ''); ?>">
        <?php
        $sidebar_id1 = voicer_sidebars('sb_blog02');
        $sidebar_id2 = voicer_sidebars('sb_blog01');

        if ((is_dynamic_sidebar($sidebar_id1) || is_dynamic_sidebar($sidebar_id2)) && ! is_page() ) {
            $class = 'col-md-9';
        } else {
            $class = 'no-sidebar';
        }

        if (get_theme_mod('voicer_blog_type') != 'grid') :
            if (single_post_title('',false) != '') :
            endif;
            ?>
    <div class="row">
        <div id="primary" class="content-area <?php echo esc_attr($class); ?> aside">
		    <main id="main" class="site-main page-main" role="main">
        <?php endif; ?>

        <?php if ( have_posts() ) :  if (get_theme_mod('voicer_blog_type') == 'grid') : ?>
        <div class="text-center tt_pt_59">
            <h1 class="tt-entry-title h1"><?php esc_html_e( 'Blog Posts Isotope', 'voicer' ); ?></h1>
            <div class="h-decor"></div>
        </div>
                        <div class="blog-isotope mt-2 mt-md-4">
            <?php
    endif;
        $k = 0;
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/post/content', get_post_format() );
        endwhile;
        if (get_theme_mod('voicer_blog_type') == 'grid') :
            echo '</div> ';
        endif;

        if (function_exists('voicer_the_posts_pagination')) {
            voicer_the_posts_pagination();
        } else {
            the_posts_pagination( array(
                'prev_text' => voicer_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'voicer' ) . '</span>',
                'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'voicer' ) . '</span>' . voicer_get_svg( array( 'icon' => 'arrow-right' ) ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'voicer' ) . ' </span>',
            ) );
        }
    else :
        get_template_part( 'template-parts/post/content', 'none' );
    endif;
        ?>
        <?php if (get_theme_mod('voicer_blog_type') != 'grid') : ?>
		    </main>
	    </div>
        <?php get_sidebar(); ?>
    </div>
    <?php endif; ?>
    </div>
<?php if ( have_posts() ) : ?>
    </div>
    <?php endif; ?>
</div>
<?php get_footer();
