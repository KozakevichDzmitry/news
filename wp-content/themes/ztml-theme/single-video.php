<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php $id = get_the_ID(); ?>
<?php get_header(); ?>

<main id="single-satm" class="single-satm">
    <?php  render_adv('post',$id, 'top');?>
	<div class="container main-container">
        <?php  render_adv('post',$id, 'left');?>
        <?php  render_adv('post',$id, 'right');?>
		<div class="content-wrapper">
			<div class="main-content">
				<div class="main-single-satm">
					<?php single_satm_slide($post); ?>
				</div>

				<div class="single-satm-slider" style="display: none;">
					<?php single_satm_slide($post); ?>
					<?php single_satm_slide($post); ?>
					<?php single_satm_slide($post); ?>
					<?php single_satm_slide($post); ?>
				</div>

				<div class="satm-related">
					<div class="cards-list">
						<?php foreach ($satms->posts as $post) : ?>
							<?php render_satms_list_items($post); ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="second-content">
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<?php render_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>