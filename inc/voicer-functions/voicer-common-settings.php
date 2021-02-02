<?php
function voicer_sidebars($type) {
    $sidebar = '';
    switch ($type) {
        case 'default01':
            $sidebar = 'sidebar-1';
            break;

        case 'sb_footer01':
            $sidebar = 'Theme-Footer-Logos';
            break;
        case 'sb_footer02':
            $sidebar = 'Theme-Footer-Information';
            break;
        case 'sb_footer03':
            $sidebar = 'Theme-Footer-Socials';
            break;
        case 'sb_footer04':
            $sidebar = 'Theme-Footer-Copyright';
            break;

        case 'sb_blog01':
            $sidebar = 'Theme-Blog-Home';
            break;
        case 'sb_blog02':
            $sidebar = 'Theme-Blog-Default';
            break;
        case 'sb_shop01':
            $sidebar = 'Theme-Shop';
            break;
        case 'sb_cart':
            $sidebar = 'Theme-Header-Cart';
            break;
    }
    ob_start();
    dynamic_sidebar($sidebar);
    $sidebar = ob_get_clean();
    if ($sidebar) {
        return $sidebar;
    } else {
        return false;
    }
}

function voicer_tags() {
    $voicer_tags = array(
        'div' => array('class' => true,'id' => true,'style' => true),
        'p' => array('class' => true,'id' => true,'style' => true),
        'br' => array('class' => true,'style' => true),
        'a' => array('class' => true,'href' => true,'alt' => true,'id' => true,'style' => true),
        'span' => array('class' => true,'id' => true,'style' => true),
        'ul' => array('class' => true,'id' => true,'style' => true),
        'ol' => array('class' => true,'id' => true,'style' => true),
        'li' => array('class' => true,'id' => true,'style' => true),
        'i' => array('class' => true,'id' => true,'style' => true),
        'iframe' => array('src' => true,'id' => true),
        'img' => array('src' => true,'alt' => true,'class' => true,'id' => true,'style' => true, 'width' => true, 'height' => true, 'srcset' => true, 'sizes' => true),
        'ins' => array(),
        'del' => array(),
        'h3' => array('class' => true,'id' => true,'style' => true),
        'button' => array('class' => true,'id' => true,'aria-label' => true,'data-dismiss' => true,'style' => true),
        'form' => array('role' => true,'class' => true,'lang' => true,'id' => true,'dir' => true,'style' => true),
        'input' => array('type' => true, 'id' => true, 'name' => true,'value' => true,'size' => true,'class' => true, 'placeholder' => true, 'aria-invalid' => true,'style' => true),
        'select' => array('type' => true,'value' => true,'name' => true,'class' => true, 'id' => true, 'aria-invalid' => true,'style' => true),
        'option' => array('value' => true,'style' => true),
        'textarea' => array('cols' => true,'rows' => true,'name' => true,'class' => true, 'aria-invalid' => true,'id' => true,'placeholder' => true,'style' => true),
        'svg' => array('viewbox' => true,'class' => true, 'version' => true,'xmlns' => true,'width' => true,'height' => true,'fill' => true),
        'title' => array(),
        'path' => array('d' => true,'fill' => true)
    );
    return $voicer_tags;
}


function voicer_add_logo () {
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

    if ($image[0] == '') {
        $logo_src = get_template_directory_uri().'/images/logo.png';

        if ( is_front_page() ) :
            return '<h1><a href="'.esc_url( home_url( '/' ) ).'" rel="home"><img src="'.esc_url($logo_src).'" alt="'.esc_html__('Voicer Recording Studio','voicer').'" /></a></h1>';
        else :
            return '<a href="'.esc_url( home_url( '/' ) ).'" rel="home"><img src="'.esc_url($logo_src).'" alt="'.esc_html__('Voicer Recording Studio','voicer').'" /></a>';
        endif;

    } else {
        return the_custom_logo();
    }
}
add_action( 'after_switch_theme', 'voicer_add_logo' );

function voicer_css_body_class($classes){
    $classes[] = 'voicer-theme-set';
    if (is_front_page()) :
        $classes[] = 'home-page';
    endif;

    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_shop()) {
        $classes[] = 'shop-page';
    } else {
        if ((is_home() && !is_front_page()) || is_single() || is_category() || is_tag() || is_archive() || is_author()):
            $classes[] = (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_product() ? 'shop-page' : 'page-blog');
        endif;
    }


    /*
    $tt_plugin = 'theme-layout/theme-core.php';

    if (!function_exists( 'is_plugin_active' ) )
        $classes[] = 'tt-options-yes';
        if (!is_plugin_active($tt_plugin) ) {
            $classes[] = 'tt-options-no';
    }
    */
    return $classes;
}
add_filter('body_class', 'voicer_css_body_class');

