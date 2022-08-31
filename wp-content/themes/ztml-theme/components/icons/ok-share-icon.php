<?php

function render_ok_share_icon()
{
	ob_start();
	$html = ob_start();
?>
	<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
		<rect width="30" height="30" fill="#F2F2F2" />
		<g filter="url(#filter0_d_92_17153)">
			<path d="M14.9857 15.3411C12.0504 15.3411 9.61075 12.9951 9.61075 10.2191C9.61075 7.34703 12.0504 5 14.9867 5C18.0227 5 20.3616 7.34603 20.3616 10.2191C20.3564 11.5821 19.789 12.8874 18.7843 13.8481C17.7795 14.8087 16.4196 15.3461 15.0033 15.3421L14.9857 15.3411ZM14.9857 8.01704C13.743 8.01704 12.7975 9.02205 12.7975 10.2201C12.7975 11.4161 13.743 12.3261 14.9867 12.3261C16.2803 12.3261 17.1759 11.4161 17.1759 10.2201C17.177 9.02105 16.2803 8.01704 14.9857 8.01704ZM17.1261 19.6032L20.1631 22.4282C20.7606 23.0492 20.7606 23.9592 20.1631 24.5342C19.5169 25.1553 18.5204 25.1553 18.0227 24.5342L14.9867 21.6612L12.0504 24.5342C11.7522 24.8212 11.3532 24.9643 10.9043 24.9643C10.5563 24.9643 10.1583 24.8202 9.8092 24.5342C9.21176 23.9592 9.21176 23.0492 9.8092 22.4272L12.8951 19.6022C11.7807 19.2846 10.7116 18.8348 9.71257 18.2632C8.96551 17.8802 8.81693 16.9232 9.21488 16.2041C9.71257 15.4861 10.6082 15.2951 11.4052 15.7741C12.4843 16.408 13.724 16.7433 14.9883 16.7433C16.2525 16.7433 17.4922 16.408 18.5713 15.7741C19.3683 15.2951 20.3128 15.4861 20.7606 16.2041C21.2094 16.9232 21.0089 17.8792 20.3117 18.2632C19.3672 18.8382 18.2721 19.2692 17.1271 19.6042L17.1261 19.6032Z" fill="#EF8E1D" />
		</g>
		<defs>
			<filter id="filter0_d_92_17153" x="5" y="5" width="20" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
				<feFlood flood-opacity="0" result="BackgroundImageFix" />
				<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
				<feOffset dy="4" />
				<feGaussianBlur stdDeviation="2" />
				<feComposite in2="hardAlpha" operator="out" />
				<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
				<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_92_17153" />
				<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_92_17153" result="shape" />
			</filter>
		</defs>
	</svg>
<?php
	$html = ob_get_clean();
	ob_end_flush();

	return $html;
}
