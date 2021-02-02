<?php
/**
 * Enqueue theme voicer scripts and styles.
 */
function voicer_base_scripts() {
    wp_enqueue_style( 'voicer-style', get_template_directory_uri(). '/style.css', array(), false, 'all');

    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/vendor/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('animate', get_template_directory_uri(). '/css/vendor/animate.min.css', array(), false, 'all');
    wp_enqueue_style('slick', get_template_directory_uri(). '/css/vendor/slick.css', array(), false, 'all');
    wp_enqueue_style('m-custom-scrollbar', get_template_directory_uri(). '/css/vendor/jquery.mCustomScrollbar.css', array(), false, 'all');
    wp_enqueue_style('magnific-popup', get_template_directory_uri(). '/css/vendor/magnific-popup.css', array(), false, 'all');
    wp_enqueue_style('jquery-ui-datepicker');

    wp_enqueue_style('voicer-custom', get_template_directory_uri(). '/css/voicer-custom.css', array(), false, 'all' );
    wp_enqueue_style('voicer-dev', get_template_directory_uri(). '/css/voicer-dev.css', array(), false, 'all' );

    if (voicer_plugin_detect('woo') && voicer_is_realy_woocommerce_page ()):
        wp_enqueue_style('voicer-woo', get_template_directory_uri(). '/css/voicer-woo.css', array(), false, 'all' );
    endif;

    wp_enqueue_style('voicer-colors', get_template_directory_uri(). '/css/voicer-colors.css', array(), false, 'all' );


    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('m-custom-scrollbar-concat', get_template_directory_uri() . '/js/vendor/jquery.mCustomScrollbar.concat.min.js', array('jquery'), false, true);
    wp_enqueue_script('awp-player-wavesurfer', get_template_directory_uri() . '/js/vendor/awp-player/wavesurfer.min.js', array('jquery'), false, true);
    wp_enqueue_script('awp-player-jsmediatags', get_template_directory_uri() . '/js/vendor/awp-player/jsmediatags.min.js', array('jquery'), false, true);

    wp_enqueue_script('awp-player-new-cb', get_template_directory_uri() . '/js/vendor/awp-player/new_cb.js', array('jquery'), false, true);
    if (is_front_page()) {
        wp_enqueue_script('awp-player-new-home', get_template_directory_uri() . '/js/vendor/awp-player/new-home.js', array('jquery'), false, true);
    } else {
        wp_enqueue_script('awp-player-new', get_template_directory_uri() . '/js/vendor/awp-player/new.js', array('jquery'), false, true);
    }
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/vendor/slick.min.js', array('jquery'), false, true);
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('moment', get_template_directory_uri() . '/js/vendor/moment.js', array( 'jquery' ), false, true);
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('tween-max', get_template_directory_uri() . '/js/vendor/TweenMax.min.js', array( 'jquery' ), false, true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/vendor/jquery.magnific-popup.min.js', array( 'jquery' ), false, true);
    wp_enqueue_script('filterizr', get_template_directory_uri() . '/js/vendor/jquery.filterizr.min.js', array( 'jquery' ), false, true);
    wp_enqueue_script( 'table-head-fixer', get_template_directory_uri() . '/js/vendor/tableHeadFixer.js', array( 'jquery' ), false, true);


    if (voicer_plugin_detect('woo')):
        wp_enqueue_script('voicer-zoom', get_template_directory_uri() . '/js/vendor/jquery.elevateZoom/jquery.elevateZoom-3.0.8.min.js', array('jquery'), false, true);
        wp_enqueue_script('voicer-app-shop', get_template_directory_uri() . '/js/app-shop.js', array('jquery'), false, true);
    endif;


    wp_enqueue_script('voicer-custom', get_template_directory_uri() . '/js/voicer-custom.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'voicer_base_scripts' );