<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
?>
<div class="wrap7 tt-page-main">
<?php if ( have_posts() ) : ?>
    <div class="block block--title ch-separator tt-bc-block mb-0 ">
        <div class="container text-center">
            <h1 class="title-color"><?php the_archive_title(); ?></h1>
            <?php
                if (function_exists('voicer_theme_breadcrumbs')) :
                    voicer_theme_breadcrumbs();
                endif;
            ?>
        </div>
    </div>
	<?php endif; ?>
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
                        if ( have_posts() ) : ?>
                            <?php
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/post/content', get_post_format() );
                            endwhile;
                            voicer_the_posts_pagination();
                        else :
                            get_template_part( 'template-parts/post/content', 'none' );
                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
