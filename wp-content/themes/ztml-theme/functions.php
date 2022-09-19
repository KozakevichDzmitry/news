<?php

// Все работает?

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');
define('FUNC_PATH', dirname(__FILE__) . '/functionality/');
define('REQUEST_HANDLERS', dirname(__FILE__) . '/request-handlers/');
define('IMAGES_PATH', dirname(__FILE__) . '/assets/images/');
define('LIBS_PATH', dirname(__FILE__) . '/libs/');
define('WIDGETS_PATH', dirname(__FILE__) . '/widget-templates/');
define('SHORTCODES_PATH', dirname(__FILE__) . '/shortcodes/');

require_once(FUNC_PATH . 'carbon-fields.php');

function crb_register_custom_fieldss()
{
    require_once(WIDGETS_PATH . 'news-widget.php');
}

add_action('carbon_fields_register_fields', 'crb_register_custom_fieldss');

add_theme_support('post-thumbnails');

function add_post_formats()
{
    add_theme_support('post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link'));
}

add_action('after_setup_theme', 'add_post_formats', 20);

function theme_init()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), _S_VERSION);
}

add_action('wp_enqueue_scripts', 'theme_init');

add_filter('wpcf7_form_elements', function ($form) {
    return do_shortcode($form);
});

require_once(FUNC_PATH . 'newspaper-taxonomy.php');
require_once(FUNC_PATH . 'district-taxonomy.php');
require_once(FUNC_PATH . 'nav-locations.php');
require_once(FUNC_PATH . 'satm-taxonomy.php');
require_once(FUNC_PATH . 'cae-taxonomy.php');
require_once(FUNC_PATH . 'aaq-taxonomy.php');
require_once(FUNC_PATH . 'primite-meri-taxonomy.php');
require_once(FUNC_PATH . 'authors-column-taxonomy.php');
require_once(FUNC_PATH . 'video-taxonomy.php');
require_once(FUNC_PATH . 'programs-post_type.php');
require_once(FUNC_PATH . 'post-dublicate.php');
require_once(FUNC_PATH . 'news-taxonomy.php');
require_once(FUNC_PATH . 'see-post_type.php');
require_once(FUNC_PATH . 'widgets.php');

require_once(COMPONENTS_PATH . "pdf-attachments.php");
require_once(COMPONENTS_PATH . 'satms-list-tem.php');
require_once(COMPONENTS_PATH . 'cae-list-item.php');
require_once(COMPONENTS_PATH . 'line-news-list-item.php');
require_once(COMPONENTS_PATH . 'news-whole-post.php');

require_once(REQUEST_HANDLERS . 'posts.php');
require_once(REQUEST_HANDLERS . 'timeline.php');
require_once(REQUEST_HANDLERS . 'news.php');
require_once(REQUEST_HANDLERS . 'news-posts.php');
require_once(REQUEST_HANDLERS . 'taxonomy-news-posts.php');
require_once(REQUEST_HANDLERS . 'taxonomy-authors-column-posts.php');
require_once(REQUEST_HANDLERS . 'taxonomy-take-action.php');
require_once(REQUEST_HANDLERS . 'taxonomy-cae-posts.php');
require_once(REQUEST_HANDLERS . 'main-timline-tape.php');
require_once(REQUEST_HANDLERS . 'author-materials.php');
require_once(REQUEST_HANDLERS . 'loadmore.php');

require_once(LIBS_PATH . 'diff-image/dif-image.php');

require_once(SHORTCODES_PATH . 'extrenal-radio-player.php');
require_once(SHORTCODES_PATH . 'eternal-video.php');
require_once(SHORTCODES_PATH . 'subscribe-form.php');
require_once(SHORTCODES_PATH . 'share-links.php');

