const targetEl = $(e.target);
const isPlayButton = $(
	targetEl.closest(".player-controls__play-btn")[0]
).hasClass("player-controls__play-btn");
const isVolumeEl = $(
	targetEl.closest(".player-controls__volume")[0]
).hasClass("player-controls__volume");

const isTrackBarEl = $(
	targetEl.closest(".mn-player__track-bar")[0]
).hasClass("mn-player__track-bar");

if (!isPlayButton && !isVolumeEl && !isTrackBarEl) return;

const currentPlayer = targetEl.closest(".mn-player");

if (currentPlayer[0] != prevPlayer.element) {
	prevPlayer.element = currentPlayer[0];
	console.log("Inited new player");
	if (prevPlayer.audioTrackInterval) {
		clearInterval(prevPlayer.audioTrackInterval);
	}
} else {
	console.log("Use old player");
}

prevPlayer.controls.audio = $(prevPlayer.element).find("#audio")[0];
prevPlayer.controls.time = $(prevPlayer.element).find("#time")[0];
const t0 = getTime(prevPlayer.controls.audio.duration);
prevPlayer.controls.time.textContent = `00:00 \u2014 ${
	t0.minutes || "00"
}:${t0.seconds || "00"}`;
prevPlayer.controls.trackBar = $(prevPlayer.element).find("#trackBar")[0];
prevPlayer.controls.volume = $(prevPlayer.element).find("#volume")[0];

// const audioSrcEl = targetEl.closest(".mn-player").find("audio");

if (isPlayButton) {
	prevPlayer.controls.audio.play();
	prevPlayer.audioTrackInterval = setInterval(() => {
		const t1 = getTime(prevPlayer.controls.audio.currentTime);
		prevPlayer.controls.time.textContent = `${t1.minutes}:${t1.seconds} - ${
			t0.minutes || "00"
		}:${t0.seconds || "00"}`;
		prevPlayer.controls.trackBar.value = Math.floor(
			(prevPlayer.controls.audio.currentTime /
				prevPlayer.controls.audio.duration) *
				100
		);
		handleInputChangeEl(prevPlayer.controls.trackBar);
	}, 1000);
	console.log("isPlayButton");
}

if (isVolumeEl) {
	console.log("isVolumeEl");
	handleInputChangeEl(prevPlayer.controls.trackBar);
}

if (isTrackBarEl) {
	console.log("isTrackBarEl");
}