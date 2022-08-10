<?php get_header();
$data = \SOFTO\Includes\Classes\Common::instance()->data('single-team')->get(); ?>

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

<?php while (have_posts()) : the_post(); ?>

<!-- Team Detail Section -->
<section class="team-single-section">
    <div class="container">
        <div class="row clearfix">
            <?php if(has_post_thumbnail()){ ?>
            <!-- Image Column -->
            <div class="image-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <?php the_post_thumbnail('softo_370x472'); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h2><?php the_title(); ?> <span class="category"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span></h2>
                    <ul class="post-meta">
                        <?php if(get_post_meta( get_the_id(), 'team_email_address')): ?><li><span class="icon fa fa-envelope"></span> <a href="mailto:<?php echo (get_post_meta( get_the_id(), 'team_email_address', true ));?>"><?php echo (get_post_meta( get_the_id(), 'team_email_address', true ));?></a></li><?php endif; ?>
                        <?php if(get_post_meta( get_the_id(), 'team_phone_no')): ?><li><span class="icon fa fa-phone"></span> <a href="tel:<?php echo (get_post_meta( get_the_id(), 'team_phone_no', true ));?>"><?php echo (get_post_meta( get_the_id(), 'team_phone_no', true ));?></a></li><?php endif; ?>
                    </ul>
                    
					<?php the_content(); ?>
                    
					<?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
						if ( ! empty( $icons ) ) :
					?>
					<div class="social-icon-one">
						<ul class="clearfix">
							<?php foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( softo_set( $h_icon, 'data' ) ) );
							if ( softo_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}											
							$background = softo_set($header_social_icons, 'background');
							$color = softo_set($header_social_icons, 'color');											
							if(!empty($background))
								$icon_background = "background-color:".$background.";";
							else
								$icon_background = '';											
							if(!empty($color))
								$icon_color = "color:".$color.";";
							else
								$icon_color = '';											
							$icon_class = explode( '-', softo_set( $header_social_icons, 'icon' ) ); ?>
							<li>
								<a href="<?php echo esc_url(softo_set( $header_social_icons, 'url' )); ?>" <?php if( softo_set( $header_social_icons, 'background' ) || softo_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(softo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(softo_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><span class="fa <?php echo esc_attr( softo_set( $header_social_icons, 'icon' ) ); ?>"></span></a>
							</li>                                        
							<?php endforeach; ?>
						</ul>
				   	</div>
				   	<?php endif; ?>
							
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- End Team Detail Section -->

<?php endwhile; ?>
<?php get_footer(); ?>