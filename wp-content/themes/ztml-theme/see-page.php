<?php
/*
 * Template Name: Смотрите
*/

?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/see-video-template.php'); ?>

<?php
$last_videos_quary = new WP_Query([
	'post_type' => 'video',
	'posts_per_page' => '3',
]);

$last_videos_posts = $last_videos_quary->posts;
?>

<?php get_header(); ?>

<main class="all-videos">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar(get_the_title(), false); ?>

				<div class="content">
					<?php echo apply_filters('the_content', get_the_content()) ?>
				</div>

				<div class="posts-content">
					<?php render_see_video_template($last_videos_posts[0]->ID); ?>
					<div>
						<?php render_see_video_template($last_videos_posts[1]->ID); ?>
						<?php render_see_video_template($last_videos_posts[2]->ID); ?>
					</div>
				</div>
			</div>
			<div class="second-content">
				<?php
				$args = array(
					'taxonomy' => 'videos',
					'orderby' => 'name',
					'hide_empty' => 0,
				);

				$cats = get_categories($args);
				?>
				<?php foreach ($cats as $cat) : ?>
					<?php render_topic_bar($cat->name, false); ?>
					<?php
					$videos_quary = new WP_Query([
						'post_type' => 'video',
						'posts_per_page' => 3,
						'post_status' => 'publish',
						'paged' => 1,
						'ignore_sticky_posts' => true,
						'tax_query' => [
							[
								'taxonomy' => 'videos',
								'terms' => $cat->term_id,
								'field' => 'id',
								'operator' => 'IN'
							]
						],
					]);

					$videos_posts = $videos_quary->posts;
					?>

					<div style="display: grid;grid-template-columns: 1fr 1fr 1fr;gap: 10px;margin-bottom: 30px;">
						<?php foreach ($videos_posts as $pst) : ?>
							<div class="box">
								<?php render_new_template_video($pst->ID); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<?php render_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>