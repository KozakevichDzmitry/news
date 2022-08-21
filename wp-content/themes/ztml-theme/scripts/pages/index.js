jQuery(document).ready(function ($) {
	$.datepicker.setDefaults($.datepicker.regional.ru);

	let lastPost = document.querySelector(
		".long-news-list .timeline-main .news-template-line:last-child"
	);

	$(lastPost).addClass("eof");

	let last_date = null;

	const resetCalendar = $(".datepicker-toggle .datepicker-reset-button");

	const dataRequest = {
		action: "main_timline_tape_load",
		load: 10,
		offset: 10,
	};

	const observer = new IntersectionObserver(
		([entry]) => {
			if (entry.isIntersecting) {
				ajaxRequest(last_date ? { date: last_date } : {}, (data) => {
					$(
						".long-news-list .timeline-main .news-template-line:last-child"
					).removeClass("eof");

					if (data) {
						updatePosts(observer, data);
					}
				});
			}
		},
		{
			root: null,
			rootMargin: "10px",
			threshold: 0.1,
		}
	);

	resetCalendar.on("click", () => {
		last_date = null;

		dataRequest.offset = 0;
		document
			.querySelector(".long-news-list .timeline-main")
			.scrollTo({ top: 0, behavior: "smooth" });

		ajaxRequest({ date: null }, (data) => {
			resetCalendar.hide();
			$(".long-news-list .timeline-main").empty();

			if (data) {
				updatePosts(observer, data);
			}
		});
	});

	const ajaxRequest = (args, cb) =>
		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: { ...dataRequest, ...args },
			type: "POST",
			success: (data) => cb(data),
		});

	$("#datepicker-all-news").datepicker({
		showOn: "both",
		changeYear: true,
		dateFormat: "yy-mm-dd",
		minDate: $("#datepicker-all-news").data("min-date"),
		maxDate: $("#datepicker-all-news").data("max-date"),

		onSelect: (date) => {
			last_date = date;
			dataRequest.offset = 0;
			document
				.querySelector(".long-news-list .timeline-main")
				.scrollTo({ top: 0, behavior: "smooth" });

			ajaxRequest(
				{
					date,
				},
				(data) => {
					resetCalendar.show();

					$(".long-news-list .timeline-main").empty();

					if (data) {
						updatePosts(observer, data);
					}
				}
			);
		},
	});

	const updatePosts = (observer, posts) => {
		const dataEls = $(posts);

		$(dataEls[dataEls.length - 1]).addClass("eof");

		$(".long-news-list .timeline-main").append(dataEls);

		observer.unobserve(lastPost);

		lastPost = document.querySelector(
			".long-news-list .timeline-main .news-template-line.eof"
		);

		console.log(lastPost);

		observer.observe(lastPost);

		dataRequest.offset += dataRequest.load;
	};

	observer.observe(lastPost);
});

jQuery(document).ready(function ($) {
	new Swiper(".swiper-container.two", {
		pagination: false,
		paginationClickable: true,
		effect: "coverflow",
		autoHeight: false,
		loop: true,
		centeredSlides: true,
		slidesPerView: "auto",
		coverflow: {
			rotate: 0,
			stretch: 100,
			depth: 0,
			modifier: 1.5,
			slideShadows: false,
		},
	});
});

jQuery(document).ready(function ($) {
	const districtPreviewEl = $(".district-preview");
	const districtEls = districtPreviewEl.find(".district-item");

	function alignHeightDistricts($) {
		let maxH = 0;
		$(".district-preview>.district-item").each(function () {
			if ($(this).height() > maxH) {
				maxH = $(this).height();
			}
		});

		$(".district-preview>.district-item").each(function () {
			$(this).height(maxH);
		});
	}

	districtPreviewEl.click((e) => {
		if ($(e.target).hasClass("district-item")) {
			districtEls.each((idx, item) => $(item).removeClass("active"));
			$(e.target).addClass("active");
		}
	});

	alignHeightDistricts($);
});
