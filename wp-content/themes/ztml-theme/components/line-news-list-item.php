<?php

function render_line_news_list_item($post_ID, $reversClass = false)
{
?>
	<div class="line-news <?php echo $reversClass ? ' column-revers' : ''; ?>">
		<?php $img_url = get_the_post_thumbnail_url($post_ID, 'full'); ?>

		<?php if (!empty($img_url)) : ?>
			<a class="image" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
				<img src="<?php echo $img_url; ?>" />
			</a>
		<?php endif; ?>
		<div class="content">
			<div class="content-container">
				<a href="<?php echo esc_url(get_permalink($post_ID)); ?>">
					<span class="content__title"><?php echo get_the_title($post_ID); ?></span>
				</a>
				<a class="content__description" href="<?php echo esc_url(get_permalink($post_ID)); ?>">
					<?php echo wp_strip_all_tags(get_the_excerpt($post_ID), true); ?>
				</a>
			</div>
			<div class="info">
				<div class="info__time">
					<span><?php echo get_the_time('H:i', $post_ID); ?></span>
					<span><?php echo get_the_time('d.m.Y', $post_ID); ?></span>
				</div>
				<div class="info__share-btn">
					<svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.33333 0L8.23667 1.00714L9.33333 2.02143L11.0211 3.57143H3.88889C1.74222 3.57143 0 5.17143 0 7.14286V10H1.55556V7.14286C1.55556 5.96429 2.60556 5 3.88889 5H11.0211L8.23667 7.55714L9.33333 8.57143L14 4.28571L9.33333 0Z" fill="#D91E23" fill-opacity="0.6" />
					</svg>
				</div>
			</div>
		</div>
	</div>
<?php
}
