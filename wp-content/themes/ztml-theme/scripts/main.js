jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        var sticky = $("#header-stiky"),
            scroll = $(window).scrollTop();

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

    if (document.querySelector(".adfox__left")) {
        var sidebarLeft = new StickySidebar('.adfox__left', {
            containerSelector: '.main-container',
        });
    }

    if (document.querySelector(".adfox__right")) {
        var sidebarRight = new StickySidebar('.adfox__right', {
            containerSelector: '.main-container',
        });
    }

    $('.timeline').on('touchmove', function (e) {
        if (!$('.timeline__news-list-expanded').has($(e.target)).length)
            e.preventDefault();
    });

});
