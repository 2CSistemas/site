<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'softo' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'softo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'softo' ),
				'e' => esc_html__( 'Elementor', 'softo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'softo' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'softo' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'softo' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'softo' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'softo' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'softo' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'softo' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'softo' ),
			'default'  => array(
			    'url' => SOFTO_URI . 'assets/images/background/page-title.jpg',
		    ),
			'required' => array( 'blog_page_banner', '=', true ),
		),

		array(
			'id'       => 'blog_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'softo' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'softo' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'softo' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'softo' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'softo' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'softo' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'softo' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => softo_get_sidebars(),
		),
		array(
			'id'      => 'blog_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Comments', 'softo' ),
			'desc'    => esc_html__( 'Enable to show post comments on posts listing', 'softo' ),
			'default' => true,
		),

		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'softo' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'softo' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Date', 'softo' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'softo' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);