<?php

/*
 * Template Name: Подписка
*/

?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php
$id = get_the_ID();

?>
<?php get_header(); ?>

    <main class="subscribe">
        <?php  render_adv('page',$id, 'top');?>
        <div class="container main-container">
            <?php  render_adv('page',$id, 'left');?>
            <?php  render_adv('page',$id, 'right');?>
            <div class="content-wrapper">
                <div class="main-content">
                    <?php render_topic_bar(get_the_title(), false); ?>

                    <div class="subscribe-block">
                        <?php echo apply_filters('the_content', get_the_content()); ?>
                    </div>

                    <?php render_topic_bar("Пробный вариант"); ?>
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