<?php

	// TAX DESIGNERS
	add_action( 'init', 'tax_categories_init', 0 );

	function tax_categories_init() {

		$labels = array(
			'name'              => _x( 'Categories', 'vdp' ),
			'singular_name'     => _x( 'Category', 'vdp' ),
			'search_items'      => __( 'Search Categories' ),
			'all_items'         => __( 'All Categories' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add new Category' ),
			'new_item_name'     => __( 'New Category' ),
			'menu_name'         => __( 'Categories' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'type' ),
		);

		register_taxonomy( 'tax_categories', array( 'cpt_projects' ), $args );

		$labels = array(
			'name'              => _x( 'Categories', 'vdp' ),
			'singular_name'     => _x( 'Category', 'vdp' ),
			'search_items'      => __( 'Search Categories' ),
			'all_items'         => __( 'All Categories' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add new Category' ),
			'new_item_name'     => __( 'New Category' ),
			'menu_name'         => __( 'Categories' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'inspirations' ),
		);

		register_taxonomy( 'tax_categories_inspirations', array( 'cpt_inspirations' ), $args );

	}

	

?>
