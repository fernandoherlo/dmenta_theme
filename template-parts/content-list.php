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

    <header class="entry-header">
        <?php
        
        if ( 'status' === get_post_format() ) :
            the_title( '<h3 class="entry-title">', '</h3>' );
        elseif ( 'link' === get_post_format() ) :
        ?>
            <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink( get_post_meta(get_the_ID(), 'link', true) ) ); ?>" rel="bookmark"><?php echo esc_html( get_the_title( get_post_meta(get_the_ID(), 'link', true) ) ); ?></a></h3>
        <?php
        else:
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        endif;

        if ( 'post' === get_post_type() ) :
        ?>
            <div class="entry-meta">
                <?php
                dmenta_theme_posted_on();
                ?>
                <?php
                    $categories = get_the_category();
 
                    if ( ! empty( $categories ) ) {
                        echo esc_html__('More about') . ' ' . esc_html( strtolower($categories[0]->name) );   
                    }
                ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        the_excerpt();
        ?>
    </div>

</article>
