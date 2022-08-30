<?php

require_once(COMPONENTS_PATH . "icons/video-content-icon.php");
require_once(COMPONENTS_PATH . "icons/share-icon.php");

function single_satm_slide($post)
{
?>
	<div>
		<div class="satm-header">
			<div class="content-exists">
				<div class="content">
					<?php $checked_content = apply_filters('the_content', get_the_content(), $id); ?>
					<?php if (check_exist_images($checked_content)) : ?>
						<?php render_camera_icon(); ?>
					<?php endif; ?>
					<?php if (check_exist_video($checked_content)) : ?>
						<?php render_video_content_icon(); ?>
					<?php endif; ?>
					<?php if (check_exist_map($checked_content)) : ?>
						<?php render_location_icon(); ?>
					<?php endif; ?>
				</div>
				<div class="tags">
					<span>Экономика</span>
				</div>
			</div>

			<div class="title">
				<span>
					Гoвoрим с Нагорной Еленой
				</span>
			</div>

			<div class="share">
				<div class="date">
					<span>
						<?php echo date("h:i", strtotime($post->post_date)); ?>
					</span>
					<span>
						<?php echo date("d.m.Y", strtotime($post->post_date)); ?>
					</span>
				</div>
				<div>
					<a href="#">
						<?php render_share_icon(); ?>
					</a>
				</div>
			</div>
		</div>

		<div class="satm-content">
			<?php echo get_post_field('post_content', $post->ID); ?>
		</div>

		<div class="satm-video">
			<?php $youtube_sufix = carbon_get_post_meta($post->ID, 'crb_youtube_code'); ?>
			<?php $simple_video_id = carbon_get_post_meta($post->ID, 'crb_simple_video'); ?>

			<?php if (!empty($youtube_sufix)) : ?>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_sufix; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php elseif (!empty($simple_video_id)) : ?>
				<video controls>
					<source src="<?php echo wp_get_attachment_url($simple_video_id[0]); ?>" type="video/mp4">
				</video>
			<?php endif; ?>
		</div>
	</div>
<?php
}
