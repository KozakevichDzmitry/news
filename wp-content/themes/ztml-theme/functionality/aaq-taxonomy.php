<?php

function aaq_taxonomy()
{
	register_post_type(
		'aaq',
		array(
			'label'               => __('aaq'),
			'labels'              => array(
				'name'                => _x('Эфир', 'Post Type General Name'),
				'singular_name'       => _x('Эфир', 'Post Type Singular Name'),
				'menu_name'           => __('Задайте вопрос столичным властям'),
			),
			'supports'            => array('title', 'author', 'editor', 'thumbnail'),
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

add_action('init', 'aaq_taxonomy', 0);
