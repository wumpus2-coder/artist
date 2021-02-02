<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Voicer
 */
get_header();
global $post;
                while ( have_posts() ) : the_post();

                        ?>
                <div class="block block--title ch-separator tt-bc-block mb-0">
                    <div class="container text-center">
                        <h1 class="title-color title--posts-page"><?php esc_html_e( 'Blog Post', 'voicer' ); ?></h1>
                        <?php
                        if (function_exists('voicer_theme_breadcrumbs')) :
                            voicer_theme_breadcrumbs();
                        endif;
                        ?>
                    </div>
                </div>
<div class="block offset-80 ch-separator ch-single-product-bg">
                    <div class="container">
                            <div class="row">
                                <div class="content-area col-md-9 aside">
                                    <?php
                                    if ($post->post_type == 'product') {
                                        the_content();
                                    } else {
                                        get_template_part( 'template-parts/post/ttcontent-single', get_post_format() );
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;
                                    }
                                    ?>
                                </div>
                                <?php (($post->post_type == 'product') ? '' : get_sidebar()); ?>
                            </div>
                        </div>
          <?php

                endwhile;
          ?>
</div>

</div>


<?php get_footer();