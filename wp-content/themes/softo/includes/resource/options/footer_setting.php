<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'softo' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'softo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'softo' ),
				'e' => esc_html__( 'Elementor', 'softo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'softo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'softo' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'softo' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'softo' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v3.png',
			    ),
				'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v5.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v3',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
            'id'       => 'footer_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__('Footer BG Image', 'softo'),
            'subtitle' => esc_html__('Upload Footer BG Image', 'softo'),
            'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'      => 'footer_v1_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
            'id'       => 'footer_bg_image_v2',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__('Footer BG Image', 'softo'),
            'subtitle' => esc_html__('Upload Footer BG Image', 'softo'),
            'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'      => 'footer_v2_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
            'id'       => 'footer_bg_image_v3',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__('Footer BG Image', 'softo'),
            'subtitle' => esc_html__('Upload Footer BG Image', 'softo'),
            'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
        ),
		array(
			'id'      => 'footer_v3_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_v4_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
            'id'       => 'footer_bg_image_v5',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__('Footer BG Image', 'softo'),
            'subtitle' => esc_html__('Upload Footer BG Image', 'softo'),
            'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
        ),
		array(
			'id'      => 'footer_v5_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'softo' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
