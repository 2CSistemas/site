<?php 
	get_header();
	$data = \SOFTO\Includes\Classes\Common::instance()->data('single-cases')->get(); 
	
	$allowed_tags = wp_kses_allowed_html('post');
	$show_info_section = get_post_meta(get_the_id(), 'show_info_section', true);
?>

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

<?php 
	while (have_posts()) : the_post(); 
?>

<div class="flat-case-details">
    <div class="container">
        <div class="bg-case-details border-corner">
            <div class="case-details border-corner">
                <?php if(has_post_thumbnail()){ ?>
                <div class="featured-post">
                    <div class="entry-image">
                        <?php the_post_thumbnail('softo_1100x500'); ?>
                    </div>
                </div>
                <?php } ?>
                
                <?php echo (get_post_meta( get_the_id(), 'case_text', true ));?>
            </div>
            <?php if($show_info_section){ ?>
            <div class="info-case-details border-corner info-case-details border-corner justify-content-lg-between justify-content-center d-flex flex-lg-nowrap flex-wrap">
                <?php if(get_post_meta( get_the_id(), 'client_title', true )){ ?>
                <div class="f-item">
                    <div class="name"><?php esc_html_e('Clients:', 'softo'); ?></div>
                    <h5 class="text"><?php echo (get_post_meta( get_the_id(), 'client_title', true ));?></h5>
                </div>
                <?php } ?>
                
                <?php if(get_post_meta( get_the_id(), 'industry_title', true )){ ?>
                <div class="f-item">
                    <div class="name"><?php esc_html_e('Industry:', 'softo'); ?></div>
                    <h5 class="text"><?php echo (get_post_meta( get_the_id(), 'industry_title', true ));?></h5>
                </div>
                <?php } ?>
                
                <?php if(get_post_meta( get_the_id(), 'services_title', true )){ ?>
                <div class="f-item">
                    <div class="name"><?php esc_html_e('Services:', 'softo'); ?></div>
                    <h5 class="text"><?php echo (get_post_meta( get_the_id(), 'services_title', true ));?></h5>
                </div>
                <?php } ?>
                
                <?php if(get_post_meta( get_the_id(), 'website_link', true )){ ?>
                <div class="f-item">
                    <div class="name"><?php esc_html_e('Website:', 'softo'); ?></div>
                    <h5 class="text"><?php echo (get_post_meta( get_the_id(), 'website_link', true ));?></h5>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            
			<?php the_content(); ?>
            
            
            <?php if((get_previous_post()) || (get_next_post())): ?>
            <div class="navigation mg-t43">    
                <ul class="nav-links d-md-flex">    
                    <?php global $post; $prev_post = get_previous_post();
                        if (!empty($prev_post)):
                    ?>
                    <li class="previous d-flex align-items-center"> 
                        <a class="d-flex align-items-center flex-wrap" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">   
                            <i class="icon icon-arrow-pointing-to-left"></i>
                            <div class="name-nav pl-4"><?php echo wp_trim_words( $prev_post->post_title );?></div>    
                        </a>
                    </li> 
                    <?php endif; ?>
                
                    <?php global $post; $next_post = get_next_post();
                        if (!empty($next_post)):
                    ?>   
                    <li class="next d-flex align-items-center justify-content-end"> 
                        <a class="d-flex align-items-center flex-wrap" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">   
                            <div class="name-nav pr-4"><?php echo wp_trim_words( $next_post->post_title );?></div>  
                            <i class="icon icon-arrow-pointing-to-right"></i>
                        </a>  
                    </li> 
                    <?php endif;?>   
                </ul>    
            </div><!-- navigation --> 
            <?php endif;?> 
            
        </div>
    </div>
</div><!-- flat-case-details -->

<?php endwhile; ?>
<?php get_footer(); ?>