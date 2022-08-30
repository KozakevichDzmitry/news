const OPEN_SEARCH_EVENT = "OPEN_SEARCH_EVENT";
const CLOSE_SEARCH_EVENT = "CLOSE_SEARCH_EVENT";

jQuery(document).ready(function ($) {
	const btnClose = $("#searchBtnClose");
	const btnOpen = $("#search-btn");
	const searchBar = $("#search-bar");

	const openCloseSearch = (evt) => {
		if (CLOSE_SEARCH_EVENT === evt) {
			searchBar.removeClass("active");
		} else if (OPEN_SEARCH_EVENT === evt) {
			searchBar.addClass("active");
		}
	};

	btnOpen.on("click", () => {
		console.log(OPEN_SEARCH_EVENT);
		openCloseSearch(OPEN_SEARCH_EVENT);
	});

	btnClose.on("click", () => {
		openCloseSearch(CLOSE_SEARCH_EVENT);
	});
});
