<?php
/**
 * create widgets and sidebars, add widgets to sidebars
 *
 * @package Voicer
 */
function voicer_categories($atts,$echo = false) {
    $atts = shortcode_atts( array('show_count' => 1), $atts, 'voicer_categories' );
    $show_count = "{$atts['show_count']}";
    $args = array(
        'orderby' => 'id',
        'show_count' => $show_count,
        'title_li' => '',
        'echo'   => 0,
        'use_desc_for_title' => 1,
        'exclude' => 1
    );
    return '<ul class="category-list">'.wp_list_categories($args).'</ul>';
}
function voicer_featured_posts($atts){
    $widget_title = esc_html__( 'Featured', 'voicer' );
    $atts = shortcode_atts( array('qty' => 2), $atts, 'voicer_featured_posts' );
    $posts_per_page = "{$atts['qty']}";
    $args = array(
        'posts_per_page' => $posts_per_page,
        'meta_key' => 'tt_post_state',
        'meta_query' => array(
            array(
                'key' => 'tt_post_state',
                'value' => 'true',
                'compare' => '=',
            )
        )
    );
    $featured = new WP_Query($args);
    echo '<div class="side-block"><h3>' . esc_html($widget_title). '</h3>';
    if ($featured->have_posts()) {
        while ($featured->have_posts()):
            $featured->the_post();
            echo '<div class="blog-post post-preview">';
            if (has_post_thumbnail()) :
                echo '<div class="post-image">';
                echo '<a href="'; the_permalink();  echo '">';  the_post_thumbnail(); echo '</a>';
                echo '</div>';
            endif;
            echo '<ul class="post-meta">';
            echo '<li class="post-meta-date"><i class="icon icon-clock"></i>'; echo get_the_date('m.d.Y'); echo '</li>';
            echo '<li class="post-meta-reviews pull-right"><i class="icon icon-interface"></i><span>'; echo get_comments_number(); echo '</span></li>';
            echo '</ul>';
            echo '<h4 class="post-title">';
            echo '<a href="'; the_permalink();  echo '">';  the_title(); echo '</a>';
            echo '</h4>';
            echo '<div class="post-author">';
            esc_html_e('by ','voicer');
            echo '<a href="'; the_author_posts();  echo '">';  the_author(); echo '</a>';
            echo '</div>';
            echo '</div>';
        endwhile;
        echo '</div> ';
    } else {
        esc_html_e('Set post(s) as "Featured" to see block ','voicer');
    }
    wp_reset_query();
}
function voicer_tagcloud($atts,$echo = false) {
    if (function_exists('wp_tag_cloud'))
        $atts = shortcode_atts( array('taxonomy' => 'post_tag'), $atts, 'voicer_tagcloud' );
    $taxonomy = "{$atts['taxonomy']}";
    $args = array(
        'smallest'                  => 15,
        'largest'                   => 22,
        'unit'                      => 'px',
        'number'                    => 45,
        'format'                    => 'list',
        'separator'                 => "\n",
        'orderby'                   => 'name',
        'order'                     => 'ASC',
        'exclude'                   => null,
        'link'                      => 'view',
        'taxonomy'                  => $taxonomy,
        'echo'                      => false,
        'child_of'                  => null,
    );
    return wp_tag_cloud( $args );
}