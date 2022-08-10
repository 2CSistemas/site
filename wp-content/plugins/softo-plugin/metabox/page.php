<?php
return array(
	'title'      => 'Softo Setting',
	'id'         => 'softo_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'cases', 'service' ),
	'sections'   => array(
		require_once SOFTOPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once SOFTOPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once SOFTOPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once SOFTOPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);