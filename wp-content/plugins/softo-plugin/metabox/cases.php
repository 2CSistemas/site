<?php
return array(
	'title'      => 'Softo Cases Setting',
	'id'         => 'softo_meta_cases',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'cases' ),
	'sections'   => array(
		array(
			'id'     => 'softo_cases_meta_setting',
			'fields' => array(
				
				array(
                    'id'    => 'case_text',
                    'type'  => 'textarea',
                    'title' => esc_html__('Description', 'softo'),
                ),
				array(
                    'id' => 'show_info_section',
                    'type' => 'switch',
                    'title' => esc_html__('Show/Hide Info Case Details', 'softo'),
                ),
				array(
                    'id'    => 'client_title',
                    'type'  => 'text',
                    'title' => esc_html__('Client Title', 'softo'),
					'required' => array('show_info_section', '=', true),
                ),
				array(
                    'id'    => 'industry_title',
                    'type'  => 'text',
                    'title' => esc_html__('Industry Title', 'softo'),
					'required' => array('show_info_section', '=', true),
                ),
				array(
                    'id'    => 'services_title',
                    'type'  => 'text',
                    'title' => esc_html__('Service Title', 'softo'),
					'required' => array('show_info_section', '=', true),
                ),
				array(
                    'id'    => 'website_link',
                    'type'  => 'text',
                    'title' => esc_html__('Website Link', 'softo'),
					'required' => array('show_info_section', '=', true),
                ),
			),
		),
	),
);