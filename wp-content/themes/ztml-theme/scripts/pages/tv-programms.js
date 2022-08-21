jQuery(document).ready(function ($) {
	const daySelectList = $(".day-select-list");

	const selectDayProgramme = (index) => {
		const list = $(".tv-day-programme");

		list.each(function (idx, item) {
			if (idx === index) {
				$(item).show();
			} else {
				$(item).hide();
			}
		});
	};

	daySelectList.find("button").each(function (idx, btn) {
		if ($(btn).hasClass("selected")) {
			selectDayProgramme(idx);
		}
	});

	daySelectList.click(function (e) {
		if ($(e.target).is("button")) {
			daySelectList.find("button").each(function (idx, btn) {
				if (btn === e.target) {
					$(btn).addClass("selected");
					$(btn).removeClass("no-selected");
					selectDayProgramme(idx);
				} else {
					$(btn).addClass("no-selected");
					$(btn).removeClass("selected");
				}
			});
		}
	});

	$(".day-select-list").slick({
		dots: true,
		prevArrow: false,
		nextArrow: false,
		infinite: false,
		speed: 300,
		mobileFirst: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 767,
				settings: "unslick",
			},
			{
				breakpoint: 670,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
				},
			},
		],
	});

	const selectChannelMenu = $(".select-channel .channels-list");

	selectChannelMenu.click(function (e) {
		if ($(e.target)[0].tagName == "LI") {
			const selected = $(e.target).text().trim().toLowerCase();

			const progs = $(".tv-day-programme:visible .tv-programm-item.acc-item");

			progs.each(function (_, item) {
				const pg = $(item)
					.find(".channel__title span")
					.text()
					.trim()
					.toLowerCase();
				if (pg === selected) {
					$(this).find(".acc-btn").click();
				}
			});
		}
	});
});
