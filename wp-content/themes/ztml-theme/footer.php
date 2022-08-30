<?php require_once(COMPONENTS_PATH . "icons/logo-large-icon.php"); ?>
<?php require_once(COMPONENTS_PATH . "icons/logo-smi-icon.php"); ?>

<?php require_once(COMPONENTS_PATH . "timeline.php"); ?>

<footer class="footer">
	<div class="container">
		<div class="footer__content">
			<div>
				<aside class="footer__logo">
					<?php render_logo_large_icon(); ?>
				</aside>
				<aside>
					<div class="footer__privacy">
						<a href="/usloviya-ispolzovaniya-materialov/">
							Условия использования материалов<br>
							УП «Агентство «Минск-Новости»
						</a>
					</div>
				</aside>
			</div>
			<div>
				<aside>
					<h4 class="footer__title">
						<span>Навигация</span>
					</h4>
					<?php render_footer_nav(); ?>
				</aside>
			</div>
			<div>
				<aside>
					<h4 class="footer__title">
						<span>Реклама</span>
					</h4>
					<p class="footer__advertising">
						Расскажи о себе и своём бизносе,<br />
						с помощью нашего медиахолдинга<br />
						УП «Агентство «Минск-Новости»!
					</p>
					<a href="#" class="footer__advertising-btn">Разместить рекламу</a>
				</aside>
			</div>
			<div>
				<aside>
					<h4 class="footer__title">
						<span>Наши Сми</span>
					</h4>
				</aside>
				<aside>
					<?php render_logo_smi_icon(); ?>
				</aside>
			</div>
		</div>
	</div>
	<?php render_timeline(); ?>
	<div class="secondary-mobile">
		<div class="secondary-mobile-btn">
			<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4.33333 13L1 7L4.33333 1M9 13L5.66667 7L9 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
