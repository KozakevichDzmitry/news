<?php

/*
 * Template Name: Ваш район
*/

?>

<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>

<?php require_once(COMPONENTS_PATH . 'icons/advertising-icon.php'); ?>
<?php require_once(COMPONENTS_PATH . 'icons/share-icon.php'); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/district-news-template.php'); ?>

<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>

<?php
$newspapers_taxes = get_terms(
	array(
		'taxonomy' => get_taxonomies(['object_type' => ['newspaper']]),
		'hide_empty' => false
	)
);

$districts = array(
	'Центральный',
	'Советский',
	'Первомайский',
	'Партизанский',
	'Ленинский',
	'Заводской',
	'Октябрьский',
	'Московский',
	'Фрунзенский'
);
?>

<main class="your-district">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_district_news_template(); ?>
			</div>
			<div class="second-content">
				<?php render_most_read_news_template(true); ?>
				<?php render_top_three_news_template(); ?>
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<?php render_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>