<?php
/*
 * Template Name: Смотрите
*/

?>

<?php get_header(); ?>

<main class="all-videos">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar(get_the_title(), false); ?>
				<div class="content">
					<?php get_the_content(); ?>
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