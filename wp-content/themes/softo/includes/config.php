<?php
/**
 * Theme config file.
 *
 * @package SOFTO
 * @author  ThemesFlat
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['softo_main_header'][] 	= array( 'softo_main_header_area', 99 );

$config['default']['softo_main_footer'][] 	= array( 'softo_main_footer_area', 99 );

$config['default']['softo_sidebar'][] 	    = array( 'softo_sidebar', 99 );

$config['default']['softo_banner'][] 	    = array( 'softo_banner', 99 );


return $config;
