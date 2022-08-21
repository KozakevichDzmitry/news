<?php

define("PGDEBUG", 1);

function linuxFilename($file)
{
	return preg_replace("/ |'|\(|\)/", '\\\${0}', $file);
}

function get_template_tv_programs()
{
	return array(
		array(
			'name' => 'belarus1',
			'title' => 'Беларусь 1',
			'img' => 'bt1.png'
		),
		array(
			'name' => 'ont',
			'title' => 'ОНТ',
			'img' => 'ont.png'
		),
		array(
			'name' => 'ctv',
			'title' => 'СТВ',
			'img' => 'ctv.png'
		),
		array(
			'name' => 'mir',
			'title' => 'Мир',
			'img' => 'mirtv.png'
		),
		array(
			'name' => 'rtr-bel',
			'title' => 'РТР-Беларусь',
			'img' => 'rtr-bel.png'
		),
		array(
			'name' => 'ntv-bel',
			'title' => 'НТВ-Беларусь',
			'img' => 'ntv-bel.png'
		),

		array(
			'name' => 'bt2',
			'title' => 'Беларусь 2',
			'img' => 'bt2.png'
		),
		array(
			'name' => 'bt3',
			'title' => 'Беларусь 3',
			'img' => 'bt3.png'
		),
		array(
			'name' => 'bt5',
			'title' => 'Беларусь 5',
			'img' => 'bt5.png'
		),
		array(
			'name' => 'kinopremiere',
			'title' => 'Кинопремьера',
			'img' => 'kinopremiere.png'
		),
		array(
			'name' => 'belbizch',
			'title' => 'ББЧ',
			'img' => 'bbk_logo.png'
		),
		array(
			'name' => 'karusel',
			'title' => 'Карусель INT',
			'img' => 'karusel.png'
		),
		array(
			'name' => 'culture',
			'title' => 'Россия-Культура',
			'img' => 'culture.png'
		),
		array(
			'name' => 'tv3',
			'title' => 'ТВ3',
			'img' => 'tv3.png'
		),
		array(
			'name' => 'setanta-sport-plus',
			'title' => 'Сетанта Спорт 2',
			'img' => 'setanta-sport-plus.png'
		),
		array(
			'name' => 'perec',
			'title' => 'Перец I',
			'img' => 'perec.png'
		),
		array(
			'name' => '5_kanal',
			'title' => '5 канал',
			'img' => '5_kanal.png'
		),
		array(
			'name' => 'visat-nature',
			'title' => 'Viasat Nature',
			'img' => 'visat-nature.png'
		),
		array(
			'name' => 'vtv',
			'title' => 'ВТВ',
			'img' => 'vtv.png'
		),
		array(
			'name' => 'tv100ruskino',
			'title' => 'TV 1000 Русское кино',
			'img' => 'tv100ruskino.png'
		),
		array(
			'name' => 'travelplusadventure',
			'title' => 'Travel + Adventure',
			'img' => 'travelplusadventure.png'
		),
		array(
			'name' => 'tv1000',
			'title' => 'TV 1000',
			'img' => 'tv1000.png'
		),
		array(
			'name' => 'kinosemja',
			'title' => 'Киносемья',
			'img' => 'kinosemja.png'
		),
		array(
			'name' => 'kinosvidanije',
			'title' => 'Киносвидание',
			'img' => 'kinosvidanije.png'
		),
		array(
			'name' => 'mirseriala',
			'title' => 'Сериалы',
			'img' => 'mirseriala.png'
		),
		array(
			'name' => 'zhivotnye',
			'title' => 'Домашние животные',
			'img' => 'zhivotnye.png'
		),
		array(
			'name' => 'tntint',
			'title' => 'ТНТ Int',
			'img' => 'tnt-belarus.png'
		),
		array(
			'name' => 'shansontv',
			'title' => 'Шансон ТВ',
			'img' => 'shansontv.png'
		),
		array(
			'name' => 'muzskoekino',
			'title' => 'Мужское кино',
			'img' => 'muzskoekino.png'
		),
		array(
			'name' => 'sonychannel',
			'title' => 'Sony Channel',
			'img' => 'sonychannel.png'
		),
		array(
			'name' => 'paramauntcomedy',
			'title' => 'Paramount Comedy',
			'img' => 'paramauntcomedy.png'
		),
		array(
			'name' => 'nickelodeon',
			'title' => 'Nickelodeon',
			'img' => 'nickelodeon.png'
		),
		array(
			'name' => 'ohotnik_i_ribolov',
			'title' => 'Охотник и рыболов HD',
			'img' => 'ohotnik_i_ribolov.png'
		),
		array(
			'name' => 'europa_plus_tv',
			'title' => 'Europa Plus TV',
			'img' => 'europe_plus.png'
		),
		array(
			'name' => 'ECTV',
			'title' => 'English Club TV',
			'img' => 'ECTV.png'
		),
		array(
			'name' => 'ysadbatv',
			'title' => 'Усадьба ТВ',
			'img' => 'ysadbatv.png'
		),
		array(
			'name' => 'edapremium',
			'title' => 'ЕДА Премиум',
			'img' => 'edapremium.png'
		),
		array(
			'name' => 'Fashion-One',
			'title' => 'Fashion One',
			'img' => 'Fashion-One.png'
		),
		array(
			'name' => 'tourist',
			'title' => 'Глазами туриста',
			'img' => 'tourist.png'
		),
		array(
			'name' => 'PlusTV',
			'title' => '+TV',
			'img' => 'PlusTV.png'
		),
		array(
			'name' => 'nick_jr',
			'title' => 'Nick Jr. Global',
			'img' => 'nick_jr.png'
		),
		array(
			'name' => 'viasatexplore',
			'title' => 'Viasat Explorer',
			'img' => 'viasatexplore.png'
		),
		array(
			'name' => 'viasathistory',
			'title' => 'Viasat History',
			'img' => 'viasathistory.png'
		),
		array(
			'name' => 'viasathistoryrussia',
			'title' => 'History Russia',
			'img' => 'viasathistory.png'
		),
		array(
			'name' => 'tv1000action',
			'title' => 'TV1000 Action',
			'img' => 'TV1000_Action.png'
		),
		array(
			'name' => 'black',
			'title' => 'Black',
			'img' => 'black_logo.png'
		),
		array(
			'name' => 'illusion',
			'title' => 'Русский иллюзион',
			'img' => 'illusion.png'
		),
		array(
			'name' => 'kinocomedy',
			'title' => 'Кинокомедия',
			'img' => 'kinocomedy.png'
		),
		array(
			'name' => 'sci',
			'title' => 'SONY Sci-Fi',
			'img' => 'scifi_logo.png'
		),
		array(
			'name' => 'history2',
			'title' => 'History 2',
			'img' => 'history2.png'
		),
		array(
			'name' => 'setanta_spotrs',
			'title' => 'Сетанта Спорт 1',
			'img' => 'setanta_spotrs.png'
		),
		array(
			'name' => 'MMA_TV_com',
			'title' => 'MMA-TV.com',
			'img' => 'MMA-TV.com.png'
		),
		array(
			'name' => 'belros',
			'title' => 'БелРос',
			'img' => 'belros.png'
		),
		array(
			'name' => 'nano_hd',
			'title' => 'Nano HD',
			'img' => 'nano_hd.png'
		),
		array(
			'name' => 'dom-kino',
			'title' => 'Дом кино',
			'img' => 'dom-kino.png'
		),
		array(
			'name' => 'tnt-music',
			'title' => 'ТНТ Music',
			'img' => 'tnt-music.png'
		),
		array(
			'name' => 'domashniu',
			'title' => 'Домашний I',
			'img' => 'domashniu.png'
		),
		array(
			'name' => 'minsktv',
			'title' => 'ЯСНАе ТВ',
			'img' => 'minsktv.png'
		),
		array(
			'name' => 'autoplus',
			'title' => 'Авто Плюс',
			'img' => 'autoplus.png'
		),

	);
}

