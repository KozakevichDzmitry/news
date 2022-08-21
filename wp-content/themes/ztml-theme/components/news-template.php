<?php

function render_news_template()
{
?>
	<div class="news-template">
		<div class="news-template__header">
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
		<div class="news-template__title">
			Диалоговая площадка «На пути к референдуму» прошла в Белорусской государственной академии авиации
		</div>
		<div class="news-template__info">
			<div class="left-info">
				<div class="time">
					<span>
						20:24
					</span>
					<span>
						27.12.2021
					</span>
				</div>
				<div>
					<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.41667 4.58333H3.75V2.91667H5.41667C5.63768 2.91667 5.84964 3.00446 6.00592 3.16074C6.1622 3.31702 6.25 3.52899 6.25 3.75C6.25 3.97101 6.1622 4.18298 6.00592 4.33926C5.84964 4.49554 5.63768 4.58333 5.41667 4.58333Z" fill="#D91E23" />
						<path fill-rule="evenodd" clip-rule="evenodd" d="M10 0H0V10H10V0ZM3.33333 2.08333C3.22283 2.08333 3.11685 2.12723 3.03871 2.20537C2.96057 2.28351 2.91667 2.38949 2.91667 2.5V7.5C2.91667 7.61051 2.96057 7.71649 3.03871 7.79463C3.11685 7.87277 3.22283 7.91667 3.33333 7.91667C3.44384 7.91667 3.54982 7.87277 3.62796 7.79463C3.7061 7.71649 3.75 7.61051 3.75 7.5V5.41667H5.41667C5.85869 5.41667 6.28262 5.24107 6.59518 4.92851C6.90774 4.61595 7.08333 4.19203 7.08333 3.75C7.08333 3.30797 6.90774 2.88405 6.59518 2.57149C6.28262 2.25893 5.85869 2.08333 5.41667 2.08333H3.33333Z" fill="#D91E23" />
					</svg>
				</div>
			</div>
			<div class="share-link">
				<svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.33333 0L8.23667 1.00714L9.33333 2.02143L11.0211 3.57143H3.88889C1.74222 3.57143 0 5.17143 0 7.14286V10H1.55556V7.14286C1.55556 5.96429 2.60556 5 3.88889 5H11.0211L8.23667 7.55714L9.33333 8.57143L14 4.28571L9.33333 0Z" fill="#D91E23" fill-opacity="0.6" />
				</svg>
			</div>
		</div>
	</div>
<?php
}
