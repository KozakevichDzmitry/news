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
</footer>

<?php wp_footer(); ?>

</body>

</html>