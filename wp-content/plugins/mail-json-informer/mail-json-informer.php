<?php
/*
Plugin Name: MAIL.RU Informer
Description: Creating a JSON file for mail.ru informer
Version: 1.0.0
Author: Nikita Kukshynsky
*/

/*  Copyright 2019  Nikita Kukshynsky

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
*/

class mail_json_informer
{
	function __construct()
	{
		add_option('mail1_title', '');
		add_option('mail1_url', '');
		add_option('mail2_title', '');
		add_option('mail2_url', '');
		add_option('mail3_title', '');
		add_option('mail3_url', '');
		add_option('mail4_title', '');
		add_option('mail4_url', '');
		
		if (function_exists ('add_shortcode') )
		{
			add_action('admin_menu',  array (&$this, 'admin') );
		}
	}
	
	function admin ()
	{
		if ( function_exists('add_options_page') ) 
		{
			add_options_page( 'Опции MAIL.RU ИНФОРМЕР', 'MAIL.RU ИНФОРМЕР', 8, basename(__FILE__), array (&$this, 'admin_form') );
		}
	}
	
	function admin_form()
	{
		$mail1_title = get_option('mail1_title');
		$mail1_url = get_option('mail1_url');
		$mail2_title = get_option('mail2_title');
		$mail2_url = get_option('mail2_url');
		$mail3_title = get_option('mail3_title');
		$mail3_url = get_option('mail3_url');
		$mail4_title = get_option('mail4_title');
		$mail4_url = get_option('mail4_url');
		
		if ( isset($_POST['submit']) ) 
		{	
		   if ( function_exists('current_user_can') && !current_user_can('manage_options') )
			  die ( _e('Hacker?', 'mail_json_informer') );
			
			if (function_exists ('check_admin_referer') )
			{
				check_admin_referer('mail_json_informer_form');
			}
			$dateformat = 'j F';
			$imgsize = 'td_324x235';

			$mail1_title = $_POST['mail1_title'];
			$mail1_url = $_POST['mail1_url'];
			$mail2_title = $_POST['mail2_title'];
			$mail2_url = $_POST['mail2_url'];
			$mail3_title = $_POST['mail3_title'];
			$mail3_url = $_POST['mail3_url'];
			$mail4_title = $_POST['mail4_title'];
			$mail4_url = $_POST['mail4_url'];

			$postid1 = url_to_postid( $mail1_url );
			$postid2 = url_to_postid( $mail2_url );
			$postid3 = url_to_postid( $mail3_url );
			$postid4 = url_to_postid( $mail4_url );

			$mail1_date = get_the_date( $dateformat, $postid1 );
			$mail1_img = get_the_post_thumbnail_url( $postid1, $imgsize );

			$mail2_date = get_the_date( $dateformat, $postid2 );
			$mail2_img = get_the_post_thumbnail_url( $postid2, $imgsize );

			$mail3_date = get_the_date( $dateformat, $postid3 );
			$mail4_date = get_the_date( $dateformat, $postid4 );

			$mailru = array(
				"logo" => "https://minsknews.by/logo_mail_ru.png",
				"news" => array(
				  array(
					"img_retina" => "$mail1_img",
					"title" => "$mail1_title",
					"datetime" => "$mail1_date",
					"url" => "$mail1_url"
				  ),
				  array(
					"img_retina" => "$mail2_img",
					"title" => "$mail2_title",
					"datetime" => "$mail2_date",
					"url" => "$mail2_url"
				  ),
				  array(
					"title" => "$mail3_title",
					"datetime" => "$mail3_date",
					"url" => "$mail3_url"
					),
				  array(
					"title" => "$mail4_title",
					"datetime" => "$mail4_date",
					"url" => "$mail4_url"
					)
				)
			  );

			  $fp = fopen(ABSPATH . "/mail-ru.json", 'w');
			  fwrite($fp, json_encode($mailru, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
			  fclose($fp);
			
			  update_option('mail1_title', $mail1_title);
			  update_option('mail1_url', $mail1_url);
			  update_option('mail2_title', $mail2_title);
			  update_option('mail2_url', $mail2_url);
			  update_option('mail3_title', $mail3_title);
			  update_option('mail3_url', $mail3_url);
			  update_option('mail4_title', $mail4_title);
			  update_option('mail4_url', $mail4_url);
  
		}
		?>
		<div class='wrap'>
			<h2><?php _e('Настройки MAIL.RU ИНФОРМЕР', 'mail_json_informer'); ?></h2>
			
			<form name="mail_json_informer" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=mail-json-informer.php&amp;updated=true">
			
				<!-- Имя mail_json_informer_form используется в check_admin_referer -->
				<?php 
					if (function_exists ('wp_nonce_field') )
					{
						wp_nonce_field('mail_json_informer_form'); 
					}
				?>
				
				<table class="form-table">	
				<tr valign="top" >					
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Новость 1 (с картинкой)', ''); ?></th>
						
					</tr>				
					<tr valign="top">

						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Заголовок новости (максимум 75 с пробелами):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail1_title" size="100" value="<?php echo $mail1_title; ?>" maxlength="75" required />
						</td>
					</tr>
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Ссылка URL (копируется из вкладки в браузере):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail1_url" size="100" value="<?php echo $mail1_url; ?>" />
						</td>
					</tr>
					
					<tr valign="top" >					
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Новость 2 (с картинкой)', ''); ?></th>
						
					</tr>				
					<tr valign="top">

						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Заголовок новости (максимум 75 с пробелами):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail2_title" size="100" value="<?php echo $mail2_title; ?>" maxlength="75" required />
						</td>
					</tr>
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Ссылка URL (копируется из вкладки в браузере):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail2_url" size="100" value="<?php echo $mail2_url; ?>" />
						</td>
					</tr>

					<tr valign="top" >					
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Новость 3', ''); ?></th>
						
					</tr>				
					<tr valign="top">

						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Заголовок новости (максимум 75 с пробелами):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail3_title" size="100" value="<?php echo $mail3_title; ?>" maxlength="75" required />
						</td>
					</tr>
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Ссылка URL (копируется из вкладки в браузере):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail3_url" size="100" value="<?php echo $mail3_url; ?>" />
						</td>
					</tr>

					<tr valign="top" >					
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Новость 4', ''); ?></th>
						
					</tr>				
					<tr valign="top">

						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Заголовок новости (максимум 75 с пробелами):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail4_title" size="100" value="<?php echo $mail4_title; ?>" maxlength="75" required />
						</td>
					</tr>
						<th scope="row" style="padding: 20px 10px 5px 0px; width: 350px"><?php _e('Ссылка URL (копируется из вкладки в браузере):', ''); ?></th>
						
						<td style="padding: 15px 0px">
							<input type="text" name="mail4_url" size="100" value="<?php echo $mail4_url; ?>" />
						</td>
					</tr>
				</table>
				
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="mail1_title,mail1_url,mail2_title,mail2_url,mail3_title,mail3_url,mail4_title,mail4_url" />
		
				<p class="submit">
				<input type="submit" name="submit" value="<?php _e('Save Changes') ?>" />
				</p>
			</form>
		</div>
		<?php
	}
}

$mail_json_informer = new mail_json_informer();

?>