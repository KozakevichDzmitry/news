<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'half-post.php'); ?>


<?php require_once(COMPONENTS_PATH . 'line-news-list-item.php'); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php
$id = get_the_ID();

?>
<main class="authors-column-page">
    <?php  render_adv('post',$id , 'top');?>
	<div class="container main-container">
        <?php  render_adv('post',$id , 'left');?>
        <?php  render_adv('post',$id , 'right');?>
		<div class="content-wrapper">
			<div class="main-content">

				<?php render_half_post($post, "Авторская колонка"); ?>


				<?php render_topic_bar('Читайте и подписывайтесь'); ?>

				<div class="sub-block">
					<div>
						<img src="<?php echo get_template_directory_uri() . '/assets/images/yandex-logo.png'; ?>" />
					</div>
					<div>
						<img src="<?php echo get_template_directory_uri() . '/assets/images/yandex-logo-dzen.png'; ?>" />
					</div>
					<div>
						<img src="<?php echo get_template_directory_uri() . '/assets/images/google-logo.png'; ?>" />
					</div>
				</div>

				<?php
				$meri_args = array(
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'post_type' => 'authors-column',
				);

				$meri_posts = get_posts($meri_args);
				?>

				<div class="ta-list">
					<?php if (!empty($meri_posts)) : ?>
						<?php foreach ($meri_posts as $post) : ?>
							<?php render_line_news_list_item($post->ID, true); ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<?php
				$meri_args = array(
					'post_status' => 'publish',
					'posts_per_page' => 2,
					'post_type' => 'authors-column',
				);

				$meri_posts = get_posts($meri_args);
				?>

				<?php if (!empty($meri_posts)) : ?>
					<?php foreach ($meri_posts as $post) : ?>
						<?php render_half_post($post->ID, "Авторская колонка"); ?>
					<?php endforeach; ?>
				<?php endif; ?>
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