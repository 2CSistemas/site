<?php
/**
 * Tag Main File.
 *
 * @package SOFTO
 * @author  ThemesFlat
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \SOFTO\Includes\Classes\Common::instance()->data( 'search' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
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
                    <h1 class="title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( get_the_title( '' ) ); ?></h1>
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
                	
					<?php if( have_posts() ) : ?>
                    <div class="thm-unit-test">
						<?php
                            while ( have_posts() ) :
                                the_post();
                                softo_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                
                    <!--Pagination-->
                    <div class="flat-pagination blog-pagination">
                   		<?php softo_the_pagination( $wp_query->max_num_pages );?>
                    </div>
                        
					<?php else : ?>				
                    <div class="search-notfound sidebar-side">
                        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'softo' ); ?></p>
                        <div class="sidebar">
                        	<?php get_search_form(); ?>
                        </div>
                    </div>									
                    <?php endif; ?>	
                    
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

