<?php

function aca_cpg_product_custom_post_type_init(){
	$product_labels = [
		'name'                  => _x('CPG Products', 'Post type general name'),
		'singular_name'         => _x('CPG Product', 'Post type singular name'),
		'menu_name'             => _x('CPG Products', 'Admin Menu text'),
		'name_admin_bar'        => _x('CPG Product', 'Add New on Toolbar'),
		'add_new'               => __('Add New'),
		'add_new_item'          => __('Add New CPG Product'),
		'new_item'              => __('New CPG Product'),
		'edit_item'             => __('Edit CPG Product'),
		'view_item'             => __('View CPG Product'),
		'all_items'             => __('All CPG Products'),
		'search_items'          => __('Search CPG Products'),
		'parent_item_colon'     => __('Parent CPG Products:'),
		'not_found'             => __('No CPG Products found.'),
		'not_found_in_trash'    => __('No CPG Products found in Trash.'),
		'featured_image'        => _x('CPG Product Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3'),
		'set_featured_image'    => _x('Set image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3'),
		'remove_featured_image' => _x('Remove image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3'),
		'use_featured_image'    => _x('Use as image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3'),
		'archives'              => _x('CPG Product archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4'),
		'insert_into_item'      => _x('Insert into CPG Product', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4'),
		'uploaded_to_this_item' => _x('Uploaded to this CPG Product', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4'),
		'filter_items_list'     => _x('Filter CPG Products list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4'),
		'items_list_navigation' => _x('CPG Products list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4'),
		'items_list'            => _x('CPG Products list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4')
	];

	$product_args = [
		'labels'             => $product_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => ['slug'=>'cpg-product'],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => false,
		'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions']
	];

	register_post_type('cpg_product', $product_args);

	$product_category_labels = [
		'name'                  => _x('CPG Product Categories', 'Taxonomy general name'),
		'singular_name'         => _x('CPG Product Category', 'Taxonomy singular name'),
		'menu_name'             => _x('Categories', 'Admin Menu text'),
		'all_items'             => __('All CPG Product Categories'),
		'edit_item'             => __('Edit CPG Product Category'),
		'view_item'             => __('View CPG Product Category'),
		'update_item'           => __('Update CPG Product Category'),
		'add_new_item'          => __('New CPG Product Category'),
		'new_item_name'			=> __('New CPG Product Category Name')
	];

	$product_category_args = [
		'labels' => $product_category_labels,
		'description' => 'Categories for CPG Products',
		'public' => true,
		'publicly_querably' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'rewrite' => [
			'slug' => 'product-category',
			'hierarchical' => true
		],
		'default_term' => [
			'name' => 'Uncategorized',
			'slug' => 'uncategorized',
			'description' => 'Products in this category have not be categorized yet.'
		]
	];

	register_taxonomy('cpg_product_category', 'cpg_product', $product_category_args);
	register_taxonomy_for_object_type('cpg_product_category', 'cpg_product');
}

add_action('init', 'aca_cpg_product_custom_post_type_init');