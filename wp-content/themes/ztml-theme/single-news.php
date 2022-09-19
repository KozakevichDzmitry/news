<?php get_header(); ?>

<?php require_once(COMPONENTS_PATH . 'topic-bar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'pdf-attachments.php'); ?>
<?php require_once(COMPONENTS_PATH . 'sidebar.php'); ?>
<?php require_once(COMPONENTS_PATH . 'half-post.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-whole-post.php'); ?>
<?php require_once(COMPONENTS_PATH . 'news-templates/top-three-news-template.php'); ?>
<?php require_once(COMPONENTS_PATH . 'line-news-list-item.php'); ?>
<?php require_once(COMPONENTS_PATH . "adv.php"); ?>

<?php $id = get_the_ID(); ?>
    <div class="adfox-banner-background">
        <?php  render_adv('post',$id, 'background');?>
    </div>
    <main class="authors-column-page">
        <div class="container main-container">
            <div class="content-wrapper">
                <div class="main-content" id="<?php echo $post->ID; ?>">
                    <?php gt_set_post_view(); ?>

                    <?php render_news_whole_post($post); ?>

                    <?php render_top_three_news_template(); ?>

                    <?php render_topic_bar('Читайте и подписывайтесь', false); ?>

                    <div class="sub-block">
                        <div>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/yandex-logo.png'; ?>"/>
                        </div>
                        <div>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/yandex-logo-dzen.png'; ?>"/>
                        </div>
                        <div>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/google-logo.png'; ?>"/>
                        </div>
                    </div>

                    <?php
                    $meri_args = array(
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'post_type' => 'news',
                        'post__not_in' => array($post->ID),
                    );

                    $meri_posts = get_posts($meri_args);
                    ?>

                    <?php if (!empty($meri_posts)) : ?>
                        <?php foreach ($meri_posts as $post) : ?>
                            <?php render_news_whole_post($post->ID); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="loading-posts">
                        <span class="spinner"></span>
                    </div>
                </div>

            </div>
            <?php render_sidebar(); ?>
        </div>
    </main>

<?php get_footer(); ?>