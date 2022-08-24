<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once(FUNC_PATH . 'getWpadcenterPostData.php');

function crb_attach_theme_options()
{
    Container::make('post_meta', 'PDF')
        ->where('post_type', '=', 'newspaper')
        ->add_fields(
            array(
                Field::make('file', 'crb_pdf_attachment', 'PDF файл')
            )
        );

    Container::make('post_meta', 'Файл программы')
        ->where('post_template', '=', 'tv-programme.php')
        ->add_fields(
            array(
                Field::make('file', 'crb_tv_programms', 'Архив програм (zip)')->set_width(100)
            )
        );

    Container::make('term_meta', __('Term Options', 'crb'))
        ->where('term_taxonomy', '=', 'newspapers')
        ->add_fields(array(
            Field::make('text', 'crb_newspapers_taxonomy_show_count', 'Показывать шт.')
                ->set_attribute('min', '0'),
            Field::make('text', 'crb_newspapers_taxonomy_load_count', 'Загружать шт.')
                ->set_attribute('min', '1')
        ));

    Container::make('post_meta', __('Руководители', 'crb'))
        ->where('post_template', '=', 'management.php')
        ->add_fields(
            array(
                Field::make('complex', 'crb_manager_description', 'Руководитель')
                    ->add_fields(
                        array(
                            Field::make('image', 'manager_photo', 'Фото')->set_value_type('url'),
                            Field::make('text', 'manager_name', 'Фио'),
                            Field::make('text', 'manager_role', 'Должность'),
                            Field::make('rich_text', 'manager_bio', 'Биография'),
                            Field::make('rich_text', 'manager_reception', 'Время приёма'),
                        )
                    )
            )
        );

    Container::make('post_meta', __('Текст после руководителей', 'crb'))
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'management.php')
        ->add_fields(
            array(
                Field::make('rich_text', 'crb_managet_last_block', 'Текст')
            )
        );

    Container::make('post_meta', __('Текст после заголовка', 'crb'))
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'printing.php')
        ->add_fields(
            array(
                Field::make('rich_text', 'crb_title', 'Текст')
            )
        );

    Container::make('post_meta', __('Полный список услуг', 'crb'))
        ->where('post_template', '=', 'printing.php')
        ->add_fields(
            array(
                Field::make('text', 'crb_services_caption', 'Заголовок'),
                Field::make('complex', 'crb_printing_services', 'Услуги')
                    ->add_fields(
                        array(
                            Field::make('text', 'crb_service', 'Название услуги'),
                        )
                    )
            )
        );

    Container::make('post_meta', __('Контакты:', 'crb'))
        ->where('post_template', '=', 'printing.php')
        ->add_fields(
            array(
                Field::make('text', 'crb_contacts_caption', 'Заголовок'),
                Field::make('complex', 'crb_contacts', 'Контакты')
                    ->add_fields(
                        array(
                            Field::make('text', 'crb_contact', 'Контакт'),
                            Field::make('text', 'crb_link', 'Ссылка'),
                        )
                    )
            )
        );

    Container::make('post_meta', 'Галерея')
        ->where('post_type', '=', 'district')
        ->add_fields(
            array(
                Field::make('media_gallery', 'crb_district_gallery_iamges', 'Изображения')
                    ->set_type(array('image'))
            )
        );

    Container::make('post_meta', 'Ссылка на сайт администрации')
        ->where('post_type', '=', 'district')
        ->add_fields(
            array(
                Field::make('text', 'crb_gov_link_text', 'Текст'),
                Field::make('text', 'crb_gov_link_url', 'Ссылка'),
            )
        );

    Container::make('post_meta', __('Форма обращения:', 'crb'))
        ->where('post_template', '=', 'appeal.php')
        ->add_fields(
            array(
                Field::make('text', 'crb_apeal_form', 'Шорткод формы'),
            )
        );

    Container::make('post_meta', __('Радио-Минск:'))
        ->where('post_template', '=', 'radio-minsk.php')
        ->add_fields(
            array(
                Field::make('text', 'program_title', 'Заголовок списка программ'),
                Field::make('complex', 'contacts', 'Контакты')->add_fields(array(
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('rich_text', 'content', 'Описание')
                ))->set_width(50),
                Field::make('complex', 'socials', 'Соцсети')->add_fields(array(
                    Field::make('image', 'icon', 'Иконка'),
                    Field::make('text', 'link', 'Ссылка'),
                )),
                Field::make('text', 'search_sound_title', 'Заголовок поиска песен'),
                Field::make('rich_text', 'search_sound_content', 'Описание поиска песен')
            )
        );

    Container::make('post_meta', __('Программы:'))
        ->where('post_type', '=', 'programs')
        ->add_fields(
            array(
                Field::make('text', 'subtitle', 'Подзаголовок')
            )
        );

    Container::make('post_meta', __('Команда:'))
        ->where('post_template', '=', 'radio-minsk.php')
        ->add_fields(
            array(
                Field::make('complex', 'crb_radio_minsk_team', '')
                    ->add_fields(
                        array(
                            Field::make('image', 'crb_radio_minsk_member_photo', 'Фото')->set_value_type('url'),
                            Field::make('text', 'crb_radio_minsk_member_fio', 'Фио'),
                            Field::make('rich_text', 'crb_radio_minsk_member_short', 'Краткое описание'),
                        )
                    )
            )
        );

    Container::make('post_meta', 'Видео')
        ->where('post_type', '=', 'satm')
        ->add_fields(
            array(
                Field::make('text', 'crb_youtube_code', 'Код с видео'),
                Field::make('media_gallery', 'crb_simple_video', 'Файл видео')
                    ->set_type(array('video'))
            )
        );

    Container::make('post_meta', 'Запись подкста')
        ->where('post_type', '=', 'cae')
        ->add_fields(
            array(
                Field::make('media_gallery', 'crb_podcast_file', 'Файл записи подкаста')
                    ->set_type(array('audio'))
            )
        );

    Container::make('post_meta', 'Запись подкста')
        ->where('post_type', '=', 'aaq')
        ->add_fields(
            array(
                Field::make('text', 'crb_youtube_code_aqq', 'Код с видео'),
                Field::make('media_gallery', 'crb_aqq_video', 'Файл видео')
                    ->set_type(array('video'))
            )
        );
    Container::make('post_meta', 'О нас')
        ->show_on_page('ob-agentstve')
        ->add_fields(
            array(
                Field::make('complex', 'numbers', '')->add_fields(array(
                    Field::make('image', 'image', 'Изображение'),
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('text', 'text', 'Текст'),
                )),
                Field::make('rich_text', 'content2', ''),
                Field::make('complex', 'about_socials', 'Соцсети')->add_fields(array(
                    Field::make('image', 'icon', 'Иконка'),
                    Field::make('text', 'link', 'Ссылка')
                )),
                Field::make('rich_text', 'content3', ''),
                Field::make('complex', 'cities', '')->add_fields(array(
                    Field::make('text', 'title', 'Название города'),
                    Field::make('text', 'text', 'Число'),
                )),
                Field::make('complex', 'numbers2', '')->add_fields(array(
                    Field::make('image', 'image', 'Изображение'),
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('rich_text', 'text', 'Текст'),
                )),
                Field::make('rich_text', 'content4', ''),
            )
        );

    Container::make('post_meta', 'Насткройки новости')
        ->where('post_type', '=', 'news')
        ->add_fields(
            array(
                Field::make('checkbox', 'news_is_advertising', 'Реклама?')
                    ->set_option_value('yes')->set_default_value('no'),
                Field::make('checkbox', 'news_is_attached', 'Закрепленная?')
                    ->set_option_value('yes')->set_default_value('no'),
            )
        );

