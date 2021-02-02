<?php
/**
 * Voicer functions and definitions
 *
 * @package Voicer
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

if ( ! function_exists( 'voicer_setup' ) ) :
    function voicer_setup() {
        load_theme_textdomain( 'voicer', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );
        register_nav_menus(
            array(
                'menu-1' => __( 'Primary', 'voicer' ),
                'footer' => __( 'Footer Menu', 'voicer' ),
                'social' => __( 'Social Links Menu', 'voicer' ),
            )
        );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => esc_attr__( 'Small', 'voicer' ),
                    'shortName' => esc_attr__( 'S', 'voicer' ),
                    'size'      => 19.5,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => esc_attr__( 'Normal', 'voicer' ),
                    'shortName' => esc_attr__( 'M', 'voicer' ),
                    'size'      => 22,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => esc_attr__( 'Large', 'voicer' ),
                    'shortName' => esc_attr__( 'L', 'voicer' ),
                    'size'      => 36.5,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => esc_attr__( 'Huge', 'voicer' ),
                    'shortName' => esc_attr__( 'XL', 'voicer' ),
                    'size'      => 49.5,
                    'slug'      => 'huge',
                ),
            )
        );

        // Editor color palette.
        add_theme_support( 'editor-color-palette', array(
            array(
                'name' => esc_attr__( 'Orange', 'voicer' ),
                'slug' => 'voicer',
                'color' => '#1e76bd',
            ),
        ) );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
}
endif;
add_action( 'after_setup_theme', 'voicer_setup' );

function voicer_widgets_init() {

    register_sidebar(
        array(
            'name'          => __( 'Footer', 'voicer' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your footer.', 'voicer' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'voicer_widgets_init' );

if ( ! function_exists( 'voicer_theme_content_more' ) ) :

    add_filter( 'excerpt_more', 'voicer_theme_content_more' );
    add_filter( 'the_content_more_link', 'voicer_theme_content_more' );

    function voicer_theme_content_more($more) {
        if ( is_admin() ) {
            return $more;
        }
        $icon_play = '<svg class="icon icon-video-play" width="10" height="12" viewBox="0 0 10 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.72668 5.26101L1.65318 0.804285C1.44407 0.679788 1.18441 0.70053 0.988295 0.70053C0.203857 0.70053 0.207337 1.30617 0.207337 1.4596V10.5686C0.207337 10.6984 0.203903 11.3278 0.988295 11.3278C1.18441 11.3278 1.44411 11.3484 1.65318 11.224L8.72664 6.76729C9.30723 6.42182 9.20691 6.01413 9.20691 6.01413C9.20691 6.01413 9.30727 5.60643 8.72668 5.26101Z"></path></svg>';

        $more = sprintf( ' <div class="btn-more-wrapper wrapper-btn-link-icon-text"><a href="%1$s" class="link-icon-text">'.wp_kses($icon_play, voicer_tags()).'%2$s</a></div>',
            esc_url( get_permalink( get_the_ID() ) ),
            sprintf(
                wp_kses( __('Read More<span class="screen-reader-text"> "%s"</span>', 'voicer'), voicer_tags() ), esc_html(get_the_title( get_the_ID() ))
            )
        );
        return $more;
    }
endif;


function voicer_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'voicer_content_width', 640 );
}
add_action( 'after_setup_theme', 'voicer_content_width', 0 );

function voicer_scripts() {
    wp_enqueue_style( 'voicer-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    wp_style_add_data( 'voicer-style', 'rtl', 'replace' );
    wp_enqueue_style( 'voicer-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'voicer_scripts' );

function voicer_skip_link_focus_fix() {
    ?>
<script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'voicer_skip_link_focus_fix' );

require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';


require get_template_directory() . '/inc/voicer-functions/voicer-enqueue-scripts.php';

require get_template_directory() . '/inc/voicer-functions/voicer-common-settings.php';

require get_template_directory() . '/inc/libs/tgm-plugin-activation/tgm-admin-config.php';
require get_template_directory() . '/inc/voicer-functions/voicer-page-bc.php';


if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) :
    require get_template_directory() . '/inc/voicer-woocommerce/voicer-hooks.php';
    require get_template_directory() . '/inc/voicer-woocommerce/voicer-hooks-functions.php';
endif;

function voicer_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 2,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'voicer_add_woocommerce_support' );

require get_template_directory() . '/inc/voicer-functions/voicer-import.php';