function replace_extension($filename, $new_extension)
{
	$info = pathinfo($filename);
	return $info['filename'] . '.' . $new_extension;
}

function get_title_and_times($str)
{
	$data = array(
		'title' => null,
		'times_string' => null
	);

	$values = array();
	preg_match('/(\d{1,2}.\d{1,2}, +|\d{1,2}.\d{1,2}+)+/', $str, $values);
	$title = trim(preg_replace('/(\d{1,2}.\d{1,2}, +|\d{1,2}.\d{1,2}+)+/', "", $str));

	$data['title'] = $title;

	if (empty($values[0])) {
		$data['times_string'] = "";
	} else {
		$data['times_string'] = $values[0];
	}

	return $data;
}

function parse_tv_programm_file($url_path)
{
	$zip = new ZipArchive();
	$zip->open($url_path);

	$zip->extractTo(__DIR__ . '/tmp/');
	$entries = $zip->count();

	for ($i = 0; $i < $entries; $i++) {
		$stat = $zip->statIndex($i);
		$fileContent = null;

		if (PGDEBUG) {
			$str = file_get_contents(__DIR__ . '/tmp/' . $stat['name']);
		}


		if (!PGDEBUG) {
			exec('/usr/bin/docx2txt < ' . linuxFilename(__DIR__ . '/tmp/' . $stat['name']), $fileContent);

			if ($fileContent === NULL || !is_array($fileContent)) return;

			array_shift($fileContent);

			$programms = array();

			$channelsList = get_template_tv_programs();

			foreach ($channelsList as $channel) {
				$channelTitleIndex = array_search($channel['title'], $fileContent);

				if ($channelTitleIndex !== false) {
					array_push($programms, array(
						'start_from' => $channelTitleIndex + 1,
						'title' => $channel['title'],
						'name' => $channel['name'],
						'img' => $channel['img'],
						'programms' => array()
					));
				}
			}

			$length = count($programms) - 1;

			for ($x = 0; $x < $length; $x++) {
				$sliced = array_slice($fileContent, $programms[$x]['start_from'], ($programms[$x + 1]['start_from'] - 1) - $programms[$x]['start_from']);

				foreach ($sliced as $line) {
					$prog = get_title_and_times($line);
					array_push($programms[$x]['programms'], $prog);
				}
			}
		}

		$fh = fopen(__DIR__ . '/output/' . replace_extension(sanitize_file_name(mb_strtolower($stat['name'])), 'json'), 'w');

		if (!PGDEBUG) {
			$json = json_encode($programms, JSON_UNESCAPED_UNICODE);
			fwrite($fh, $json, strlen($json));
		} else {
			fwrite($fh, $str, strlen($str));
		}


		fclose($fh);
	}

	$zip->close();
}

function get_day_list($file_name_date)
{
	$f_path = __DIR__ . '/output/' . $file_name_date . '.json';

	$fh = fopen($f_path, 'r');
	$content = json_decode(fread($fh, filesize($f_path)));
	fclose($fh);

	return $content;
}
