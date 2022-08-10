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

?>
	
    <footer id="footer" class="footer footer-bg-1">
        <?php if ( is_active_sidebar( 'footer-sidebar3' ) ) { ?>
        <div class="overlay"></div>
        <div id="footer-widget" class="footer-widget-type1">
            <div class="container">
                <div class="row">
                	<?php dynamic_sidebar( 'footer-sidebar3' ); ?>
                </div>
            </div>
        </div>
		<?php } ?>
        <div id="bottom" class="bottom-type1 position-relative">
            <div class="container">
                <div class="bottom-wrap text-center">
                    <div id="copyright">
                        <?php echo wp_kses( $options->get( 'footer_v4_copyright_text', '<a href="#">Copyright © 2022 Softo.</a><span class="license"> All Rights Reserved</span>' ), true ); ?>
                    </div>
                </div>
            </div>
        </div>
        
    </footer><!-- footer -->
    