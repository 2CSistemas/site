<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'softo' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'softo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'softo' ),
				'e' => esc_html__( 'Elementor', 'softo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'softo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'softo' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'softo' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'softo' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'softo' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id' => 'show_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar Info', 'softo'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'softo' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'email_address_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'softo' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'softo'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
            'id' => 'show_button_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'softo'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'softo' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'softo' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'email_address_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_button_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Now Button', 'softo'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'softo' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'softo' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
            'id' => 'show_social_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'softo'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'softo' ),
            'required' => array( 'show_social_share_v2', '=', true ),
        ),
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'phone_no_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'email_address_v3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'softo' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
