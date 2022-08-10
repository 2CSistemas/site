<?php

namespace SOFTOPLUGIN\Inc;


use SOFTOPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Case Study Category', 'wpsofto' ),
			'singular_name'     => _x( 'Case Study Category', 'wpsofto' ),
			'search_items'      => __( 'Search Category', 'wpsofto' ),
			'all_items'         => __( 'All Categories', 'wpsofto' ),
			'parent_item'       => __( 'Parent Category', 'wpsofto' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsofto' ),
			'edit_item'         => __( 'Edit Category', 'wpsofto' ),
			'update_item'       => __( 'Update Category', 'wpsofto' ),
			'add_new_item'      => __( 'Add New Category', 'wpsofto' ),
			'new_item_name'     => __( 'New Category Name', 'wpsofto' ),
			'menu_name'         => __( 'Case Study Category', 'wpsofto' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'cases_cat' ),
		);

		register_taxonomy( 'cases_cat', 'cases', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpsofto' ),
			'singular_name'     => _x( 'Service Category', 'wpsofto' ),
			'search_items'      => __( 'Search Category', 'wpsofto' ),
			'all_items'         => __( 'All Categories', 'wpsofto' ),
			'parent_item'       => __( 'Parent Category', 'wpsofto' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsofto' ),
			'edit_item'         => __( 'Edit Category', 'wpsofto' ),
			'update_item'       => __( 'Update Category', 'wpsofto' ),
			'add_new_item'      => __( 'Add New Category', 'wpsofto' ),
			'new_item_name'     => __( 'New Category Name', 'wpsofto' ),
			'menu_name'         => __( 'Service Category', 'wpsofto' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpsofto' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpsofto' ),
			'search_items'      => __( 'Search Category', 'wpsofto' ),
			'all_items'         => __( 'All Categories', 'wpsofto' ),
			'parent_item'       => __( 'Parent Category', 'wpsofto' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsofto' ),
			'edit_item'         => __( 'Edit Category', 'wpsofto' ),
			'update_item'       => __( 'Update Category', 'wpsofto' ),
			'add_new_item'      => __( 'Add New Category', 'wpsofto' ),
			'new_item_name'     => __( 'New Category Name', 'wpsofto' ),
			'menu_name'         => __( 'Testimonials Category', 'wpsofto' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpsofto' ),
			'singular_name'     => _x( 'Team Category', 'wpsofto' ),
			'search_items'      => __( 'Search Category', 'wpsofto' ),
			'all_items'         => __( 'All Categories', 'wpsofto' ),
			'parent_item'       => __( 'Parent Category', 'wpsofto' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsofto' ),
			'edit_item'         => __( 'Edit Category', 'wpsofto' ),
			'update_item'       => __( 'Update Category', 'wpsofto' ),
			'add_new_item'      => __( 'Add New Category', 'wpsofto' ),
			'new_item_name'     => __( 'New Category Name', 'wpsofto' ),
			'menu_name'         => __( 'Team Category', 'wpsofto' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpsofto' ),
			'singular_name'     => _x( 'Faqs Category', 'wpsofto' ),
			'search_items'      => __( 'Search Category', 'wpsofto' ),
			'all_items'         => __( 'All Categories', 'wpsofto' ),
			'parent_item'       => __( 'Parent Category', 'wpsofto' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpsofto' ),
			'edit_item'         => __( 'Edit Category', 'wpsofto' ),
			'update_item'       => __( 'Update Category', 'wpsofto' ),
			'add_new_item'      => __( 'Add New Category', 'wpsofto' ),
			'new_item_name'     => __( 'New Category Name', 'wpsofto' ),
			'menu_name'         => __( 'Faqs Category', 'wpsofto' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
