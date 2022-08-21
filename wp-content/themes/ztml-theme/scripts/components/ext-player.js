jQuery(document).ready(function ($) {
	const erp = $(".erp-scn");

	if (erp) {
		const playerState = {
			isPaused: true,
			isLoaded: false,
			audioSrc: erp.find("#radio_minsk")[0],
		};

		playerState.audioSrc.addEventListener(
			"canplaythrough",
			() => {
				console.log("Audio ready");
				playerState.isLoaded = true;

				if (playerState.isLoaded) {
					erp.find(".erp-scn__player-btn").click(() => {
						if (playerState.isPaused) {
							console.log("click to play");
							playerState.audioSrc.play();
							playerState.isPaused = false;
						} else {
							playerState.audioSrc.pause();
							console.log("click to pause");
							playerState.isPaused = true;
						}
					});
				}
			},
			false
		);
	}
});
