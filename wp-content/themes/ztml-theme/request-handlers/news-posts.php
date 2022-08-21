<?php

require_once(REQUEST_HANDLERS . 'base-post.php');

function news_posts_load()
{
	$template = array(
		'view' => 'render_line_regular_news'
	);

	$res = base_load_posts(
		array(
			'load' => $_POST['load'],
			'offset' => $_POST['offset'],
			'type' => 'news',
			'date' => $_POST['date'],
			'tax_query' => NULL
		)
	);

	ob_start();

	$template_posts_html = ob_start();

	foreach ($res['posts'] as $post) {
		$template['view']($post->ID);
	}

	$template_posts_html = ob_get_clean();
	ob_end_flush();

	echo json_encode(
		array(
			'posts' => $template_posts_html,
			'count' => $res['count'],
		)
	);

	die();
}

add_action('wp_ajax_news_posts_load', 'news_posts_load');
add_action('wp_ajax_nopriv_news_posts_load', 'news_posts_load');
