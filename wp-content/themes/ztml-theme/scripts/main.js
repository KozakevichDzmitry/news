jQuery(document).ready(function ($) {
	$(window).scroll(function () {
		var sticky = $("#header-stiky"),
			scroll = $(window).scrollTop();

		console.log(scroll, $("#header-stiky").height() + 300);

		if (scroll >= $("#header-stiky").height() + 300) {
			sticky.addClass("is-sticky sticky");
		} else {
			sticky.removeClass("is-sticky sticky");
		}
	});
});

jQuery(document).ready(function ($) {
	let hamburgerIsOpen = false;
	const openHamburgerBtnEl = $("#burger-btn");
	const hamburgerMenuEl = $("#burger-nav");

	const closeHamburgerMenu = () => {
		hamburgerMenuEl.css("transform", "translateX(-1000%)");
		hamburgerIsOpen = false;
		$("body").css("overflow-y", "auto");
		$("main").css("filter", "none");
		$("header.header .header__main-nav-wrapper").css("filter", "none");
		$("header.header .sub-nav .sub-nav-list").css("filter", "none");
		$("header.header .sub-nav > div:last-child").css("filter", "none");
	};

	openHamburgerBtnEl.click(function (e) {
		e.stopPropagation();
		hamburgerMenuEl.css("transform", "translateX(0)");
		$("main").css("filter", "blur(3px)");
		$("header.header .header__main-nav-wrapper").css("filter", "blur(3px)");
		$("header.header .sub-nav .sub-nav-list").css("filter", "blur(3px)");
		$("header.header .sub-nav > div:last-child").css("filter", "blur(3px)");
		hamburgerIsOpen = true;
		$("body").css("overflow-y", "hidden");
	});

	$(document).on("click", function (e) {
		e.stopPropagation();
		const tg = $(e.target);
		if (
			!tg.closest("#burger-btn").length &&
			!tg.closest("#burger-nav").length &&
			tg != hamburgerMenuEl &&
			hamburgerIsOpen == true
		) {
			closeHamburgerMenu();
		}
	});

	$(document).on("keyup", function (e) {
		if (hamburgerIsOpen && e.key == "Escape") closeHamburgerMenu();
	});
});

jQuery(document).ready(function ($) {
	const sidebarLabel = $("#sidebar-label");
	const sidebar = $("#sidebar-wrapper");

	let sidebarOn = false;

	sidebarLabel.on("click", function (e) {
		sidebarOn = !sidebarOn;
		sidebarOn ? sidebar.addClass("active") : sidebar.removeClass("active");
		sidebar.css("right", sidebarOn ? "0px" : "-320px");
	});
});

jQuery(document).ready(function ($) {
	$(".minimize-bar").on("click", () => {
		$("footer .timeline").removeClass("minimize");
	});

	new IntersectionObserver(([obj]) => {
		if ($("footer .timeline").hasClass("minimize")) {
			$("footer .timeline").css("position", "fixed");

			if (obj.isIntersecting) {
				$("footer .timeline").addClass("inverted");
			} else {
				$("footer .timeline").removeClass("inverted");
			}
		} else {
			if (obj.isIntersecting) {
				$("footer .timeline").addClass("inverted");
				$("footer .timeline").css("position", "static");
			} else {
				$("footer .timeline").removeClass("inverted");
				$("footer .timeline").css("position", "fixed");
			}
		}
	}).observe(document.querySelector("footer.footer"));
});

jQuery(document).ready(function ($) {
	$("#secondary").stickySidebar({
		topSpacing: 0,
		bottomSpacing: 80,
		containerSelector: ".main-container",
	});

	$(".secondary-mobile-btn").on("click", function (e) {
		e.stopPropagation();
		console.log("click");
		if ($("#secondary").hasClass("active")) {
			$("#secondary").removeClass("active");
			$(this).removeClass("active");
			$("body").css("overflow-y", "auto");
			$("#main-content").css("filter", "none");
			$("header.header").css("filter", "none");
			// $("header.header").css("filter", "none");
			// $("header.header").css("filter", "none");
		} else {
			$("#secondary").addClass("active");
			$(this).addClass("active");
			$("#main-content").css("filter", "blur(3px)");
			$("header.header").css("filter", "blur(3px)");
			// $("header.header").css("filter", "blur(3px)");
			// $("header.header").css("filter", "blur(3px)");
			hamburgerIsOpen = true;
			$("body").css("overflow-y", "hidden");
		}
	});

	$(".managment-list .mob-get-more").on("click", function functionName() {
		more_block = $(this).prev();
		if (more_block.hasClass("active")) {
			more_block.removeClass("active");
			$(this).text("Читать всё");
		} else {
			more_block.addClass("active");
			$(this).text("Скрыть");
		}
	});
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
