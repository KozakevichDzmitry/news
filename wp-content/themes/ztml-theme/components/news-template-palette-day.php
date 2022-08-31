<?php

require_once(COMPONENTS_PATH . 'news-template.php');

function render_template_palette_day()
{
?>
	<div class="tempalte-news-palette">
		<div class="row">
			<div class="attached-news">
				<img src="https://media.istockphoto.com/photos/taj-mahal-mausoleum-in-agra-picture-id1146517111?k=20&m=1146517111&s=612x612&w=0&h=vHWfu6TE0R5rG6DJkV42Jxr49aEsLN0ML-ihvtim8kk=" />
				<div class="attached-news__content">
					<div class="content-title">
						<p>
							Белоруска Анна Гуськова — о своем выступлении на Олимпиаде: «Сделала все от меня зависящее»
						</p>
					</div>
					<div class="content-info">
						<div class="info">
							<div class="content-exist">
								<?php render_camera_icon(); ?>
								<?php render_video_content_icon(); ?>
								<?php render_location_icon(); ?>
							</div>
							<div class="cat">
								<span>
									Палитра дня
								</span>
							</div>
						</div>
						<div class="time">
							<span>20:24</span>
							<span>27.12.2021</span>
						</div>
					</div>
				</div>
			</div>
			<div class="left">
				<?php render_news_template(); ?>
				<?php render_news_template(); ?>
			</div>
		</div>
		<div class="bottom">
			<div>
				<div class="content-info">
					<div class="info">
						<div class="content-exist">
							<?php render_camera_icon(); ?>
							<?php render_video_content_icon(); ?>
							<?php render_location_icon(); ?>
						</div>
						<div class="cat">
							<span>
								Палитра дня
							</span>
						</div>
					</div>
				</div>
				<div class="post-content">
					<p>В Беларуси введут новый формат сертификата о вакцинации против COVID-19 и единую систему привитых. Когда это случится? </p>
				</div>
				<div class="info">
					<div class="time">
						<span>20:24</span>
						<span>27.12.2021</span>
					</div>
                    <div class="share-block--fold">
                        <?php echo do_shortcode('[share_links]'); ?>
						<?php render_share_icon(); ?>
					</div>
				</div>
			</div>
			<div>
				<img src="https://media.istockphoto.com/photos/taj-mahal-mausoleum-in-agra-picture-id1146517111?k=20&m=1146517111&s=612x612&w=0&h=vHWfu6TE0R5rG6DJkV42Jxr49aEsLN0ML-ihvtim8kk=">
			</div>
		</div>
	</div>
<?php
}