function voicer_get_parent_blog_page() {
    global $wp_query;
    if (isset($wp_query->post->ID)) {
        $thePostID = $wp_query->post->ID;
    } else {
        $thePostID = '';
    }
    global $post;
    if (isset($post->ID)) {
        $thePostID = $post->ID;
    } else {
        $thePostID = '';
    }
    global $wp_query;
    $page = $wp_query->get_queried_object();
    if (isset($page->ID)) : $page_id = $page->ID; endif;
    $page_id = get_queried_object_id();
    return $page_id;
}
add_filter( 'widget_title', 'voicer_remove_widget_title' );
function voicer_remove_widget_title( $title ) {
    if ( empty( $title ) ) return '';
    if ( $title[0] == '!' ) return '';
    return $title;
}

add_filter('widget_text', 'do_shortcode');

function voicer_add_admin_favicon() {
    $icon_url = get_template_directory_uri().'/favicon.png';
    echo '<link rel="shortcut icon" href="' .esc_url ($icon_url) . '" />';
}
add_action('login_head', 'voicer_add_admin_favicon');
add_action('admin_head', 'voicer_add_admin_favicon');

function voicer_the_posts_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    if ( $paged >= 1 )
        $links[] = $paged;

    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="voicer-post-pagination"><ul class="pagination">' . "\n";

    if ( get_previous_posts_link() )
        printf( '<li class="tt-link-arrow">%s</li>' . "\n", get_previous_posts_link() );

    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li><span class="tt-background-none">&hellip;</span></li>';
    }

    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li><span class="tt-background-none">&hellip;</span></li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    if ( get_next_posts_link() )
        printf( '<li class="tt-link-arrow">%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";
}

class Voicer_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat( $t, $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth) );

        $class_names = $class_names ? esc_attr($class_names)  : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id=' .esc_attr($id) : '';

        $output .= esc_attr($indent). '<li' .esc_attr($id).' class="'.esc_attr($class_names).'">';
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value) ) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' .$attr. '="' .$value. '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID );
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = esc_attr($args->before);
        $item_output .= '<a'. $attributes.'>'.esc_attr($args->link_before).esc_attr($title).esc_attr($args->link_after);

        if ($args->walker->has_children) : $item_output .= '<svg class="icon icon-arrow-right arrow" width="22" height="41" viewBox="0 0 22 41" xmlns="http://www.w3.org/2000/svg"><path d="M1.66875 40.5L21.6688 20.5L1.66875 0.5L0.731251 1.4375L19.7547 20.5L0.731251 39.5625L1.66875 40.5Z"/></svg>'; endif;

        $item_output .= '</a>'.esc_attr($args->after);
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

function voicer_plugin_detect ($plugin_layout) {
    switch ($plugin_layout) :
        case 'shortcodes':
            $plugin_layout = in_array('theme-core/theme-core.php', apply_filters('active_plugins', get_option('active_plugins')));
            break;
        case 'woo':
            $plugin_layout = in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
            break;
    endswitch;
    return $plugin_layout;
}
if(!(function_exists( 'wp_get_attachment_by_post_name' ) ) ) {
    function wp_get_attachment_by_post_name( $post_name ) {
        $args           = array(
            'posts_per_page' => 1,
            'post_type'      => 'attachment',
            'name'           => trim( $post_name ),
        );
        $get_attachment = new WP_Query( $args );
        if ( ! $get_attachment || ! isset( $get_attachment->posts, $get_attachment->posts[0] ) ) {
            return false;
        }
        return $get_attachment->posts[0];
    }
}
function voicer_is_realy_woocommerce_page () {
    if( function_exists ( "is_woocommerce" ) && is_woocommerce()){
        return true;
    }
    $woocommerce_keys = array ( "woocommerce_shop_page_id" ,
        "woocommerce_terms_page_id" ,
        "woocommerce_cart_page_id" ,
        "woocommerce_checkout_page_id" ,
        "woocommerce_pay_page_id" ,
        "woocommerce_thanks_page_id" ,
        "woocommerce_myaccount_page_id" ,
        "woocommerce_edit_address_page_id" ,
        "woocommerce_view_order_page_id" ,
        "woocommerce_change_password_page_id" ,
        "woocommerce_logout_page_id" ,
        "woocommerce_lost_password_page_id" ) ;

    foreach ( $woocommerce_keys as $wc_page_id ) {
        if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
            return true ;
        }
    }
    return false;
}
if (voicer_plugin_detect('woo')) {
    if (voicer_is_realy_woocommerce_page ()) :
        $classes[] = 'ch-woo-page';
    endif;
    if (function_exists("is_shop") ) {
        $classes[] = 'shop-page';
    }
} else {
    $classes[] = 'ch-woo-no';
}
function voicer_clean_custom_menus($menu_name) {
    $menu_list = '';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    $menu_items = wp_get_nav_menu_items($menu_exists->term_id);
    foreach ((array) $menu_items as $key => $menu_item) {
        $menu_list .= '<a class="icon icon-'.strtolower(str_replace(" ","", esc_attr($menu_item->title))).'-logo" href="'. esc_url ($menu_item->url) .'"></a>';
    }
    return $menu_list;
}