<?php
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

function voicer_import_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-text" style="padding-bottom:35px;line-height:25px">The best look on a default WordPress installation.
    <br>Before importing be sure that old installation is reset. For example, by WP Reset plugin: Tools -> WP Reset.<br>
    <a href="tools.php?page=wp-reset">Reset old data</a></div>';
    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'voicer_import_plugin_intro_text' );

function voicer_import_plugin_page_setup( $default_settings ) {
    $default_settings['page_title']  = esc_html__( 'Import Demo Data' , 'voicer' );
    $default_settings['menu_title']  = esc_html__( 'Voicer Import Demo' , 'voicer' );

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'voicer_import_plugin_page_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


function voicer_demo_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Voicer Layout' , 'voicer' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/voicer-functions/export01.xml',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/voicer-functions/customizer1.dat'
        )

    );
}
add_filter( 'pt-ocdi/import_files', 'voicer_demo_import_files' );

function voicer_ocdi_after_import( $selected_import ) {
    update_option('show_on_front', 'page');
    update_option('woocommerce_catalog_columns', 3);

}
add_action( 'pt-ocdi/after_import', 'voicer_ocdi_after_import' );


function voicer_ocdi_before_content_import( $selected_import ) {

   /*
    $page_check = get_page_by_title('Voicer Home Page');
    if (isset($page_check->ID)){
        wp_delete_post($page_check->ID, true);
    }

    */

    /*

    $ch_images_array1 = array(
        'special-photo-01',
        'special-photo-02',
        'special-photo-03',
        'special-photo-04',

        'special-photo-01-1',
        'special-photo-02-1',
        'special-photo-03-1',
        'special-photo-04-1',

        'special-photo-01-2',
        'special-photo-02-2',
        'special-photo-03-2',
        'special-photo-04-2',

        'map-marker',
        'img-video',
        'testimonials-right',
        'smile-gallery-01',
        'smile-gallery-02',
        'smile-gallery-03',
        'smile-gallery-04',
        'smile-gallery-05',
        'smile-gallery-06',
        'smile-gallery-07',
        'smile-gallery-08',
        'smile-gallery-09',
        'smile-gallery-10',
        'smile-gallery-hover-01',
        'smile-gallery-hover-02',
        'smile-gallery-hover-03',
        'smile-gallery-hover-04',
        'smile-gallery-hover-05',
        'smile-gallery-hover-06',
        'smile-gallery-hover-07',
        'smile-gallery-hover-08',
        'smile-gallery-hover-09',
        'smile-gallery-hover-10',
        'logo_dentco',
        'favicon_dentco',
        'dentco-banner-callus',
        'dental-slide-01',
        'dental-slide-02',

        'surgery-index-01',
        'banner-right',
        'single-testimonials-author-1-2',
        'single-testimonials-author-1-1',
        'surgery-before-after-1-1',
        'surgery-before-after-1-2',
        'surgery-before-after-2-1',
        'surgery-before-after-2-2',
        'surgery-before-after-3-1',
        'surgery-before-after-3-2',
        'logo_surgeon',
        'favicon_surgeon',
        'surgery-slide-01',
        'surgery-slide-02',
        'surgery-banner-callus',

        'medclinic-index-01',
        'services-carousel-01',
        'services-carousel-02',
        'services-carousel-03',
        'services-carousel-04',
        'clinic_logo',
        'clinic_favicon',
        'clinic-slide-01',
        'clinic-slide-02',
        'clinic-banner-callus'
    );


    foreach ($ch_images_array1 as $tt_image_all) :
        $attachment = wp_get_attachment_by_post_name($tt_image_all);
        if ($attachment) : wp_delete_attachment($attachment->ID,'true'); endif;
    endforeach;

    */

}
add_action( 'pt-ocdi/before_content_import', 'voicer_ocdi_before_content_import' );




