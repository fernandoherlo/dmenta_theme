<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmenta_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('w-75'); ?>>

    <header class="entry-header">
        <?php
        
        if ( !is_home() ) :
            the_title( '<h3 class="entry-title">', '</h3>' );
        elseif ( 'status' === get_post_format() ) :
            the_title( '<h3 class="entry-title">', '</h3>' );
        elseif ( 'link' === get_post_format() ) :
            $categories = get_the_category(get_the_ID());
            var_dump($categories[0]);
        ?>
            <h3 class="entry-title"><a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" rel="bookmark"><?php echo esc_html( get_the_title( get_post_meta(get_the_ID(), 'link', true) ) ); ?></a></h3>
        <?php
        else:
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
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
            the_excerpt();
        else:
            the_content();
        endif;
        ?>

        <?php
        if ( false === get_post_format() OR 'aside' === get_post_format() ) :
            $categories = get_the_category();
            if ( ! empty( $categories ) ) :
            ?>
                <a class="more" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html__('More about') . ' ' . esc_html( strtolower($categories[0]->name) ); ?></a>
            <?php
            endif;
        endif;
        ?>
    </div>

</article>
