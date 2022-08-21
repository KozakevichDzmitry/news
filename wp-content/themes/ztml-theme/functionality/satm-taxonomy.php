<?php

function satm_taxonomy()
{
	register_post_type(
		'satm',
		array(
			'label'               => __('satm'),
			'labels'              => array(
				'name'                => _x('Статья', 'Post Type General Name'),
				'singular_name'       => _x('Статья', 'Post Type Singular Name'),
				'menu_name'           => __('Говорит и показывает Минск'),
			),
			'supports'            => array('title', 'author', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		)
	);


	register_taxonomy(
		'satms',
		array('satm'),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => _x('Категории', 'taxonomy general name'),
				'singular_name' => _x('Категория', 'taxonomy singular name'),
				'menu_name' => __('Категории'),
			),
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
		)
	);
}

add_action('init', 'satm_taxonomy', 0);