function page_scripts()
{
    wp_enqueue_script('main-external-js', get_stylesheet_directory_uri() . '/scripts/components/eternal-video.js', array('jquery'), true);
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/scripts/main.js', array('jquery', 'sticky-sidebar-js'), true);
    wp_enqueue_script('timeline-js', get_stylesheet_directory_uri() . '/scripts/components/timeline.js', array('jquery'), true);
    wp_enqueue_script('ext-player', get_stylesheet_directory_uri() . '/scripts/components/ext-player.js', array('jquery'), true);
    // wp_enqueue_script('timeline-main-js', get_stylesheet_directory_uri() . '/scripts/components/main-timeline.js', array('jquery'), true);
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js', array('jquery'), null, true);

    wp_enqueue_script('datepicker-ru-js', get_template_directory_uri() . '/libs/datepicker-ru/datepicker-ru.js', array('jquery-ui', 'jquery'));

    wp_enqueue_script('calendar-js', get_stylesheet_directory_uri() . '/scripts/components/calendar.js', array('jquery-ui', 'datepicker-ru-js'), true);

    wp_enqueue_script('share-links-js', get_stylesheet_directory_uri() . '/scripts/components/share-links.js', array('jquery-ui', 'datepicker-ru-js'), true);

    wp_enqueue_script('search-bar-js', get_stylesheet_directory_uri() . '/scripts/components/search-bar.js', array(), true);

    wp_enqueue_script('play-preload-video-js', get_stylesheet_directory_uri() . '/scripts/components/play-preload-video.js', array(), true);

    global $wp_query;

    if (is_front_page()) {
        wp_enqueue_script('index-js', get_stylesheet_directory_uri() . '/scripts/pages/index.js', array('jquery', 'swiper-js', 'slick-min-js'), true);
        wp_localize_script('index-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    wp_localize_script('timeline-js', 'ajaxpagination', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'query_vars' => json_encode($wp_query->query)
    ));

    wp_localize_script('timeline-main-js', 'ajaxpagination', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'query_vars' => json_encode($wp_query->query)
    ));
    if (get_post_type() == "news") {
        wp_enqueue_script('loadmore', get_stylesheet_directory_uri() . '/scripts/components/loadmore.js', array('jquery'), 1.0, true);
        wp_localize_script('loadmore', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }


    if (get_page_template_slug() == "your-district.php") {
        wp_enqueue_script('your-district-page-js', get_stylesheet_directory_uri() . '/scripts/pages/your-district.js', array('jquery'), false);

        wp_localize_script('your-district-page-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_post_type() == "news") {
        wp_enqueue_script('taxonomy-news-js', get_stylesheet_directory_uri() . '/scripts/pages/taxonomy-news.js', array('jquery'), false);

        wp_localize_script('taxonomy-news-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_post_type() == 'district') {
        wp_enqueue_script('district-page-js', get_stylesheet_directory_uri() . '/scripts/pages/single-district.js', array('jquery', 'slick-min-js', 'slick-lightbox-min-js'), false);
        wp_enqueue_style('slick-lightbox-css', get_template_directory_uri() . '/libs/slick-lightbox/slick-lightbox.css');
        wp_enqueue_script('slick-lightbox-min-js', get_template_directory_uri() . '/libs/slick-lightbox/slick-lightbox.min.js', array('jquery'));
    }

    if (get_page_template_slug() == 'tv-programme.php') {
        wp_enqueue_script('accordion-components-js', get_stylesheet_directory_uri() . '/scripts/components/accordion.js', array('jquery'), true);
        wp_enqueue_script('tv-programme-page-js', get_stylesheet_directory_uri() . '/scripts/pages/tv-programms.js', array('jquery'), true);
    }

    if (get_page_template_slug() == 'radio-minsk.php') {
        wp_enqueue_script('radio-minsk-page-js', get_stylesheet_directory_uri() . '/scripts/pages/radio-minsk.js', array('jquery', 'slick-min-js'), false);
    }

    if (get_post_type() == 'newspaper') {
        wp_enqueue_script('newspaper-js', get_stylesheet_directory_uri() . '/scripts/pages/newspapers.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('newspaper-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'events.php') {
        wp_enqueue_script('events.js', get_stylesheet_directory_uri() . '/scripts/pages/events.js', array('jquery'), false);
    }

    if (get_page_template_slug() == 'satms.php') {
        wp_enqueue_script('satms-js', get_stylesheet_directory_uri() . '/scripts/pages/satms.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('satms-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'cae.php') {
        wp_enqueue_script('cae-js', get_stylesheet_directory_uri() . '/scripts/pages/cae.js', array('jquery'), true);
        wp_enqueue_script('cae-components-js', get_stylesheet_directory_uri() . '/scripts/components/mn-player.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('cae-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'ask-a-question.php') {
        wp_enqueue_script('aaq-js', get_stylesheet_directory_uri() . '/scripts/pages/aaq.js', array('jquery'), true);
    }

    if (get_post_type() == 'satm') {
        wp_enqueue_script('single-satm-js', get_stylesheet_directory_uri() . '/scripts/pages/single-satm.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('single-satm-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'take-action.php') {
        wp_enqueue_script('take-action-js', get_stylesheet_directory_uri() . '/scripts/pages/take-action.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('take-action-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'authors-column.php') {
        wp_enqueue_script('authors-column-js', get_stylesheet_directory_uri() . '/scripts/pages/authors-column.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('authors-column-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_post_type() == "authors-column") {
        wp_enqueue_script('single-authors-column-js', get_stylesheet_directory_uri() . '/scripts/pages/single-authors-column.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('single-authors-column-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }
    if (get_page_template_slug() == 'exchange-rates.php') {
        wp_enqueue_script('exchange-rates-js', get_stylesheet_directory_uri() . '/scripts/pages/exchange-rates.js', array('jquery'), true);
    }

    if (get_page_template_slug() == 'all-news.php') {
        slick_register();
        wp_enqueue_script('all-news-js', get_stylesheet_directory_uri() . '/scripts/pages/all-news.js', array('jquery', 'slick-min-js'), true);
        global $wp_query;

        wp_localize_script('all-news-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (is_author()) {
        wp_enqueue_script('author-page-js', get_stylesheet_directory_uri() . '/scripts/pages/author.js', array('jquery'), true);

        global $wp_query;

        wp_localize_script('author-page-js', 'ajaxpagination', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query)
        ));
    }

    if (get_page_template_slug() == 'page-advertisement.php') {
        wp_enqueue_script('advertisement-js', get_stylesheet_directory_uri() . '/scripts/pages/advertisement.js', array('jquery'), true);
    }
}


add_action('wp_enqueue_scripts', 'page_scripts');

function slick_register()
{
    // Slick CSS & JS files
    wp_register_style('slick-css', get_template_directory_uri() . '/libs/slick/slick.css');
    wp_register_style('slick-theme-css', get_template_directory_uri() . '/libs/slick/slick-theme.css');
    wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/libs/slick/slick.min.js', array('jquery'));

    // Our Custom JS (we'll initialize slick here)

    // Enqueue all CSS & JS files
    wp_enqueue_style('slick-css');
    wp_enqueue_style('slick-theme-css');
    wp_enqueue_script('jquery-min-js');
    wp_enqueue_script('slick-min-js');
}

add_action('wp_enqueue_scripts', 'slick_register');

function swiper_register()
{
    wp_register_style('swiper-css', get_template_directory_uri() . '/libs/swiper/swiper.css');
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/libs/swiper/swiper.js', array('jquery'));

    wp_enqueue_style('swiper-css');
    wp_enqueue_script('swiper-js');
}

add_action('wp_enqueue_scripts', 'swiper_register');

function jquery_sticky_register()
{
    wp_enqueue_script('jquery-sticky-js', get_template_directory_uri() . '/libs/jquery-sticky/jquery-sticky.js', array('jquery'));
    wp_enqueue_script('jquery-sticky-js');
}

add_action('wp_enqueue_scripts', 'jquery_sticky_register');

function sticky_sidebar_register()
{
    wp_enqueue_script('sticky-sidebar-js', get_template_directory_uri() . '/libs/sticky-sidebar/sticky-sidebar.min.js', array('jquery'));
    wp_enqueue_script('sticky-sidebar-js');
}

add_action('wp_enqueue_scripts', 'sticky_sidebar_register');

function sticky_adv_register()
{
    wp_enqueue_script('stickyAdv-js', get_template_directory_uri() . '/libs/stickyAdv/stickyAdv.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'sticky_adv_register');

function diff_image_register()
{
    wp_register_style('diff-image-css', get_template_directory_uri() . '/libs/diff-image/dif-image.css');
    wp_enqueue_script('diff-image-js', get_template_directory_uri() . '/libs/diff-image/dif-image.js', array('jquery'));

    wp_enqueue_style('diff-image-css');
    wp_enqueue_script('diff-image-js');
}

add_action('wp_enqueue_scripts', 'diff_image_register');

add_action('wp_ajax_nopriv_satms_load', 'satms_load');
add_action('wp_ajax_satms_load', 'satms_load');

function satms_load()
{
    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => $_POST['load'],
        'post_type' => 'satm',
        'offset' => $_POST['offset']
    );

    $posts = get_posts($args);

    if (!empty($posts)) {
        foreach ($posts as $post) {
            render_satms_list_items($post);
        }
    }

    die();
}

add_action('wp_ajax_nopriv_caes_load', 'caes_load');
add_action('wp_ajax_caes_load', 'caes_load');

function caes_load()
{
    for ($i = 1; $i <= 3; $i++) {
        render_cae_item_list();
    }
    die();
}

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');


// AJAX загрузка постов
function load_posts()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['posts_per_page'] = $_POST['load'];
    $args['offset'] = $_POST['show'];
    $posts = get_posts($args);

    if (!empty($posts)) {
        foreach ($posts as $pst) {
            get_template_part('./components/tpl-' . $_POST['tpl'], null, ['ID' => $pst->ID]);
        }
        die();
    }
}

add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');

require_once(__DIR__ . "/tv-parser.php");

function save_post_action($id, $post)
{
    if (get_page_template_slug($post) === 'tv-programme.php') {
        $zip_url = get_attached_file(carbon_get_post_meta($id, "crb_tv_programms"));

        if (strlen($zip_url)) {
            parse_tv_programm_file($zip_url);
        }
    }
}

add_action('post_updated', 'save_post_action', 10, 3);


add_shortcode('socials', 'social_shortcode');
function social_shortcode()
{
    $r = '<div class="social-icons">';
    foreach (carbon_get_the_post_meta('socials') as $item) :
        $r .= '<div>';
        $r .= '<a href="' . $item['link'] . '"><img src="' . wp_get_attachment_url($item['icon']) . '" width="30"></a>';
        $r .= '</div>';
    endforeach;
    $r .= '</div>';
    return $r;
}

require_once(COMPONENTS_PATH . 'single-satm-slide.php');

function satm_single_load()
{
    $posts = new WP_Query(
        array(
            'post_count' => 1,
            'post_type' => 'satm',
        )
    );

    if ($posts->have_posts()) {
        $first_post = $posts->posts[0];
        for ($i = 0; $i < 4; $i++) {
            single_satm_slide($first_post);
        }
    }


    die();
}

add_action('wp_ajax_satmsingleload', 'satm_single_load');
add_action('wp_ajax_nopriv_satmsingleload', 'satm_single_load');

function trim_excerpt($text)
{
    $text = str_replace('[&hellip;]', '...', $text);
    return $text;
}

add_filter('get_the_excerpt', 'trim_excerpt');

function custom_excerpt_length($length)
{
    return 15;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function meri_controller()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['posts_per_page'] = $_POST['load'];
    $args['offset'] = $_POST['show'];
    $args['post_status'] = 'publish';
    $args['post_type'] = 'meri';
    $posts = get_posts($args);

    foreach ($posts as $pst) {
        render_line_news_list_item($pst->ID);
    }
    die();
}

add_action('wp_ajax_meri_controller', 'meri_controller');
add_action('wp_ajax_nopriv_meri_controller', 'meri_controller');

function authors_column_controller()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['posts_per_page'] = $_POST['load'];
    $args['offset'] = $_POST['show'];
    $args['post_status'] = 'publish';
    $args['post_type'] = 'authors-column';
    $posts = get_posts($args);

    foreach ($posts as $pst) {
        render_line_news_list_item($pst->ID, true);
    }
    die();
}

add_action('wp_ajax_authors_column_controller', 'authors_column_controller');
add_action('wp_ajax_nopriv_authors_column_controller', 'authors_column_controller');

function check_exist_images($content)
{
    $image_check_pattern = '/<img.*?src="(.*?)"/i';

    $images_list = array();

    $r = preg_match_all($image_check_pattern, $content, $images_list);

    if ($r === 0) return false;

    return count($images_list) > 0 ? true : false;
}

function check_exist_video($content)
{
    $iframe_map_url_pattern = '/<iframe.*?src="(.*?)"/i';
    $wp_player_pattern = '/wp-video-shortcode/i';

    $youtube_base_url = 'https://www.youtube.com/embed';
    $vmeo_base_url = 'https://player.vimeo.com/video';

    $videos_exist = false;

    $videos_list = array();

    $video_check_pattern = '/<video.*?>/i';

    if (preg_match_all($video_check_pattern, $content, $videos_list)) {
        foreach (get_media_embedded_in_content($content) as $iframe) {
            $matches = array();
            if (preg_match($iframe_map_url_pattern, $iframe, $matches)) {
                $url = $matches[1];
                $youtube_match = strripos($url, $youtube_base_url);
                $vmeo_match = strripos($url, $vmeo_base_url);

                if (($youtube_match !== false && $youtube_match >= 0) || ($vmeo_match !== false && $vmeo_match >= 0)) {
                    $videos_exist = true;
                }
            }
        }
    }

    return $videos_exist === true || preg_match_all($wp_player_pattern, $content) || count($videos_list) ? true : false;
}

function check_exist_map($content)
{
    $iframe_map_url_pattern = '/<iframe.*?src="(.*?)"/i';
    $yandex_map_url = 'https://yandex.by/map-widget';
    $google_map_url = 'https://www.google.com/maps/embed';

    $map_exist = false;

    foreach (get_media_embedded_in_content($content) as $iframe) {
        $matches = array();
        if (preg_match($iframe_map_url_pattern, $iframe, $matches)) {
            $url = $matches[1];
            $google_match = strripos($url, $google_map_url);
            $yandex_match = strripos($url, $yandex_map_url);

            if (($google_match !== false && $google_match >= 0) || ($yandex_match !== false && $yandex_match >= 0)) {
                $map_exist = true;
            }
        }
    }

    return $map_exist;
}

function iframe_scn($atts)
{
    $atts = shortcode_atts(array(
        'src' => '#',
        'frameborder' => '0',
        'allowfullscreen' => 'allowfullscreen'
    ), $atts);

    return '<iframe title="YouTube video player" src="' . $atts['src'] . '" width="560" height="315" frameborder="' . $atts['frameborder'] . '" allowfullscreen="' . $atts['allowfullscreen'] . '"></iframe>';
}

add_shortcode("iframe", "iframe_scn");

function gt_get_post_view()
{
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    return $count;
}

function gt_set_post_view()
{
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int)get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

function gt_posts_column_views($columns)
{
    $columns['post_views'] = 'Views';
    return $columns;
}

function gt_posts_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo gt_get_post_view();
    }
}

add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');

function get_attached_news($count, $term)
{
    $quary_args = [
        'post_type' => 'news',
        'post_per_page' => $count,
        'post_status' => 'publish',
        'paged' => 1,
        'ignore_sticky_posts' => true,
        'tax_query' => [
            [
                'taxonomy' => 'news-list',
                'terms' => $term,
                'field' => 'slug',
                'operator' => 'IN'
            ]
        ],
        'meta_query' => [
            'relation' => 'OR',
            [
                'key' => '_news_is_attached',
                'value' => 'no'
            ],
            [
                'key' => '_news_is_attached',
                'compare' => 'NOT EXISTS'
            ],
            [
                'key' => '_news_is_attached',
                'value' => 'yes'
            ]
        ],
        'orderby' => ['meta_value_num' => 'DESC'],
    ];

    $attached_news_quary = new WP_Query($quary_args);

    $post_ids = get_posts(array_merge(array('fields' => 'ids'), $quary_args));

    return array(
        'posts' => $attached_news_quary->posts,
        'ids' => $post_ids
    );
}

function get_default_news($count, $term, $exclude_list)
{
    $quary_args = [
        'post_type' => 'news',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'paged' => 1,
        'ignore_sticky_posts' => true,
        'tax_query' => [
            [
                'taxonomy' => 'news-list',
                'terms' => $term,
                'field' => 'slug',
                'operator' => 'IN'
            ]
        ],
        'post__not_in' => $exclude_list,
    ];

    $news_posts = new WP_Query($quary_args);

    return $news_posts->posts;
}


$post_types=array('news'); //get names of post types

foreach($post_types as $post_type){
    //add action to each post type
    add_action( 'publish_'.$post_type, 'notify_published_post' );
}

function notify_published_post($post_id){

    set_transient( 'new_post_id', $post_id, 30 );
}


