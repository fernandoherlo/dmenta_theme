<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmenta_theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
            <div class="col-8 background"></div>
        </div>
    </div>
</aside>
