<?php
	return array(
		'title'      => 'softo post Setting',
		'id'         => 'softo_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'quote_description',
						'type'  => 'textarea',
						'title' => esc_html__('Quote Description', 'softo'),
					),
					array(
						'id'    => 'dimension',
						'type'  => 'select',
						'title' => esc_html__( 'Choose the Extra height', 'softo' ),
						'options'  => array(
							'normal_height' => esc_html__( 'Normal Height', 'softo' ),
							'extra_height' => esc_html__( 'Extra Height', 'softo' ),
						),
						'default'  => 'normal_height',
					),
				),
			),
		),
	);


?>