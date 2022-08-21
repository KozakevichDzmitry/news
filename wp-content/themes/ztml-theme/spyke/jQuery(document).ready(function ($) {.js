jQuery(document).ready(function ($) {
	var radioOnline = "radioOnline";
	var isPlayRadio = window.localStorage.getItem(radioOnline);
	if (!isPlayRadio) {
		isPlayRadio = "false";
		window.localStorage.setItem(radioOnline, isPlayRadio);
	}
	if (isPlayRadio == "true") {
		var audio = document.getElementById("radio_minsk");
		audio.load();
		audio.play();
		$(".radio_btn").addClass("active");
	}
	$(".radio_btn").click(function () {
		var audio = document.getElementById("radio_minsk");
		if (window.localStorage.getItem(radioOnline) == "false") {
			audio.load();
			audio.play();
			window.localStorage.setItem(radioOnline, "true");
			$(".radio_btn").addClass("active");
		} else {
			audio.pause();
			window.localStorage.setItem(radioOnline, "false");
			$(".radio_btn").removeClass("active");
		}
	});
});
