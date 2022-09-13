<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>

<?php
$show_count = 15;
$load_count = 6;

$term = get_queried_object();

$videos_quary_args = array(
	'post_status' => 'publish',
	'posts_per_page' => $show_count,
	'post_type' => 'video',
);

$videos_posts = get_posts($videos_quary_args);
$all_args = $videos_quary_args;
$all_args['posts_per_page'] = -1;
$videos_all_posts = get_posts($all_args);

$taxonomy_id = get_queried_object()->term_id;

?>

<?php get_header(); ?>


<main id="videos-list" class="videos-satm">
    <?php  render_adv('page',$taxonomy_id, 'top');?>
	<div class="container main-container">
        <?php  render_adv('page',$taxonomy_id, 'left');?>
        <?php  render_adv('page',$taxonomy_id, 'right');?>
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar($term->name); ?>

				<?php foreach ($videos_all_posts as $pst) : ?>
					<div class="videos-list-content">
						<div class="box">
							<?php render_new_template_video($pst->ID, true, true, true); ?>
						</div>
					</div>
				<?php endforeach; ?>

				<?php if (intval($show_count) < count($videos_all_posts)) : ?>
					<div class="load-moree-btn">
						<button data-param-posts='<?php echo serialize($videos_quary_args); ?>' data-tpl='meri' data-load-posts="<?php echo $load_count ?>" data-show-posts="<?php echo $show_count ?>" data-all-posts="<?php echo count($videos_all_posts) ?>">Показать ещё</button>
					</div>
				<?php endif ?>
			</div>
			<div class="second-content">
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<?php render_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>