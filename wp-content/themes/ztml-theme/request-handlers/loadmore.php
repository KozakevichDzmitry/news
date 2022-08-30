<?php
require_once(COMPONENTS_PATH . 'half-post.php');

add_action('wp_ajax_loadmore', 'loadmore_news');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_news');


function loadmore_news()
{
	global $post;
	$args = array(
		'post_status' => 'publish',
		'posts_per_page' => $_POST['load'],
		'post_type' => 'news',
		'exclude' => $_POST['exclude'],
		'offset' => $_POST['offset']
	);

	$posts = get_posts($args);

	if (!empty($posts)) {
		foreach ($posts as $post) {
			update_post_meta($post->ID, 'post_key', 'meta_value');
			render_half_post($post->ID);
		}
	}

	die();
}
