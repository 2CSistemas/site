<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Softo
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \SOFTO\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'softo_banner', $data );
$options = softo_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	
	
	?>
       
    <!-- error-section -->
    <section class="error-section centred">
        <div class="auto-container">
            <div class="inner-box">
                <h1>
                    <?php 
                        if( $options->get( '404_page_title' ) ){
                            echo wp_kses( $options->get( '404_page_title' ), true );
                        }else{
                            esc_html_e( '404', 'softo' );
                        }
                    ?>
                </h1>
                <h2>
                    <?php 
                        if( $options->get( '404_page_text' ) ){
                            echo wp_kses( $options->get( '404_page_text' ), true );
                        }else{
                            esc_html_e( 'page is not found. <br />the page is doesn’t exist or deleted', 'softo' );
                        }
                    ?>
                </h2>
                <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <div class="flat-appointment btn-linear hv-linear-gradient">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-style linear-color border-corner">
                        <?php 
                            if( $options->get( 'back_home_btn_label' ) ){
                                echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                            }else{
                                esc_html_e( 'Go Back Home', 'softo' );
                            }
                        ?>
                    </a>
                 </div>
                 <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- error-section end -->
        
<?php
}
get_footer(); ?>
