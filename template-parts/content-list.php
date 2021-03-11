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

    <?php dmenta_theme_post_thumbnail(); ?>

    <header class="entry-header">
        <?php
        
        if ( !is_home() ) :
            the_title( '<h3 class="entry-title">', '</h3>' );
        elseif ( 'status' === get_post_format() ) :
            the_title( '<h3 class="entry-title">', '</h3>' );
        elseif ( 'link' === get_post_format() ) :
        ?>
            <h3 class="entry-title"><a href="<?php echo esc_url( get_category_link( get_post_meta(get_the_ID(), 'link', true) ) ); ?>" rel="bookmark"><?php echo esc_html( get_the_title( get_post_meta(get_the_ID(), 'title', true) ) ); ?></a></h3>
        <?php
        else:
            if (DMENTA_POST_LINK) :
                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            else:
                the_title( '<h3 class="entry-title">', '</h3>' );
            endif;
        endif;

        if ( 'post' === get_post_type() ) :
        ?>
            <div class="entry-meta">
                <?php
                if( is_home() ):
                    if ( $GLOBALS["date_year"] != get_the_date( 'Y' ) ):
                        dmenta_theme_posted_on();
                    endif;
                else:
                    dmenta_theme_posted_on();
                endif;

                $GLOBALS["date_year"] = get_the_date( 'Y' );
                ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        if( is_home() ):
            if ( 'gallery' === get_post_format() ) :
                the_content();
            else:
                the_excerpt();
            endif;
        else:
            the_content();
        endif;
        ?>

        <?php
        if( is_home()):
            if ( false === get_post_format() OR 'aside' === get_post_format() ) :

                $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'dmenta_theme' ) );
                if ( $tags_list ) {
                    printf( '<span class="tags-links">' . esc_html__( '%1$s', 'dmenta_theme' ) . '</span>', $tags_list );
                }

                $categories = get_the_category();
                if ( ! empty( $categories ) && DMENTA_POST_LINK ) :
                ?>
                    <a class="more" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html__( 'More about', 'dmenta_theme' ) . ' ' . esc_html( get_the_title( get_post_meta(get_the_ID(), 'title', true) ) ); ?></a>
                <?php
                endif;

            endif;
        endif;
        ?>
    </div>

</article>
