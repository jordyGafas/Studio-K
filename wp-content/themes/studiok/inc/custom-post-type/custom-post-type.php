<?php

	// PRODUCTS
	add_action( 'init', 'cpt_cases_init' );

	function cpt_cases_init() {

		$labels = array(
			'name'               => _x( 'Projects', 'mint' ),
			'singular_name'      => _x( 'Project', 'mint' ),
			'menu_name'          => _x( 'Projects', 'mint' ),
			'name_admin_bar'     => _x( 'Projects', 'mint' ),
			'add_new'            => _x( 'New project', 'mint' ),
			'add_new_item'       => __( 'Add new project', 'mint' ),
			'new_item'           => __( 'New project', 'mint' ),
			'edit_item'          => __( 'Edit project', 'mint' ),
			'view_item'          => __( 'View project', 'mint' ),
			'all_items'          => __( 'All projects', 'mint' ),
			'search_items'       => __( 'Search projects', 'mint' ),
			'parent_item_colon'  => __( '', 'mint' ),
			'not_found'          => __( '', 'mint' ),
			'not_found_in_trash' => __( '', 'mint' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'			 		 => 'dashicons-welcome-widgets-menus',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'project' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' )
		);

		register_post_type( 'cpt_projects', $args );

		$labels = array(
			'name'               => _x( 'Inspirations', 'mint' ),
			'singular_name'      => _x( 'Inspiration', 'mint' ),
			'menu_name'          => _x( 'Inspirations', 'mint' ),
			'name_admin_bar'     => _x( 'Inspirations', 'mint' ),
			'add_new'            => _x( 'New inspiration', 'mint' ),
			'add_new_item'       => __( 'Add new inspiration', 'mint' ),
			'new_item'           => __( 'New inspiration', 'mint' ),
			'edit_item'          => __( 'Edit inspiration', 'mint' ),
			'view_item'          => __( 'View inspiration', 'mint' ),
			'all_items'          => __( 'All inspirations', 'mint' ),
			'search_items'       => __( 'Search inspirations', 'mint' ),
			'parent_item_colon'  => __( '', 'mint' ),
			'not_found'          => __( '', 'mint' ),
			'not_found_in_trash' => __( '', 'mint' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'			 		 => 'dashicons-welcome-widgets-menus',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'inspiration' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' )
		);

		register_post_type( 'cpt_inspirations', $args );


	}

?>
