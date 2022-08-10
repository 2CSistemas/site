<?php

namespace SOFTOPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'feature_services',
		'about_us',
		'funfacts',
		'call_to_action',
		'our_services',
		'clients_and_cases',
		'testimonials',
		'get_in_touch',
		'latest_news',

		//Home Page Two
		'who_we_are',
		'our_services_v2',
		'funfacts_v2',
		'case_study',
		'our_team',
		'get_in_touch_v2',
		'latest_news_v2',
		'our_clients',
		
		//Home Page Three
		'our_mission',
		'funfacts_v3',
		'our_services_v3',
		'testimonials_v2',
		'get_in_touch_v3',
		'latest_news_v3',
		
		//Inner Pages 
		'call_to_action_v2',
		'service_details',
		'case_study_v2',
		'get_in_touch_v4',
		'about_tabs',
		'our_faqs',
		'contact_us',
		'google_map',
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = SOFTOPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\SOFTOPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'softo',
			[
				'title' => esc_html__( 'Softo', 'softo' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'softo' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();