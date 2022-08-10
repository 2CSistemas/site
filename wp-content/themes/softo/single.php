<?php
/**
 * Blog Post Main File.
 *
 * @package SOFTO
 * @author  Themes Flat
 * @version 1.0
 */

get_header();
$data    = \SOFTO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = softo_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'softo_banner', $data );?>
<?php else:?>
<div class="page-title parallax parallax1 position-relative clearfix" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="breadcrumbs position-relative">
            <div class="breadcrumbs-wrap">
                <h1 class="title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( '' ) ); ?></h1>
                <ul class="breadcrumbs-inner">
                    <?php echo softo_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</div><!-- page-title -->

<?php endif;?>

<!--Start Blog Details Area-->
<div class="blog-content no-column flat-row clearfix">
	<div class="container d-lg-flex">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'softo_sidebar', $data );
				}
			?>
             <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="thm-unit-test">	
                    
                    <article class="main-post">                	
                    	<?php if(has_post_thumbnail()){ ?>
                        <div class="featured-post">
                            <div class="entry-image">    
                                <?php the_post_thumbnail('softo_1170x450'); ?>
                            </div>    
                        </div>
                        <?php } ?>
                        
                        <div class="content-blog content-blog-single">
                            <ul class="post-meta d-sm-flex">    
                                <li class="author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By', 'softo'); ?> <?php the_author(); ?></a></li>    
                                <li class="date"><span><?php echo esc_attr(get_the_date()); ?></span></li>    
                            </ul>
    						
                            <div class="text">
								<?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'softo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>     
                            </div>
                            
							<?php if(function_exists('bunch_share_us_two') || has_tag()):?>  
                            <div class="tags-bar d-md-flex justify-content-between align-items-center">    
                                <?php if(has_tag()){ ?>
                                <div class="tags-list tags-list bg-linear-gradient">    
                                    <?php the_tags( '', '', '' ); ?>   
                                </div>
    							<?php } ?>
                                
                                <?php if(function_exists('bunch_share_us_two')):?>
                                <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                        		<?php endif;?>
                            </div><!-- tags-bar -->
    						<?php endif;?>
                            
                            <?php if( $options->get( 'single_post_author_box' ) ) { ?>
                            <div class="quote">    
                                <div class="quote-bg border-corner clearfix">    
                                    <div class="avatar btn-linear hv-linear-gradient">    
                                        <div class="avatar">
                                        	<img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/blog/04.jpg" alt="Author Image">
                                        </div>
                                        
                                        <?php $icons = $options->get( 'single_post_author_social_share' );
											if ( ! empty( $icons ) ) :
										?>
                                        
                                        <?php
											foreach ( $icons as $h_icon ) :
											$header_social_icons = json_decode( urldecode( softo_set( $h_icon, 'data' ) ) );
											if ( softo_set( $header_social_icons, 'enable' ) == '' ) {
												continue;
											}
											$icon_class = explode( '-', softo_set( $header_social_icons, 'icon' ) );
											?>
											<a class="linear-color" href="<?php echo esc_url(softo_set( $header_social_icons, 'url' )); ?>" <?php if( softo_set( $header_social_icons, 'background' ) || softo_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(softo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(softo_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fa <?php echo esc_attr( softo_set( $header_social_icons, 'icon' ) ); ?>"></i></a>
                                        <?php endforeach; ?>
                                    	
										<?php endif;?>
                                    </div>
    
                                    <div class="content-text">    
                                        <h3 class="name"><?php the_author(); ?></h3>    
                                        <p class="description">    
                                            <?php the_author_meta( 'description', get_the_author_meta('ID') ); ?>
    									</p>    
                                    </div>    
                                </div>    
                            </div><!-- quote -->
    						<?php } ?>
                            
                            <?php if((get_previous_post()) || (get_next_post())): ?>
                            <div class="navigation m-t48">    
                                <ul class="nav-links d-md-flex">    
                                    <?php global $post; $prev_post = get_previous_post();
										if (!empty($prev_post)):
									?>
                                    <li class="previous"> 
                                    	<a class="d-flex align-items-center flex-wrap" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">   
                                            <i class="icon icon-arrow-pointing-to-left"></i>
                                            <div class="nva-item pl-4">
                                                <div class="meta-nav"><?php esc_html_e('Previous', 'softo'); ?></div>    
                                                <div class="name-nav"><?php echo wp_trim_words( $prev_post->post_title);?></div>    
                                            </div>
                                        </a>
                                    </li> 
                                    <?php endif; ?>
								
									<?php global $post; $next_post = get_next_post();
                                        if (!empty($next_post)):
                                    ?>   
                                    <li class="next"> 
                                    	<a class="d-flex align-items-center flex-wrap" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">   
                                            <div class="nva-item pr-4">
                                                <div class="meta-nav"><?php esc_html_e('Next', 'softo'); ?></div>    
                                                <div class="name-nav"><?php echo wp_trim_words( $next_post->post_title);?></div>  
                                            </div>
                                            <i class="icon icon-arrow-pointing-to-right"></i>
                                        </a>  
                                    </li> 
                                    <?php endif;?>   
                                </ul>    
                            </div><!-- navigation --> 
                            <?php endif;?>      
                        </div>    
                    
                    </article><!-- main-post -->
                         
                	<!--End post-details-->
                	<?php comments_template(); ?>
                    
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'softo_sidebar', $data );
				}
			?>
        </div>
    </div>
</div>
<!--End blog area--> 

<?php
}
get_footer();
