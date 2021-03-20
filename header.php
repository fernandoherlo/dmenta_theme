<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmenta_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_html_e( 'Primary Menu', 'dmenta_theme' ); ?>">
              <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    // 'menu_id'        => 'primary-menu',
                    'menu_class'     => 'navbar-nav mr-auto',
                    'container_class'=> 'collapse navbar-collapse justify-content-end',
                    'container_id'   => 'primary-menu',
                    'bootstrap'      => true
                )
            );
            ?>
        </div>
    </nav>
