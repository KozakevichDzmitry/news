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