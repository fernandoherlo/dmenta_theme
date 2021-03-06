<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmenta_theme
 */

?>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-2',
                                'menu_id'        => 'secondary-menu',
                                'bootstrap'      => true
                            )
                        );
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <small>© <?php echo date('Y');?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e('Todos los derechos reservados.') ?></small>
                </div>
            </div>
        </div>
    </footer>
</div>


<script src="https://kit.fontawesome.com/1dc456169a.js" crossorigin="anonymous"></script>
<script>
    var preloading = <?php echo (DMENTA_PRELOADING) ? 'true' : 'false'; ?>;
</script>
<?php wp_footer(); ?>

<?php
if (DMENTA_PRELOADING) :
?>
    <div class="overlay-loading">
        <span>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/loading.gif" alt="<?php echo esc_html__( 'Loading', 'dmenta_theme' ); ?>">
        </span>
    </div>
<?php
endif;
?>

</body>
</html>
