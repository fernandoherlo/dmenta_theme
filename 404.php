<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dmenta_theme
 */

get_header();
?>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1><strong><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dmenta_theme' ); ?></strong></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dmenta_theme' ); ?></p>

                            <?php
                            get_search_form();

                            the_widget( 'WP_Widget_Recent_Posts' );
                            ?>

                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'dmenta_theme' ); ?></h2>
                                <ul>
                                    <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'show_count' => 1,
                                            'title_li'   => '',
                                            'number'     => 10,
                                        )
                                    );
                                    ?>
                                </ul>
                            </div><!-- .widget -->

                            <?php
                            /* translators: %1$s: smiley */
                            $dmenta_theme_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'dmenta_theme' ), convert_smilies( ':)' ) ) . '</p>';
                            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$dmenta_theme_archive_content" );

                            the_widget( 'WP_Widget_Tag_Cloud' );
                            ?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->

            </div>
        </div>
    </main>
<?php
get_footer();
