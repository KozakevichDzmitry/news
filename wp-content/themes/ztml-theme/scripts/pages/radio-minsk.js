jQuery(document).ready(function ($) {
	$("#programs .programs-list .card-list").slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true,
				},
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	$("#team .team-list .card-list").slick({
		arrows: true,
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: "60px",
		adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true,
				},
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});
});

jQuery(document).ready(function ($) {
	const erp = $("#radio-min-player");

	if (erp) {
		const playerState = {
			isPaused: true,
			isLoaded: false,
			audioSrc: erp.find("#radio_minsk")[0],
		};

		playerState.audioSrc.addEventListener(
			"canplaythrough",
			() => {
				playerState.isLoaded = true;

				if (playerState.isLoaded) {
					erp.click(() => {
						if (playerState.isPaused) {
							playerState.audioSrc.play();
							playerState.isPaused = false;
						} else {
							playerState.audioSrc.pause();
							playerState.isPaused = true;
						}
					});
				}
			},
			false
		);
	}
});
