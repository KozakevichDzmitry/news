<?php
/*
 * Template Name: Курс валют
*/
?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'calendar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php get_header(); ?>

<?php

$current_date = date('Y-m-d');
$last_date = date('Y-m-d', strtotime("-365 day"));

$id=get_the_ID();

?>
<main class="exchange-rates">
    <?php  render_adv('page',$id, 'top');?>
    <div class="container main-container">
        <?php  render_adv('page',$id, 'left');?>
        <?php  render_adv('page',$id, 'right');?>
        <div class="content-wrapper">
            <div class="main-content">

                <?php render_topic_bar(get_the_title(), false, array(
                    'render' => 'render_calendar',
                    'args' => array(
                        'id' => 'exchange-rates',
                        'min_date' => $last_date,
                        'max_date' => $current_date,
                    )
                ));
                ?>

                <div class="page-description">
                    <?php echo the_content(); ?>
                </div>
                <div class="exchange-rates-content">
                    <iframe frameborder="0" height="131" marginheight="0" marginwidth="0" scrolling="no" src="https://admin.myfin.by/outer/informer/minsk/full" width="100%"></iframe>
                </div>
            </div>
            <div class="second-content">
                <?php render_most_read_news_template(true); ?>
                <?php render_top_three_news_template(); ?>
                <?php render_newspapers_template(); ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) : ?>
            <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar('main-sidebar'); ?>
            </div>
        <?php endif; ?>
    </div>
</main>


<?php get_footer(); ?>
