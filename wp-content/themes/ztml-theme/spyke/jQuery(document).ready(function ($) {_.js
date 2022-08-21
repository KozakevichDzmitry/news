jQuery(document).ready(function ($) {
	$(".category-select-slider .slider-container").slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		variableWidth: true,
	});
});

jQuery(document).ready(function ($) {
	const loadBtnEl = $(".main-content .load-moree-btn");
	const list = $(".main-content .ta-list");

	let show_count = 27;
	let load_count = 6;

	loadBtnEl.on("click", () => {
		loadBtnEl.find("button").text("Загрузка...");

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: "post",
			data: {
				action: "load_more_news",
				type: "post",
				show: show_count,
				load: load_count,
			},
			success: function (html) {
				list.append(html);
				loadBtnEl.find("button").text("Показать ещё");
			},
		});
	});
});
