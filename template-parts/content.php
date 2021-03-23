<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmenta_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    if ( !get_post_meta(get_the_ID(), 'noh1', true) ) :
    ?>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1><strong>', '</strong></h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        /*if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                dmenta_theme_posted_on();
                ?>
            </div>
        <?php endif; */ ?>
    </header>
    <?php
    endif;
    ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dmenta_theme' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dmenta_theme' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
</article>
