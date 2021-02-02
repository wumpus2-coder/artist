<?php
/**
 * Template part for displaying pages on front page
 *
 * @package Voicer
 */

global $voicercounter;
$tt_title_state = esc_attr(get_post_meta($post->ID, 'tt_title_state', true ));
$tt_promo_content = wp_kses(get_post_meta($post->ID, 'tt_promo_content', true ) , voicer_tags());
?>

<article id="panel<?php echo esc_attr($voicercounter); ?>" class="tt-entry-header tt-front-page-panel <?php echo esc_attr($tt_title_state); ?> <?php echo esc_html (get_post_meta($post->ID, 'tt_block_css', true )); ?>">

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'voicer-featured-image' );
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>
		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div>
	<?php endif; ?>
		<div class="container7">
            <?php if (!isset($tt_title_state) || $tt_title_state != true) : ?>
                <div class="entry-header7 <?php echo esc_html((get_post_meta($post->ID, 'tt_title_class_outer', true ))); ?>">
                    <?php the_title( '<h2 class="entry-title7 '.esc_html(get_post_meta($post->ID, 'tt_title_class', true )).'">', '</h2>' ); ?>
                    <?php echo (isset($tt_promo_content) && $tt_promo_content != '' ? '<p class="p--lg">'.wp_kses($tt_promo_content, voicer_tags()).'</p>' : '');  ?>
                </div>
            <?php
        endif;
					the_content( sprintf(
                        wp_kses( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'voicer' ), 'default'),
						get_the_title()
					) );
				?>
			<?php
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) :
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );

                if ( $recent_posts->have_posts() ) : ?>
					<div class="recent-posts">
						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
</article>
