<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . "topic-minibar.php"); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates/culture-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/district-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/economy-tempalte.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/society-news-tempalte.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/urban-economy-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php");?>
<?php

$districts = new WP_Query(array(
	'post_type' => 'district',
	'post_status' => 'publish'
));

$id=get_the_ID();
?>
    <div class="adfox-banner-background">
        <?php  render_adv('page',$id, 'background');?>
    </div>
<main id="district" class="district">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar(get_the_title(), true, [], false); ?>
				<div class="district__slider">
					<?php foreach (carbon_get_the_post_meta('crb_district_gallery_iamges') as $id) : ?>
						<div>
                            <a href="<?php echo wp_get_attachment_url($id); ?>"><img src="<?php echo wp_get_attachment_url($id); ?>" /></a>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="district__info">
					<?php the_content(); ?>
				</div>
				<div class="district__link">
					<a href="<?php echo carbon_get_the_post_meta('crb_gov_link_url'); ?>">
						<?php echo carbon_get_the_post_meta('crb_gov_link_text'); ?>
					</a>
				</div>
			</div>
			<div class="second-content">
				<?php render_society_news_template(true); ?>
				<?php render_urban_economy_news_template(true); ?>
				<?php render_economy_news_template(true); ?>
				<?php render_most_read_news_template(true); ?>
				<?php render_top_three_news_template(); ?>
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<div class="sidebar-wrapper">
			<div class="dynamic-sidebar">
				<?php if ($districts->have_posts()) : ?>
					<?php while ($districts->have_posts()) : $districts->the_post(); ?>
						<?php render_topic_minibar(get_the_title(), get_post_permalink()); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>