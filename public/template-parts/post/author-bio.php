<?php
/**
 * The template for displaying Author info
 *
 * @package Voicer
 */

if ( (bool) get_the_author_meta( 'description' ) ) : ?>
<div class="author-bio tt-section-cert__image-wrapper d-md-flex text-center text-md-left">

    <div class="author-bio-gravatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 111 ); ?></div>
	<div class="author-bio-info">
        <h4>
            <?php
            printf(
                esc_html__( 'About %s', 'voicer' ),
                esc_html( get_the_author() )
            );
            ?>
        </h4>
        <p class="author-bio-description"><?php the_author_meta( 'description' ); ?></p>
        <div class="post-meta-social">
            <?php echo do_shortcode(get_post_meta($post->ID, 'tt_post_socials_content', true ));  ?>
        </div>

	</div>
</div>
<?php endif; ?>
