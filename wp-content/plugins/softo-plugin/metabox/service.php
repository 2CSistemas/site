<?php
return array(
	'title'      => 'Softo Service Setting',
	'id'         => 'softo_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'softo_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'softo' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'softo' ),
				),
			),
		),
	),
);