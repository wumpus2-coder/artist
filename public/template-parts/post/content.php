<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Voicer
 */
?>
<?php
$voicer_add_content = esc_attr(get_post_meta($post->ID, 'voicer_add_content', true ));
$tt_post_add_content = do_shortcode(get_post_meta($post->ID, 'tt_post_add_content', true ));
$tt_post_fstate = esc_attr(get_post_meta($post->ID, 'tt_post_fstate', true ));
$voicer_gallery_type = esc_html(get_option('voicer_gallery_type'));
if (isset($_GET['voicer_gallery_type'])) : $voicer_gallery_type = esc_html($_GET['voicer_gallery_type']); endif;
global $k;

$k = $k + 1;
?>
<div id="post-<?php the_ID(); ?>" class="post-count-<?php echo esc_attr($k); ?> entry-content blog-post tt-blog-post <?php echo (isset($voicer_gallery_type) && $voicer_gallery_type == 'grid' ? 'filtr-item' : ''); ?> <?php echo (is_sticky() ? 'voicer_sticky' : ''); ?>">
    <?php if (isset($voicer_gallery_type) && $voicer_gallery_type == 'grid') : ?><div class="blog-post-inside"><?php endif; ?>
    <div class="post-image">
        <?php if ( ('' !== get_the_post_thumbnail() && ! is_single()) ||  $tt_post_add_content != '' || $tt_post_fstate != 'true') : ?>

        <?php if ($voicer_add_content != true) :  echo do_shortcode(get_post_meta($post->ID, 'tt_post_add_content', true )); endif; ?>
            <?php if ($tt_post_fstate != 'true') : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'voicer-featured-image' ); ?>
            </a>
            <?php endif; ?>
        <?php endif; ?>
        <?php echo '<div class="post-date">'. get_the_date( 'j' ).'<span>'. get_the_date( 'M' ).'</span></div>'; ?>
    </div>


    <?php if ( 'post' === get_post_type() ) : ?>
        <ul class="post-meta">
            <?php  voicer_posted_on(); ?>
        </ul>
    <?php endif; ?>
    <?php
        if ( is_single() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
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
    <?php if (isset($voicer_gallery_type) && $voicer_gallery_type == 'grid') : ?></div><?php endif; ?>
	<?php
	if ( is_single() ) {
        voicer_entry_footer();
	}
	?>
</div>
