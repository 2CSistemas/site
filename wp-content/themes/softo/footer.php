<?php
/**
 * Footer Main File.
 *
 * @package SOFTO
 * @author  Themes Flat
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php softo_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
 	
    <!--Scroll to top-->
    <a id="scroll-top" class="show"></a>	

</div>
<!--End counter-scroll-->

<?php wp_footer(); ?>
</body>
</html>
