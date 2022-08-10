<?php
if ( ! function_exists( "softo_add_metaboxes" ) ) {
	function softo_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'cases.php',
			'service.php',
			'team.php',
			'testimonials.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( SOFTOPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/softo_options/boxes", "softo_add_metaboxes" );
}

