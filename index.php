<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmenta_theme
 */

get_header();
?>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <?php
                if ( have_posts() ) :

                    if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header>
                            <?php the_meta(); ?>
                            <?php echo get_post_meta(get_the_ID(), 'subtitle', true); ?>
                            <?php echo get_post_meta($post->ID, 'subtitle', true); ?>
                            <h1><strong><?php single_post_title(); ?></strong></h1>
                            <?php
                            if ( metadata_exists( 'post', get_the_ID(), 'subtitle' ) ) {
                            ?>
                                <h2 class="fs-3"><?php echo get_post_meta($post->ID, 'mykey', true); ?></h2>
                            <?php
                            }
                            ?>
                        </header>
                        <?php
                    endif;

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>

            </div>
        </div>
    </main>

<?php
get_sidebar();
get_footer();
