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

    <footer class="container site-footer">
        <div class="row">
            <div class="col-12">
                <small>© <?php echo date('Y');?> <?php bloginfo( 'name' ); ?>. All rights reserved.</small>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
