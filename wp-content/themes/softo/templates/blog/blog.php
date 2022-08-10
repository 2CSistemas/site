<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage SOFTO
 * @author     Themes Flat
 * @version    1.0
 */

if ( class_exists( 'Softo_Resizer' ) ) {
	$img_obj = new Softo_Resizer();
} else {
	$img_obj = array();
}

$options = softo_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
	<article class="main-post mg-blog">
        <?php if(has_post_thumbnail()){ ?>
        <div class="featured-post">
            <div class="entry-image">
                <?php the_post_thumbnail('softo_1170x450'); ?>
            </div>
        </div>
        <?php } ?>
        <div class="content-blog">

            <ul class="post-meta d-sm-flex">
                <li class="author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By', 'softo'); ?> <?php the_author(); ?></a></li>
                <li class="date"><span><?php echo esc_attr(get_the_date()); ?></span></li>
            </ul>
            <h2 class="title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>

            <?php the_excerpt(); ?>

            <div class="flat-read-more bg-linear-gradient m-t30">
                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"> <?php esc_html_e('read more', 'softo'); ?> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>                   
       </div>

    </article><!-- main-post --> 
    
</div>