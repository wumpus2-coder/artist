<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Voicer
 */

$voicer_add_content = esc_attr(get_post_meta($post->ID, 'voicer_add_content', true ));
$tt_post_add_content = do_shortcode(get_post_meta($post->ID, 'tt_post_add_content', true ));
$tt_post_s_fstate = esc_attr(get_post_meta($post->ID, 'tt_post_s_fstate', true ));
?>
<article id="post-<?php the_ID(); ?>" class="entry-content blog-post ch-blog-single-post pt-md-0">
    <div class="post-image">
        <?php
        if ( !has_post_thumbnail(get_queried_object_id())) {
            $tt_single_image = 'true';
        } else {
            $tt_single_image = (!has_post_thumbnail( get_queried_object_id()) || $tt_post_s_fstate == 'true' ? (!isset($tt_post_s_fstate) || $tt_post_s_fstate == '' ? 'false' : esc_attr($tt_post_s_fstate)) : '');
            $thumbnail_test = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"size");
            if ($thumbnail_test[0] == '') : $tt_single_image = 'true';  endif;
                ?>
                    <?php
                    if ($tt_post_s_fstate != 'true') :
                        echo get_the_post_thumbnail( get_queried_object_id(), 'voicer-featured-image' );
                    endif;
                    ?>
                    <?php if ($tt_post_add_content != '' && ($voicer_add_content != true)) : echo ('<div class="tt_pb_43 add_content_wrapper">'.do_shortcode(get_post_meta($post->ID, 'tt_post_add_content', true )).'</div>'); endif;  ?>
                <?php
        }
        ?>
        <?php echo '<div class="post-date">'. get_the_date( 'j' ).'<span>'. get_the_date( 'M' ).'</span></div>';    ?>

    </div>
    <?php if ( 'post' === get_post_type() ) : ?>
    <ul class="post-meta">
        <?php voicer_posted_on(); ?>
    </ul>
    <?php endif; ?>
    <?php
            if ( is_single() ) {
                the_title( '<h1 class="post-title">', '</h1>' );
            } elseif ( is_front_page() && is_home() ) {
                the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            } else {
                the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
            ?>
    <div class="post-teaser">
        <?php
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'voicer' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
    <?php
    if ( is_single() ) {
        voicer_entry_footer();
    }
    if ( ! is_singular( 'attachment' ) ) :
        get_template_part( 'template-parts/post/author', 'bio' );
    endif;
    get_template_part( 'template-parts/post/navigation', 'block' );
    ?>
</article>
