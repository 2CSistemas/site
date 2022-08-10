<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'softo' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'softo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'softo' ),
				'e' => esc_html__( 'Elementor', 'softo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'softo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'softo' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'softo' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'softo' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'softo' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'softo' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'softo' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'softo' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Heading', 'softo' ),
			'desc'  => esc_html__( 'Enter 404 section Page Heading that you want to show', 'softo' ),
		),
		array(
			'id'    => '404_page_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'softo' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'softo' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'softo' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'softo' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'softo' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'softo' ),
			'default'  => esc_html__( 'Back To Home', 'softo' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);