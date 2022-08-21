<?php

/*
 * Template Name: Задайте вопрос столичным властям
*/

?>

<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>

<?php
$efir_podcast = new WP_Query(
	array(
		'post_count' => 3,
		'post_type' => 'aaq',
	)
);
?>

<main class="aaq">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar(get_the_title(), false); ?>
				<div class="aqq-content">
					<p class="title">Уважаемые жители столицы, Мингорисполком совместно с агентством «Минск-Новости» реализует проект «Задайте вопрос столичным властям».</p>

					<div class="part">
						<div>
							<?php echo get_the_post_thumbnail(); ?>
						</div>
						<div>
							<?php echo the_content(); ?>
						</div>
					</div>
				</div>
				<div class="aaq-question-list">
					<div class="aaq-question-list-item">
						<div class="aaq-question-list-item__name">
							<p>Анна Донцова</p>
						</div>
						<div class="aaq-question-list-item__ask">
							<p>—Уважаемый Сергей Павлович, обращаюсь к вам с просьбой рассмотреть возможность проложить пешеходную дорожку от ТЦ «ГИППО» по адресу: ул. Горецкого, 2, в сторону ул. Ельских и Михаловской. Проживаю на Михаловской, 6. Торговый центр находится в шаговой доступности. В хорошую погоду местные жители идут в магазин через поле, при плохих погодных условиях приходится обходить по кругу. Будем рады и признательны, если просьба будет удовлетворена.</p>
						</div>
					</div>
					<div class="aaq-question-list-item">
						<div class="aaq-question-list-item__name">
							<p>Анна Донцова</p>
						</div>
						<div class="aaq-question-list-item__ask">
							<p>—Уважаемый Сергей Павлович, обращаюсь к вам с просьбой рассмотреть возможность проложить пешеходную дорожку от ТЦ «ГИППО» по адресу: ул. Горецкого, 2, в сторону ул. Ельских и Михаловской. Проживаю на Михаловской, 6. Торговый центр находится в шаговой доступности. В хорошую погоду местные жители идут в магазин через поле, при плохих погодных условиях приходится обходить по кругу. Будем рады и признательны, если просьба будет удовлетворена.</p>
						</div>
					</div>
					<div class="aaq-question-list-item">
						<div class="aaq-question-list-item__name">
							<p>Анна Донцова</p>
						</div>
						<div class="aaq-question-list-item__ask">
							<p>—Уважаемый Сергей Павлович, обращаюсь к вам с просьбой рассмотреть возможность проложить пешеходную дорожку от ТЦ «ГИППО» по адресу: ул. Горецкого, 2, в сторону ул. Ельских и Михаловской. Проживаю на Михаловской, 6. Торговый центр находится в шаговой доступности. В хорошую погоду местные жители идут в магазин через поле, при плохих погодных условиях приходится обходить по кругу. Будем рады и признательны, если просьба будет удовлетворена.</p>
						</div>
					</div>
					<div class="aaq-question-list-item">
						<div class="aaq-question-list-item__name">
							<p>Анна Донцова</p>
						</div>
						<div class="aaq-question-list-item__ask">
							<p>—Уважаемый Сергей Павлович, обращаюсь к вам с просьбой рассмотреть возможность проложить пешеходную дорожку от ТЦ «ГИППО» по адресу: ул. Горецкого, 2, в сторону ул. Ельских и Михаловской. Проживаю на Михаловской, 6. Торговый центр находится в шаговой доступности. В хорошую погоду местные жители идут в магазин через поле, при плохих погодных условиях приходится обходить по кругу. Будем рады и признательны, если просьба будет удовлетворена.</p>
						</div>
					</div>
				</div>
				<div class="efirs-list">
					<div class="efirs-list-item">
						<?php if ($efir_podcast->have_posts()) : ?>
							<?php while ($efir_podcast->have_posts()) : ?>
								<?php $efir_podcast->the_post(); ?>
								<div class="efirs-list-item__decription">
									<?php echo the_content(); ?>
								</div>
								<div class="efirs-list-item__efir-part">
									<div class="efirs-list-item__thumb">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
									<div>
										<?php echo carbon_get_post_meta(get_the_ID(), 'crb_youtube_code_aqq'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="aaq__moree-btn">
					<button>Показать ещё</button>
				</div>
			</div>
			<div class="second-content">
				<?php render_most_read_news_template(true); ?>
				<?php render_top_three_news_template(); ?>
				<?php render_newspapers_template(); ?>
			</div>
		</div>
		<?php render_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>