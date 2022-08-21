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
