jQuery(document).ready(function ($) {
	const accardionListItems = $(".price-list");

	accardionListItems.on("click", (e) => {
		accardionListItems.find(".acc-item").each((_, item) => {
			console.log();
			if (!$(item).is($(e.target).closest(".acc-item"))) {
				const container = $(item);
				container.find(".acc-content").hide();
				container.find(".acc-btn").removeClass("active");
			}
		});

		const container = $(e.target).closest(".acc-item");

		console.log(container.find(".acc-btn").attr("class"));

		if (container.find(".acc-btn").hasClass("active")) {
			container.find(".acc-content").hide();
			container.find(".acc-btn").removeClass("active");
		} else {
			container.find(".acc-content").show();
			container.find(".acc-btn").addClass("active");
		}
	});
});