//	Container::make('post_meta', 'Структура')
//		->where('post_template', '=', 'index-page.php')
//		->add_fields(
//			array(
//				Field::make('association', 'crb_association')
//					->set_types(array(
//						array(
//							'type' => 'term',
//							'taxonomy' => 'news-list',
//						),
//						array(
//							'type' => 'post',
//							'post_type' => 'wpadcenter-ads'
//						),
//					))->set_duplicates_allowed(true)
//			)
//		);
    Container::make('post_meta', 'Место размещения рекламных блоков')
        ->where('post_template', '=', 'index-page.php')
        ->add_fields(
            array(
                Field::make("select", "crb_adv_block", 'Реклама до блока "Главное"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block1", 'Реклама после блока "Новости"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block2", 'Реклама после блока "Ваш район"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block3", 'Реклама после блока "Самое читаемое"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block4", 'Реклама после блока "Общество"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block5", 'Реклама после блока "Смотрите"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block6", 'Реклама после блока "Городское хозяйство"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block7", 'Реклама после блока "Экономика"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block8", 'Реклама после блока "Культура"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block9", 'Реклама после блока "Спорт"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block10", 'Реклама после блока "Происшествия"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block11", 'Реклама после блока "Новости мира"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block12", 'Реклама после блока "Палитра дня"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block13", 'Реклама после блока "Авторская колонка"')
                    ->add_options('getWpadcenterPostData'),
                Field::make("select", "crb_adv_block14", 'Реклама после блока "Газеты"')
                    ->add_options('getWpadcenterPostData')
            ),
        );

    Container::make('post_meta', 'Превью')
        ->where('post_type', '=', 'video')
        ->add_fields(
            array(
                Field::make('media_gallery', 'video_post_type_eternal_video', 'Встроенное видео')
                    ->set_type(array('video')),
                Field::make('text', 'video_post_type_youtube-link', 'Код Iframe из YouTube'),
            )
        );

    Container::make('post_meta', 'Блок "Контакты"')
        ->where('post_template', '=', 'page-about.php')
        ->add_fields(
            array(
                Field::make('text', 'page_about_contacts_title', 'Заголовок'),
                Field::make('rich_text', 'page_about_contacts_content', 'Контент'),
            )
        );

    Container::make('post_meta', 'Блок "Руководство УП «Агентство «Минск-Новости»"')
        ->where('post_template', '=', 'page-about.php')
        ->add_fields(
            array(
                Field::make('text', 'page_about_managment_title', 'Заголовок'),
                Field::make('rich_text', 'page_about_managment_content', 'Контент'),
            )
        );

    Container::make('post_meta', 'Блок "Печатные сми"')
        ->where('post_template', '=', 'page-about.php')
        ->add_fields(array(
            Field::make('text', 'page_about_psmi_title', 'Заголовок'),
            Field::make('complex', 'page_about_psmi_cards', 'СМИ')->add_fields(array(
                Field::make('text', 'page_about_psmi_card_title', 'Заголовок'),
                Field::make('rich_text', 'page_about_psmi_card_text', 'Контент')
            ))->set_layout('tabbed-horizontal')
        ));

    Container::make('post_meta', 'Блок "Информационное агентство «Минск новости»"')
        ->where('post_template', '=', 'page-about.php')
        ->add_fields(
            array(
                Field::make('text', 'page_about_info_title', 'Заголовок блока'),
                Field::make('rich_text', 'page_about_info_text', 'Описание'),
                Field::make('complex', 'page_about_info_cards', 'Карточки')->add_fields(array(
                    Field::make('text', 'page_about_info_card_image', 'Картинка'),
                    Field::make('text', 'page_about_info_card_numbers', 'Кол-во'),
                    Field::make('rich_text', 'page_about_info_card_text', 'Описание'),
                ))->set_layout('tabbed-horizontal'),
            )
        );

    Container::make('post_meta', 'Блок "Структура медихолдинга"')
        ->where('post_template', '=', 'page-about.php')
        ->add_fields(
            array(
                Field::make('text', 'page_about_struct_title', 'Заголовок блока'),
                Field::make('complex', 'page_about_struct_images', 'Логоотипы')->add_fields(array(
                    Field::make('image', 'page_about_struct_single_image', 'Изображение')->set_value_type('url'),
                ))->set_layout('tabbed-horizontal'),
            )
        );

    Container::make('post_meta', 'Прейскурант')
        ->where('post_template', '=', 'page-advertisement.php')
        ->add_fields(
            array(
                Field::make('complex', 'page_advertisement_block', 'Аккардион')->add_fields(array(
                    Field::make('text', 'page_advertisement_block_title', 'Заголовок'),
                    Field::make('rich_text', 'page_advertisement_block_content', 'Контент')
                ))->set_layout('tabbed-horizontal')
            )
        );
}

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
