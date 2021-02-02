<?php
function voicer_wrapper_row_start() {
    echo '<div class="container pt-8 pt-md-5"><div class="row product-block">';
}
function voicer_woo_wrapper_start() {
    echo '<div class="col-md-6 tt-single-product__image mb-4">';
}
function voicer_woo_wrapper_end() {
    echo '</div><div class="col-md-6">';
}
function voicer_wrapper_row_end() {
    echo '</div></div></div></div>';
}
function voicer_woo_tabs_start() {
    echo '<div class="container"><div class="prd-tabs-wrap">';
}
function voicer_woo_tabs_end() {
    echo '</div></div>';
}
function voicer_woo_price_wrapper_start() {
    echo '<div class="product-block-price">';
}
function voicer_woo_price_wrapper_end() {
    global $product;
    echo '</div>';
    if ($product->get_shipping_class() != '') :
    echo '<div class="product-block-price-comment">+ '.ucfirst(str_replace("-"," ",esc_attr($product->get_shipping_class()))).'</div>';
    endif;
}
function voicer_woo_after_summary_only_start() {
    global $product;
    echo '<div class="product-block-info '.($product->is_on_sale() ? 'padding-top33' : '').'"> ';
}
function voicer_woo_addcart_wrapper_start() {
    echo '<div class="product-block-actions">';
}
function voicer_woo_addcart_wrapper_end() {
    echo '</div>';
}
function voicer_woo_upsells_start() {
    echo '<div class="container"> ';
}
function voicer_woo_upsells_end() {
    echo '</div>';
}
function voicer_woo_product_loop_image_start() {
    echo '<div class="prd-img"> ';
}
function voicer_woo_product_loop_image_end() {
    echo '</div>';
}
function voicer_woo_template_loop_product_title() {
    echo "<h3><a href='" . esc_url(get_the_permalink()) . "'>" . get_the_title() . "</a></h3>";
}
function voicer_woo_product_loop_info_start() {
    echo '<div class="prd-info"> ';
}
function voicer_woo_product_loop_info_end() {
    echo '</div>';
}
function voicer_woo_template_loop_product_price() {
    echo '<div class="price"> ';
    woocommerce_template_loop_price();
    echo '</div>';
}
function voicer_woo_filter_wrapper_start() {
    echo '<div class="filters-row align-items-center">';
}
function voicer_woo_filter_wrapper_end() {
    echo '</div>';
}
function voicer_woo_loop_clear () {
    echo '<div class="clearfix"></div>';
}
function voicer_woo_pagination_wrapper_start () {
    echo '<div class="simple-pagination tt-simple-pagination mt-5 pagination justify-content-center">';
}
function voicer_woo_pagination_wrapper_end () {
    echo '</div>';
}
function voicer_woo_cart_collaterals_start () {
    echo '<div class="row voicer-collaterals"><div class="col-md-6 col-lg-5">';
}
function voicer_woo_cart_collaterals_middle () {
    echo '</div><div class="divider visible-sm visible-xs"></div><div class="col-md-6 col-lg-push-1">';
}
function voicer_woo_cart_collaterals_end () {
    echo '</div></div>';
}
function wowmall_woocommerce_review_gravatar_size() {
    return 72;
}
function voicer_listing_add_to_cart_btn( $product ) {
    global $product;
    $classes = array(
        'product_type_' . $product->get_type(),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
    );
    $classes[] = 'btn btn--border1';
    $classes = array_filter( $classes );
    $class   = join( ' ', $classes );
    $icon = ($product->get_type() == 'simple' ? '<svg class="icon icon-cart" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.8128 4.96444C23.6358 4.72814 23.3578 4.58906 23.0625 4.58906H5.40389L4.88906 2.83036C4.77211 2.4308 4.40569 2.15625 3.98934 2.15625H0.9375C0.419719 2.15625 0 2.57597 0 3.09375C0 3.61153 0.419719 4.03125 0.9375 4.03125H3.28692C3.42384 4.49902 6.88678 16.3287 7.02666 16.8066C7.14361 17.2061 7.51008 17.4807 7.92637 17.4807H19.8376C20.254 17.4807 20.6204 17.2061 20.7374 16.8066L23.9622 5.78995C24.0452 5.50664 23.9898 5.20073 23.8128 4.96444ZM19.1353 15.6057H8.6288L5.9528 6.46406H21.8113L19.1353 15.6057Z" /><path d="M9.35742 21.8438C10.0564 21.8438 10.623 21.2771 10.623 20.5781C10.623 19.8791 10.0564 19.3125 9.35742 19.3125C8.65844 19.3125 8.0918 19.8791 8.0918 20.5781C8.0918 21.2771 8.65844 21.8438 9.35742 21.8438Z" /><path d="M18.4062 21.8438C19.1052 21.8438 19.6719 21.2771 19.6719 20.5781C19.6719 19.8791 19.1052 19.3125 18.4062 19.3125C17.7073 19.3125 17.1406 19.8791 17.1406 20.5781C17.1406 21.2771 17.7073 21.8438 18.4062 21.8438Z"/></svg>' : '');

    $text    = '<span class=add_to_cart_button_text>' . esc_attr( $product->add_to_cart_text() ) . '</span>';
    $link    = sprintf( '<div class="ch-loop-btn"><a rel="nofollow" href="%s" data-quantity="1" data-product_id="%s" data-product_sku="%s" class="%s">%s%s</a></div>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        esc_attr( $class ),
        wp_kses( $icon , voicer_tags()),
        $text
    );
    return $link;
}
function voicer_woo_bc_wrapper_start() {
    echo '<div class="content-tt-page block  block--title ch-separator tt-bc-block mb-0">
    <div class="container">
    <div class="text-center">
                <h1 class="entry-title7 title-color ">Shop</h1>
                <div class="breadcrumbs hidden-xs">
    ';
    if (function_exists('voicer_theme_breadcrumbs')):  voicer_theme_breadcrumbs(); endif;
}
function voicer_woo_bc_wrapper_end() {
    echo '</div></div></div></div>';
}
function voicer_wc_get_gallery_image_html_thumbnails( $attachment_id, $main_image = false ) {
    $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
    $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
    $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
    $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
        'title'                   => get_post_field( 'post_title', $attachment_id ),
    ) );
    return '<a href="#" class="product-previews-item" data-image="' . esc_url( $full_src[0] ) . '" data-zoom-image="' . esc_url( $full_src[0] ) . '">' . $image . '</a>';
}
function voicer_wc_get_gallery_image_html_main( $attachment_id, $main_image = false ) {
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    return '<img id="mainImage" src="'.$full_src[0].'" data-zoom-image="'.$full_src[0].'"  />';
}
function voicer_wc_listing_wrapper_begin() {
    if (voicer_sidebars('sb_shop01')) {
        $class = 'col-md-8 col-lg-9 ch-col sidebar';
        $class_content = 'row';
    } else {
        $class = 'ch-col no-sidebar';
        $class_content = '';
    }
    echo '
         <div class="bg-page-shop_listing block ch-separator pt-0">
            <div class="container pt-8 pt-md-5">
              <div class="'.esc_attr($class_content).' listing-loop">
                   <div class="'.esc_attr($class).'"> ';
}
function voicer_wc_listing_wrapper_end() {
    echo '</div></div>';
    if (voicer_sidebars('sb_shop01')) :
        echo '<div class="col-md-4 col-lg-3 column-filters aside"><div class="column-filters-inside block-border-gradient">'.  voicer_sidebars('sb_shop01').'</div></div>';
    endif;
    echo '</div></div>';
}
function voicer_woo_no_products_found_start() {
    echo '<div class="container block offset-80 ch-separator page-no-products pb-8 bg-page bg-page-blog">';
}
function voicer_woo_no_products_found_end() {
    echo '</div>';
}

function voicer_woo_pr_rating() {
    echo '<div>123</div>';
}

function voicer_woo_single_product_tab_review( $tabs ) {
    global $product;
    if ( ! comments_open() ) {
        return;
    }

    $tabs['review'] = array(
        'title' 	=> esc_html( 'Reviews ('.$product->get_review_count().')', 'voicer' ),
        'priority' 	=> 50,
        'callback' 	=> 'voicer_woo_single_product_tab_review_content'
    );
    return $tabs;
}
function voicer_woo_single_product_tab_review_content() {
    wc_get_template ('single-product-reviews.php');
}
