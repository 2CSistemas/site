<?php
/**
 * Footer Template  File
 *
 * @package SOFTO
 * @author  Template Path
 * @version 1.0
 */

$options = softo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$footer_bg_img_v2 = $options->get( 'footer_bg_image_v2' );
$footer_bg_img_v2 = softo_set( $footer_bg_img_v2, 'url', SOFTO_URI . 'assets/images/footer/04.jpg' );
?>
	
    <footer id="footer" class="footer footer-bg-2" <?php if($footer_bg_img_v2){ ?>style="background-image:url('<?php echo esc_url($footer_bg_img_v2); ?>')"<?php } ?>>
        <?php if ( is_active_sidebar( 'footer-sidebar2' ) ) { ?>
        <div class="overlay"></div>
        <div id="footer-widget" class="footer-widget-type2">
            <div class="container">
                <div class="row">
					<?php dynamic_sidebar( 'footer-sidebar2' ); ?>
                </div>
            </div>
        </div>
		<?php } ?>
        <div id="bottom" class="bottom-type2 position-relative">
            <div class="container">
                <div class="bottom-wrap text-center">
                    <div id="copyright">
                        <?php echo wp_kses( $options->get( 'footer_v2_copyright_text', '<a href="#">Copyright © 2022 Softo.</a><span class="license"> All Rights Reserved</span>' ), true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer -->