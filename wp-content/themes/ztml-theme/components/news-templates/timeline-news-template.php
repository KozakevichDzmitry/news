<?php

require_once(COMPONENTS_PATH . 'icons/collapse-btn-icon.php');
require_once(COMPONENTS_PATH . 'icons/expand-btn-icon.php');

function render_timline_news_template($post_ID)
{
?>
	<div class="timeline-news-template">
		<div class="post-container">
			<div class="post-info-container">
				<div class="post-header">
					<div class="post-header-info">
						<div class="content-exist">
							<?php $pgc =  apply_filters('the_content', get_post($post_ID)->post_content); ?>
							<?php if (check_exist_images($pgc)) : ?>
								<?php render_camera_icon(); ?>
							<?php endif; ?>
							<?php if (check_exist_video($pgc)) : ?>
								<?php render_video_content_icon(); ?>
							<?php endif; ?>
							<?php if (check_exist_map($pgc)) : ?>
								<?php render_location_icon(); ?>
							<?php endif; ?>
						</div>
						<div class="post-category">
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
					<div class="bottom-info-container">
						<div class="time-info">
							<span><?php echo get_the_time('H:i', $post_ID); ?></span>
							<span><?php echo get_the_time('d.m.Y', $post_ID); ?></span>
						</div>
						<div>
							<?php $is_advertising = carbon_get_post_meta($post_ID, 'news_is_advertising'); ?>

							<?php if ($is_advertising) : ?>
								<?php render_advertising_icon(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="content-container">
					<a class="content__description" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
						<?php echo wp_strip_all_tags(get_the_excerpt($post_ID), true); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php
}

function render_timeline_line_news($post_ID, $is_eof = false)
{
?>
	<div class="post-line <?php echo $is_eof ? 'eof' : ''; ?>">
		<div class="time-info">
			<span><?php echo get_the_time('H:i', $post_ID); ?></span>
		</div>
		<div class="post-content">
			<a class="post-title" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
				<?php echo wp_strip_all_tags(get_the_title($post_ID), true); ?>
			</a>
		</div>
	</div>
<?php
}
