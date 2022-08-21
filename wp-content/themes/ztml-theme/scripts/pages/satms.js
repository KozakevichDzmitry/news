jQuery(document).ready(function ($) {
	const loadMoreeBtn = $(".satms .satms__moree-btn button");

	if (!loadMoreeBtn) return;

	loadMoreeBtn.click(function () {
		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: "post",
			data: {
				action: "satms_load",
				type: "post",
				query_vars: "satm",
			},
			success: function (html) {
				console.log(html);
				$(".satms .cards-list").append(html);
			},
		});
	});
});
