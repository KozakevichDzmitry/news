<?php

function render_twitter_share_icon()
{
	ob_start();
	$html = ob_start();
?>
	<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
		<rect width="30" height="30" fill="#F2F2F2" />
		<g filter="url(#filter0_d_92_17156)">
			<path d="M25 8.89789C24.2645 9.21861 23.4744 9.43531 22.6438 9.53326C23.5008 9.0286 24.142 8.23432 24.4477 7.29863C23.6425 7.7693 22.7612 8.1006 21.8422 8.27812C21.2242 7.62877 20.4057 7.19836 19.5136 7.05374C18.6216 6.90911 17.706 7.05834 16.909 7.47828C16.1119 7.89821 15.4781 8.56535 15.1058 9.37611C14.7336 10.1869 14.6437 11.0959 14.8503 11.9621C13.2187 11.8814 11.6226 11.4641 10.1655 10.7372C8.70847 10.0102 7.42301 8.98991 6.39258 7.74244C6.04025 8.34053 5.83766 9.03398 5.83766 9.7725C5.83727 10.4373 6.00364 11.092 6.32201 11.6784C6.64038 12.2648 7.10091 12.7648 7.66273 13.134C7.01117 13.1136 6.37397 12.9403 5.80419 12.6286V12.6806C5.80413 13.6131 6.13189 14.5169 6.73186 15.2386C7.33184 15.9603 8.16707 16.4555 9.09583 16.6402C8.4914 16.8012 7.85769 16.8249 7.24258 16.7096C7.50462 17.5119 8.01506 18.2135 8.70243 18.7162C9.3898 19.2188 10.2197 19.4974 11.0759 19.5128C9.62242 20.6357 7.82735 21.2448 5.97948 21.2421C5.65215 21.2422 5.32509 21.2234 5 21.1858C6.87569 22.3726 9.05914 23.0024 11.2891 23C18.8378 23 22.9644 16.8474 22.9644 11.5113C22.9644 11.338 22.96 11.1629 22.9521 10.9895C23.7548 10.4183 24.4476 9.71087 24.9982 8.90049L25 8.89789Z" fill="#3FA6DA" />
		</g>
		<defs>
			<filter id="filter0_d_92_17156" x="1" y="7" width="28" height="24" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
				<feFlood flood-opacity="0" result="BackgroundImageFix" />
				<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
				<feOffset dy="4" />
				<feGaussianBlur stdDeviation="2" />
				<feComposite in2="hardAlpha" operator="out" />
				<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
				<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_92_17156" />
				<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_92_17156" result="shape" />
			</filter>
		</defs>
	</svg>
<?php
	$html = ob_get_clean();
	ob_end_flush();

	return $html;
}
