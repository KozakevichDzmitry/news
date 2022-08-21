document.addEventListener("DOMContentLoaded", () => {
	const tabNavs = document.querySelector(".tab__wrapper");
	const tabsBtn = document.querySelectorAll(".nav__tab ");
	const tabsContent = document.querySelectorAll(".tab-pane");
	if (tabNavs) {
		tabNavs.addEventListener("click", (e) => {
			if (e.target.classList.contains("nav__tab")) {
				const tabsPath = e.target.dataset.tab;
				tabsHandler(tabsPath);
			}
		});
	}
	const tabsHandler = (press) => {
		tabsBtn.forEach((el) => {
			el.classList.remove("active");
		});
		document.querySelector(`[data-tab="${press}"]`).classList.add("active");
		tabsContent.forEach((el) => {
			el.classList.remove("active");
		});
		document
			.querySelector(`[data-tab-content="${press}"]`)
			.classList.add("active");
	};
	
//-------------------------------Слайдер----------------------------------------------------	
	
	jQuery(document).ready(function () {
          jQuery('.slider__content').slick({
               slidesToShow: 5,
		responsive: [
    {
      breakpoint: 990,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

          });
     });
     jQuery('.btn__tab').on('click', function (e) {
          jQuery('.slider__content').slick("refresh");
     });


     const slidertabNavs = document.querySelector(".slider__tab");
     const slidertabsBtn = document.querySelectorAll(".btn__tab ");
     const slidertabsContent = document.querySelectorAll(".slider__content");
     if (slidertabNavs) {
          slidertabNavs.addEventListener("click", (e) => {
               if (e.target.classList.contains("btn__tab")) {
                    const slidertabsPath = e.target.dataset.tab;
                    slidertabsHandler(slidertabsPath);
               }
          });
     }
     const slidertabsHandler = (press) => {
          slidertabsBtn.forEach((el) => {
               el.classList.remove("active");
          });
          document.querySelector(`[data-tab="${press}"]`).classList.add("active");
          slidertabsContent.forEach((el) => {
               el.classList.remove("active");
          });
          document
               .querySelector(`[data-tab-content="${press}"]`)
               .classList.add("active");
     };
	
//-------------------------Слайдер Документация---------------------------------------------

	jQuery(document).ready(function () {
          jQuery('.slider__documentation').slick({
               slidesToShow: 4,
			  	dots:true,

          });
     });
//--------------------------------Cлайдер о нас------------------------------------------------	

	jQuery(document).ready(function () {
          jQuery('.slider__about').slick({
               slidesToShow: 4,
			  	dots:true,

          });
     });
// --------------------------------Аккардеон------------------------------
// jQuery('.type__1 .accordeon__title').on('click', function () {
     
//      jQuery('.type__1 .accordeon__content.active').removeClass('active')

//      let thisContentBlock = jQuery(this).parent().find('.accordeon__content');

//      if (thisContentBlock.hasClass('active')) {
//           thisContentBlock.removeClass('active')
//      }
//      else {
//           thisContentBlock.addClass('active')
//      }
// })
	jQuery(document).ready(function(){
		jQuery('.accordeon__title').click(function(event){
			jQuery(this).toggleClass('active').next().slideToggle(300);
		});
	});
	jQuery(document).ready(function(){
		jQuery('.element__title').click(function(event){
			if(jQuery('.type__2').hasClass('one')){
				jQuery('.element__title').not(jQuery(this)).removeClass('active');
				jQuery('.element__content').not(jQuery(this).next()).slideUp(300);
			}
			jQuery(this).toggleClass('active').next().slideToggle(300);
		});
	});
	jQuery(document).ready(function(){
		jQuery('.products__item').click(function(event){
// 				if(jQuery('.products').hasClass('one')){
// 				jQuery('.products__item').not(jQuery(this)).removeClass('active');
// 				jQuery('.products__content').not(jQuery(this).next()).slideUp(300);
// 			}
		jQuery(this).toggleClass('active').next().slideToggle(300);
		});
	});
	
});

====>

------>