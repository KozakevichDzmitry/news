<?php

/*
 * Template Name: Руководство
*/

?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>

<?php require_once(COMPONENTS_PATH . 'management-item.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>

<?php require_once(COMPONENTS_PATH . 'news-templates.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/newspapers-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/most-read-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>
<?php
$id = get_the_ID();

?>
<?php get_header(); ?>

<?php $managers = carbon_get_post_meta(get_queried_object_id(), 'crb_manager_description'); ?>
    <div class="adfox-banner-background">
        <?php  render_adv('page',$id, 'background');?>
    </div>
    <main class="managment">
        <div class="container main-container">
            <div class="content-wrapper">
                <div class="main-content">
                    <?php render_topic_bar(get_the_title(), false); ?>
                    <div class="managment-list">
                        <?php foreach ($managers as $manager) : ?>
                            <?php render_management_item($manager['manager_name'], $manager['manager_role'], $manager['manager_bio'], $manager['manager_photo'], $manager['manager_reception']); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="text__field">
                        <span><?php echo carbon_get_post_meta(get_queried_object_id(), 'crb_managet_last_block'); ?></span>
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