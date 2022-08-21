<?php

function extrenal_radio_player()
{
?>
	<div class="erp-scn box">
		<div class="erp-scn__title">
			<span>Прямой эфир</span>
		</div>
		<div class="erp-scn__player-container">
			<div class="erp-scn__player" style="background: url(<?php echo get_template_directory_uri() . '/assets/images/ext-player.png'; ?>);"></div>
			<button class="erp-scn__player-btn">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 40C8.955 40 0 31.045 0 20C0 8.955 8.955 0 20 0C31.045 0 40 8.955 40 20C40 31.045 31.045 40 20 40ZM15 10.015V29.985L30 20L15 10.015Z" fill="url(#paint0_linear_1179_29786)" />
					<defs>
						<linearGradient id="paint0_linear_1179_29786" x1="20" y1="0" x2="20" y2="35" gradientUnits="userSpaceOnUse">
							<stop stop-color="#FDFDFD" />
							<stop offset="1" stop-color="#C7C7C7" />
						</linearGradient>
					</defs>
				</svg>
			</button>
		</div>
		<audio id="radio_minsk" preload="false">
			<source src="https://radio.mk.by:8443/mk128" type="audio/mpeg">
		</audio>
	</div>
<?php
}

add_shortcode("extrenal_radio_player_scn", "extrenal_radio_player");
