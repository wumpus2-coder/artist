<?php
/**
 * Displays content for front page
 *
 * @package Voicer
 */

$tt_title_state = esc_attr(get_post_meta($post->ID, 'tt_title_state', true ));
$tt_promo_content = wp_kses(get_post_meta($post->ID, 'tt_promo_content', true ) , 'default');
?>
<article id="post-<?php the_ID(); ?>"  class="tt-entry-header tt-front-page <?php echo esc_attr($tt_title_state); ?> <?php echo esc_attr(get_post_meta($post->ID, 'tt_block_css', true )); ?>">
	<?php
    if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'voicer-featured-image' );
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'voicer-featured-image' );
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>
		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div>
	<?php endif;
    if (!isset($tt_title_state) || $tt_title_state != true) : ?>
			<header class="entry-header7 <?php echo esc_html(get_post_meta($post->ID, 'tt_title_class_outer', true )); ?>">
				<?php the_title( '<h2 class="entry-title7 '.esc_html(get_post_meta($post->ID, 'tt_title_class', true )).'">', '</h2>' ); ?>
                <?php echo (isset($tt_promo_content) && $tt_promo_content != '' ? '<p class="p--lg">'.wp_kses($tt_promo_content, 'default').'</p>' : '');  ?>
            </header>
            <?php endif; ?>
            <div class="entry-content">
                        <?php
                            the_content( sprintf(
                                wp_kses( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'voicer' ), 'default'),
                                get_the_title()
                            ) );
                        ?>
            </div>
</article>