<?php
/**
 * Abstract class for register post type
 *
 * @package    WordPress
 * @subpackage Student2 Plugin
 * @author     Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version    1.0
 */

namespace SOFTOPLUGIN\Inc\Post_Types;

use SOFTOPLUGIN\Inc\Abstracts\Post_Type;

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Abstract Post Type
 * Implemented by classes using the same CRUD(s) pattern.
 *
 * @version  2.6.0
 * @package  SOFTOPLUGIN/Abstracts
 * @category Abstract Class
 * @author   Wptech
 */
class Cases extends Post_Type {

	protected $post_type = 'cases';

	protected $menu_icon = 'dashicons-portfolio';

	protected $taxonomies = array();

	public static $instance;


	/**
	 * [instance description]
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * [init description]
	 *
	 * @return [type] [description]
	 */
	public static function init() {

		self::instance()->menu_name = esc_html__( 'Case Study', 'wpfixker' );
		self::instance()->singular  = esc_html__( 'Case Study', 'wpsofto' );
		self::instance()->plural    = esc_html__( 'Case Study', 'wpsofto' );
		self::instance()->supports    = array('title', 'editor', 'thumbnail', 'excerpt');

		add_action( 'init', array( self::instance(), 'register' ) );
	}


}