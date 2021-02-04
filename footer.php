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
        <div class="site-info">
            © <?php echo date('Y');?> <?php bloginfo( 'name' ); ?>. All rights reserved.
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
