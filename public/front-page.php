<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main page-main 777 <?php echo voicer_plugin_detect('shortcodes'); ?>">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>
		<?php
		if ( 0 !== voicer_panel_count() || is_customize_preview() ) :
			$num_sections = apply_filters( 'voicer_front_page_sections', 11 );
			global $voicercounter;
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$voicercounter = $i;
                voicer_front_page_section( null, $i );
			}
	endif; ?>
	</main>
</div>
<?php get_footer();