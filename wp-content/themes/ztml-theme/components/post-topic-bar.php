<?php

function render_post_topic_bar($post_ID)
{
?>
	<div class="post-topic-bar">
		<div class="content-exists">
			<div class="content-exist">
				<?php $pg = get_post($post_ID); ?>
				<?php $pgc = apply_filters('the_content', $pg->post_content); ?>
				<?php $checked_content = apply_filters('the_content', get_the_content(null, null, $post_ID)); ?>
				<?php if (check_exist_images($pgc)) : ?>
					<?php render_camera_icon(); ?>
				<?php endif; ?>
				<?php if (check_exist_video($pgc)) : ?>
					<?php render_video_content_icon(); ?>
				<?php endif; ?>
				<?php if (check_exist_map($checked_content)) : ?>
					<?php render_location_icon(); ?>
				<?php endif; ?>
			</div>
			<div class="tags">
				<?php
				$term = get_terms(array(
					'taxonomy' => get_post_taxonomies($post_ID),
					'object_ids' => $post_ID,
				));
				?>
				<?php if (!empty($term[0])) : ?>
					<span><?php echo $term[0]->name; ?></span>
				<?php endif; ?>
			</div>
		</div>

		<div class="title">
			<span>
				<?php echo get_the_title($post_ID); ?>
			</span>
		</div>

		<div class="date">
			<span>
				<?php echo get_the_date('h:i', $post_ID); ?>
			</span>
			<span>
				<?php echo get_the_date('d.m.Y', $post_ID); ?>
			</span>
		</div>
	</div>
<?php
}
