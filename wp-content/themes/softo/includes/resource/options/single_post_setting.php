<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'softo' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'softo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'softo' ),
				'e' => esc_html__( 'Elementor', 'softo' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'softo' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'softo' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'softo' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'softo' ),
			'default' => false,
		),
		array(
			'id'      => 'show_author_social_icon',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'softo' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'softo' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'softo' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'softo' ),
			'required' => [ 'show_author_social_icon', '=', true ],
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





