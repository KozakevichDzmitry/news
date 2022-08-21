<?php

function see_post_type()
{
	register_post_type(
		'see',
		array(
			'label'               => __('Смотрите'),
			'labels'              => array(
				'name'                => _x('Смотрите', 'Post Type General Name'),
				'singular_name'       => _x('Смотрите', 'Post Type Singular Name'),
				'menu_name'           => __('Смотрите'),
			),
			'supports'            => array('title', 'author', 'thumbnail'),
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
}

add_action('init', 'see_post_type', 0);
