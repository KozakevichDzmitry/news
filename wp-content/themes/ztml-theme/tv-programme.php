<?php

/*
 * Template Name: ТВ-программа
*/

?>

<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'tv-programm-list.php'); ?>

<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php require_once("tv-parser.php"); ?>

<?php
setlocale(LC_TIME, 'ru_RU.UTF-8');
$currentDate = date('Y-m-d', strtotime("this week"));
$currentNumDay = date('N');
$days = array('Пн', 'Вт', 'Ср', 'Чт', 'Пн', 'Сб', 'Вс');
$daysFull = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятницы', 'Суббота', 'Воскресенье');
$id=get_the_ID();


?>
    <div class="adfox-banner-background">
        <?php  render_adv('page',$id, 'background');?>
    </div>
<main class="tv-programme">
	<div class="container main-container">
		<div class="content-wrapper">
			<div class="main-content">
				<?php render_topic_bar(get_the_title(), false); ?>
				<div class="tv-controls">
					<div class="tv-controls__day-select">
						<ul class="day-select-list">
							<?php foreach ($days as $n => $day) : ?>
								<li class="day-select-item">
									<?php if ($n == ($currentNumDay - 1)) : ?>
										<button class="selected">
											<?php echo $day . ',' . date('d', strtotime("$currentDate +{$n} day")); ?>
										</button>
									<?php else : ?>
										<button class="no-selected">
											<?php echo $day . ',' . date('d', strtotime("$currentDate +{$n} day")); ?>
										</button>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="select-channel">
						<button>Выбрать канал</button>
						<div class="select-channel__menu">
							<ul class="channels-list">
								<?php foreach (get_template_tv_programs() as $channel) : ?>
									<li class="channels-list__item">
										<?php echo $channel['title']; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="tv-description">
					<p class="tv-programme__text"><b>ТВ программа на сегодня</b> пользуется популярностью у наших читателей. Делают ее востребованной удобный поиск, расписание и достаточное количество каналов, которые транслируются в Беларуси, – их представлено 59. Поиск организован таким образом, что любой желающий может без труда найти свою любимую передачу. Для этого нужно лишь вверху страницы во вкладке «Выбрать канал» нажать необходимый.</p>
					<p class="tv-programme__text">На портале minsknews.by представлена ТВ программа не только на сегодня. Вы можете узнать, во сколько покажут вашу любимую передачу, новости или сериал, например, завтра, просто выбрав кнопку с днем и датой. Всё максимально просто и удобно.</p>
				</div>
				<div class="tv-programme__wrapper">
					<?php foreach ($daysFull as $n => $day) : ?>
						<div class="tv-day-programme">
							<h2 class="tv-programme__title">Программа на сегодня – <?php echo strftime("%A, %d %B", strtotime("$currentDate +{$n} day")); ?></h2>
							<?php render_tv_programm_list(get_day_list(sanitize_file_name(mb_strtolower(strftime("%u %A, %d %B", strtotime("$currentDate +{$n} day")))))); ?>
						</div>
					<?php endforeach; ?>
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