<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voicer
 */
?>
<div id="post-<?php the_ID(); ?>" class="entry-content blog-post tt-blog-post">
    <ul class="post-meta">
        <?php  echo '<li class="search-post-meta-date">'.do_shortcode('[voicer_icon icon="icon-calendar"]').get_the_date().'</li>'; ?>
        <?php voicer_posted_on(); ?>
    </ul>
    <?php
    if ( is_front_page() && ! is_home() ) {
			the_title( sprintf( '<h3 class="entry-title7 post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
    } else {
			the_title( sprintf( '<h2 class="entry-title7 post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

    } ?>
    <div class="post-teaser">
        <p><?php the_excerpt(); ?></p>
	</div>
</div>