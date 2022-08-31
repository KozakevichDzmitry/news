<?php

require_once(COMPONENTS_PATH . "icons/advertising-icon.php");
require_once(COMPONENTS_PATH . "icons/marker-icon.php");
require_once(COMPONENTS_PATH . "icons/location-icon.php");
require_once(COMPONENTS_PATH . "icons/camera-icon.php");
require_once(COMPONENTS_PATH . "icons/video-content-icon.php");

function render_line_regular_news($post_ID)
{
?>
	<div class="line-regular-news">
		<?php $img_url = get_the_post_thumbnail_url($post_ID, 'full'); ?>

		<?php if (!empty($img_url)) : ?>
			<a class="image" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
				<img src="<?php echo $img_url; ?>" />
			</a>
		<?php endif; ?>
		<div class="content">
			<div class="content-header">
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
				<span class="news-cat">
					<?php echo strip_tags(get_the_term_list($post_ID, 'news-list')); ?>
				</span>
			</div>
			<div class="content-container">
				<a class="content__description" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
					<?php echo wp_strip_all_tags(get_the_excerpt($post_ID), true); ?>
				</a>
			</div>
			<div class="info">
				<div class="bottom-info">
					<div class="info__time">
						<span><?php echo get_the_time('H:i', $post_ID); ?></span>
						<span><?php echo get_the_time('d.m.Y', $post_ID); ?></span>
					</div>
					<div class="advertising-marker">
						<?php $is_advertising = carbon_get_post_meta($post_ID, 'news_is_advertising'); ?>

						<?php if ($is_advertising) : ?>
							<?php render_advertising_icon(); ?>
						<?php endif; ?>
					</div>
				</div>
                <div class="share-block--fold">
                    <?php echo do_shortcode('[share_links]'); ?>
                    <?php render_share_icon(); ?>
                </div>
			</div>
		</div>
	</div>
<?php
}
