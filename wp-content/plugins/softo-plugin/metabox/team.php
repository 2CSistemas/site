<?php
return array(
	'title'      => 'Softo Team Setting',
	'id'         => 'softo_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'softo_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'team_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'softo' ),
				),
				array(
					'id'    => 'team_email_address',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'softo' ),
				),
				array(
					'id'    => 'team_phone_no',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'softo' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'softo' ),
				),
			),
		),
	),
);