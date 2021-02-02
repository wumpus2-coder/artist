<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Voicer
 */
?>
<aside id="secondary" class="widget-area tt-blog-sidebar col-md-3 aside" role="complementary">
    <?php
        if (voicer_sidebars('sb_blog01')) {
            echo voicer_sidebars('sb_blog01');
        } elseif (voicer_sidebars('default01')) {
            echo voicer_sidebars('default01');
        }
    ?>
</aside>
