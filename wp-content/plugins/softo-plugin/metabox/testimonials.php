<?php
return array(
	'title'      => 'Softo Testimonials Setting',
	'id'         => 'softo_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'softo_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'       => 'testimonials_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Testimonials Icons', 'softo' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'author_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'softo' ),
				),
				array(
					'id'    => 'quote_description',
					'type'  => 'textarea',
					'title' => esc_html__( 'Quote Description', 'softo' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'softo' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
				array(
					'id'    => 'testimonials_social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'softo' ),
				),
			),
		),
	),
);