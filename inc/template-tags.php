<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Voicer
 */

if ( ! function_exists( 'voicer_posted_on' ) ) :
function voicer_posted_on() {
	$byline = sprintf(
        esc_html__( '%s', 'voicer' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a>'
	);
	echo '<li class="author vcard post-author"><svg class="icon icon-user" width="17" height="13" viewBox="0 0 17 13" xmlns="http://www.w3.org/2000/svg"><path d="M8.93164 7.84082C9.46289 7.45345 9.87793 6.96094 10.1768 6.36328C10.4756 5.75456 10.625 5.11263 10.625 4.4375C10.625 3.85091 10.5143 3.30306 10.293 2.79395C10.0716 2.27376 9.76725 1.81999 9.37988 1.43262C8.99251 1.04525 8.53874 0.740885 8.01855 0.519531C7.50944 0.298177 6.96159 0.1875 6.375 0.1875C5.78841 0.1875 5.23503 0.298177 4.71484 0.519531C4.20573 0.740885 3.75749 1.04525 3.37012 1.43262C2.98275 1.81999 2.67839 2.27376 2.45703 2.79395C2.23568 3.30306 2.125 3.85091 2.125 4.4375C2.125 5.11263 2.27441 5.75456 2.57324 6.36328C2.87207 6.96094 3.28711 7.45345 3.81836 7.84082C3.30924 8.07324 2.83333 8.361 2.39062 8.7041C1.95898 9.0472 1.57715 9.4401 1.24512 9.88281C0.913086 10.3255 0.636393 10.807 0.415039 11.3271C0.204753 11.8363 0.0664062 12.373 0 12.9375H1.41113C1.49967 12.3398 1.69336 11.7809 1.99219 11.2607C2.29102 10.7406 2.66178 10.2923 3.10449 9.91602C3.5472 9.52865 4.04525 9.22982 4.59863 9.01953C5.16309 8.79818 5.75521 8.6875 6.375 8.6875C6.99479 8.6875 7.58138 8.79818 8.13477 9.01953C8.69922 9.22982 9.2028 9.52865 9.64551 9.91602C10.0882 10.2923 10.459 10.7406 10.7578 11.2607C11.0566 11.7809 11.2503 12.3398 11.3389 12.9375H12.75C12.6836 12.373 12.5397 11.8363 12.3184 11.3271C12.1081 10.807 11.8369 10.3255 11.5049 9.88281C11.1729 9.4401 10.7855 9.0472 10.3428 8.7041C9.91113 8.361 9.44076 8.07324 8.93164 7.84082ZM6.375 7.27637C5.60026 7.27637 4.93066 6.99967 4.36621 6.44629C3.81283 5.88184 3.53613 5.21224 3.53613 4.4375C3.53613 3.66276 3.81283 2.9987 4.36621 2.44531C4.93066 1.88086 5.60026 1.59863 6.375 1.59863C7.14974 1.59863 7.8138 1.88086 8.36719 2.44531C8.93164 2.9987 9.21387 3.66276 9.21387 4.4375C9.21387 5.21224 8.93164 5.88184 8.36719 6.44629C7.8138 6.99967 7.14974 7.27637 6.375 7.27637ZM14.6592 7.69141C14.9469 7.33724 15.1738 6.9388 15.3398 6.49609C15.5059 6.05339 15.5889 5.60514 15.5889 5.15137C15.5889 4.50944 15.4561 3.91732 15.1904 3.375C14.9248 2.82161 14.5706 2.35124 14.1279 1.96387C13.6963 1.56543 13.1927 1.27214 12.6172 1.08398C12.0527 0.884766 11.4606 0.823893 10.8408 0.901367C10.9404 1.00098 11.029 1.12272 11.1064 1.2666C11.1839 1.39941 11.2614 1.53776 11.3389 1.68164C11.4053 1.78125 11.4606 1.88639 11.5049 1.99707C11.5492 2.09668 11.5879 2.20182 11.6211 2.3125C12.429 2.45638 13.0544 2.79948 13.4971 3.3418C13.9398 3.87305 14.1611 4.47624 14.1611 5.15137C14.1611 5.60514 14.0505 6.03678 13.8291 6.44629C13.6188 6.84473 13.3532 7.16569 13.0322 7.40918C12.9215 7.48665 12.8441 7.5752 12.7998 7.6748C12.7666 7.77441 12.75 7.87402 12.75 7.97363C12.75 8.15072 12.7998 8.30566 12.8994 8.43848C12.999 8.57129 13.1374 8.6543 13.3145 8.6875C13.9564 8.83138 14.4932 9.16341 14.9248 9.68359C15.3675 10.1927 15.5889 10.7793 15.5889 11.4434H17C17 10.6686 16.7842 9.93815 16.3525 9.25195C15.932 8.56576 15.3675 8.04557 14.6592 7.69141Z"/></svg>' . $byline . '</li>';
    echo '<li class="post-meta-reviews"><svg class="icon icon-testimonials" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><path d="M12.5331 0H1.62687C1.28312 0 0.98625 0.119792 0.73625 0.359375C0.496667 0.598958 0.376875 0.885417 0.376875 1.21875V10.3438C0.376875 10.6875 0.496667 10.9792 0.73625 11.2188C0.98625 11.4479 1.28312 11.5625 1.62687 11.5625H6.17375L7.81437 13.75C7.86646 13.8333 7.93417 13.8958 8.0175 13.9375C8.11125 13.9792 8.205 14 8.29875 14C8.3925 14 8.48104 13.9792 8.56437 13.9375C8.65812 13.8958 8.73104 13.8333 8.78312 13.75L10.4237 11.5625H12.5331C12.8769 11.5625 13.1685 11.4479 13.4081 11.2188C13.6581 10.9792 13.7831 10.6875 13.7831 10.3438V1.21875C13.7831 0.885417 13.6581 0.598958 13.4081 0.359375C13.1685 0.119792 12.8769 0 12.5331 0ZM12.5331 10.3438H10.1269C10.0331 10.3438 9.93937 10.3646 9.84562 10.4062C9.76229 10.4479 9.69458 10.5104 9.6425 10.5938L8.29875 12.375L6.955 10.5938C6.90292 10.5104 6.83 10.4479 6.73625 10.4062C6.65292 10.3646 6.56437 10.3438 6.47062 10.3438H1.59562L1.62687 1.21875H12.5644L12.5331 10.3438ZM11.3456 2.70312H2.81437V3.92188H11.3456V2.70312ZM11.3456 5.14062H2.81437V6.35938H11.3456V5.14062ZM11.3456 7.57812H2.81437V8.78125H11.3456V7.57812Z"/></svg><span>'.get_comments_number(). esc_html__( ' Comment(s)', 'voicer' ).'</span></li>';

}
endif;

if ( ! function_exists( 'voicer_time_link' ) ) :
function voicer_time_link() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);
    return sprintf(
        wp_kses( __( '<span class="screen-reader-text">Posted on</span> %s', 'voicer' ), voicer_tags() ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
endif;
if ( ! function_exists( 'voicer_entry_footer' ) ) :
function voicer_entry_footer() {

	$categories_list = get_the_category_list();

	$tags_list = get_the_tag_list('<ul class="post-categories"><li>','</li><li>','</li></ul>' );

	if ( ( ( voicer_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer7 tt-blog-single-footer">';
			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && voicer_categorized_blog() ) || $tags_list ) {
                    if ( $tags_list ) {
                        echo '<div class="tags-wrapper"><h5 class="tags-title">' . esc_html__( 'Tags:', 'voicer' ) . '</h5> <span class="screen-reader-text">' . esc_html__( 'Tags', 'voicer' ) . '</span>' . $tags_list.'</div>';
                    }
                    if ( $categories_list && voicer_categorized_blog() ) {
                        echo '
                        <div class="cat-links tags-wrapper"><h5 class="tags-title">' . esc_html__( 'Categories:', 'voicer' ) . '</h5> <span class="screen-reader-text">' . esc_html__( 'Categories', 'voicer' ) . '</span>' . $categories_list . '</div>';
                    }
                }
			}
		echo '</footer>';
	}
}
endif;

if ( ! function_exists( 'voicer_edit_link' ) ) :
function voicer_edit_link() {
    edit_post_link(
		sprintf(
            wp_kses( __( 'Edit<span class="screen-reader-text">"%s"</span>', 'voicer' ), voicer_tags() ), get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

function voicer_front_page_section( $partial = null, $id = 0 ) {
	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		global $voicercounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$voicercounter = $id;
	}
	global $post;
	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

        get_template_part( 'template-parts/page/content', 'front-page-panels' );

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		echo '<article class="panel-placeholder panel voicer-panel voicer-panel' . $id . '" id="panel' . $id . '"><span class="voicer-panel-title">' . sprintf( esc_html__( 'Front Page Section %1$s Placeholder', 'voicer' ), $id ) . '</span></article>';
	}
}

function voicer_categorized_blog() {
	$category_count = get_transient( 'voicer_categories' );

	if ( false === $category_count ) {
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );
		$category_count = count( $categories );
		set_transient( 'voicer_categories', $category_count );
	}
	if ( is_preview() ) {
		return true;
	}
	return $category_count > 1;
}

function voicer_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'voicer_categories' );
}
add_action( 'edit_category', 'voicer_category_transient_flusher' );
add_action( 'save_post',     'voicer_category_transient_flusher' );