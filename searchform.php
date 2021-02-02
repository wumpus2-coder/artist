<?php
/**
 * Template for displaying search forms in Voicer
 *
 * @package Voicer
 */
?>
<div class="header-search">
    <a href="#" id="toggle-search"><i class="icon-search"></i></a>
    <form role="search" method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <fieldset>
            <input type="search" id="<?php esc_attr( uniqid( 'search-form-' ) ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'voicer' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </fieldset>
        <button type="submit" class="search-submit">
            <svg class="icon icon-149852" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>149852</title><path d="M28.403 26.887l-6.307-6.56c1.622-1.928 2.51-4.353 2.51-6.878 0-5.9-4.8-10.699-10.699-10.699s-10.699 4.8-10.699 10.699 4.8 10.699 10.699 10.699c2.215 0 4.325-0.668 6.13-1.936l6.355 6.609c0.266 0.276 0.623 0.428 1.006 0.428 0.362 0 0.706-0.138 0.967-0.389 0.554-0.534 0.572-1.419 0.039-1.973zM13.907 5.541c4.361 0 7.908 3.548 7.908 7.908s-3.547 7.908-7.908 7.908-7.908-3.547-7.908-7.908 3.548-7.908 7.908-7.908z"></path></svg>
            <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'voicer' ); ?></span>
        </button>
    </form>
</div>