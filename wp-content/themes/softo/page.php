<?php
/**
 * Default Template Main File.
 *
 * @package SOFTO
 * @author  ThemesFlat
 * @version 1.0
 */

get_header();
$data  = \SOFTO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'softo_banner', $data );?>
<?php else:?>
 <!-- Page Title -->
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

<!--Start Blog Page Three-->
<div class="blog-content no-column flat-row clearfix">
    <div class="container d-lg-flex">
        <div class="row clearfix">
		
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'softo_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="thm-unit-test">
                        
					<?php while ( have_posts() ): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    
                    <div class="clearfix"></div>
                    <?php
                    $defaults = array(
                        'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'softo' ),
                        'after'  => '</div>',
    
                    );
                    wp_link_pages( $defaults );
                    ?>
                    <?php comments_template() ?>
                 
                 </div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'softo_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</div><!-- blog section with pagination -->
<?php get_footer(); ?>
