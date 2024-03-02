jQuery(document).ready(function ($) {
	
	const caseSliderWrapper = document.querySelector('.case-slider');

		if (caseSliderWrapper) {

      const caseSliderMain = caseSliderWrapper.querySelector('.case-slider-wrap__main');
      const caseSliderThumbs = caseSliderWrapper.querySelector('.case-slider-wrap__thumbs');

      const arrPrev = caseSliderWrapper.querySelector('.arr-prev');
      const arrNext = caseSliderWrapper.querySelector('.arr-next');

      if (window.screen.width > 992) {
        let sliderThumbs = new Swiper(caseSliderThumbs, {
          spaceBetween: 20,
          slidesPerView: 5,
          freeMode: true,
          watchSlidesProgress: true,
        });
        let sliderMain = new Swiper(caseSliderMain, {
          spaceBetween: 0,
          navigation: {
            nextEl: arrNext,
            prevEl: arrPrev
          },
          thumbs: {
            swiper: sliderThumbs,
          },
        });
      } else {
        caseSliderThumbs.remove();
        let sliderMain = new Swiper(caseSliderMain, {
          spaceBetween: 0,
          lazy: true,
          autoHeight: true,
          navigation: {
            nextEl: arrNext,
            prevEl: arrPrev
          },
          breakpoints: {
            300: {
              spaceBetween: 15,
            },
            578: {
              spaceBetween: 0,
            } 
          },
          pagination: {
            el: ".case-slider .swiper-pagination",
          },
        });
      }

      
    }
	const singleStairSliderWrapper = document.querySelector('.stair-offer');

		if (singleStairSliderWrapper) {

      const singleSliderMain = singleStairSliderWrapper.querySelector('.big-images .swiper');
      const singleSliderThumbs = singleStairSliderWrapper.querySelector('.small-images .swiper');
      

      if (window.screen.width > 992) {
        let singleThumbsSwiper = new Swiper(singleSliderThumbs, {
          spaceBetween: 20,
          slidesPerView: 5,
          freeMode: true,
          watchSlidesProgress: true,
        });
        let sliderMain = new Swiper(singleSliderMain, {
          spaceBetween: 0,
          thumbs: {
            swiper: singleThumbsSwiper,
          },
        });
      } else {
        singleSliderThumbs.parentElement.remove();
        let sliderMain = new Swiper(singleSliderMain, {
          spaceBetween: 0,
          autoHeight: true,
          breakpoints: {
            300: {
              spaceBetween: 15,
            },
            578: {
              spaceBetween: 0,
            } 
          },
          pagination: {
            el: ".big-images .dots",
          },
        });
      }

      
    }

	const feedBackSlider = document.querySelector('.feedback .swiper');

		if (feedBackSlider) {

      const feedBackSliderWrapper = document.querySelector('.feedback');

      const arrPrev = feedBackSliderWrapper.querySelector('.arr-prev');
      const arrNext = feedBackSliderWrapper.querySelector('.arr-next');

      let feedBackSwiper = new Swiper(feedBackSlider, {
        navigation: {
          nextEl: arrNext,
          prevEl: arrPrev
        },
        pagination: {
          el: ".feedback .swiper-pagination",
        },
        breakpoints: {
          300: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
            spaceBetween: 20,
          },  
          992: {
            slidesPerView: 3,
            spaceBetween: 20,
            spaceBetween: 20,
          } 
        },
      });
     
    }
	const recentSlider = document.querySelector('.cards-slider-wrapper');

		if (recentSlider) {

      const recentSliderWrapper = recentSlider.querySelector('.swiper');

      const arrPrev = recentSlider.querySelector('.arr-prev');
      const arrNext = recentSlider.querySelector('.arr-next');
      const slides = recentSlider.querySelectorAll('.item');

      if (slides.length < 5 && window.screen.width > 992) {
        arrPrev.style.display = 'none';
        arrNext.style.display = 'none';
      }

      let recentSwiper = new Swiper(recentSliderWrapper, {
        lazy: true,
        navigation: {
          nextEl: arrNext,
          prevEl: arrPrev
        },
        /* pagination: {
          el: ".cards-slider-wrapper .swiper-pagination",
        }, */
        breakpoints: {
          300: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
            spaceBetween: 20,
          },  
          992: {
            slidesPerView: 4,
            spaceBetween: 20,
          } 
        },
      });
     
    }


	const teamSlider = document.querySelector('.team .swiper');

		if (teamSlider) {

      const teamSliderWrapper = document.querySelector('.team');

      const arrPrev = teamSliderWrapper.querySelector('.arr-prev');
      const arrNext = teamSliderWrapper.querySelector('.arr-next');

      let teamSwiper = new Swiper(teamSlider, {
        spaceBetween: 20,
        slidesPerView: 4,
        navigation: {
          nextEl: arrNext,
          prevEl: arrPrev
        },
        breakpoints: {
          300: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          578: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },  
          992: {
            slidesPerView: 4,
            spaceBetween: 20,
          } 
        },
      });
     
    }
    
	const bannerActionsSlider = document.querySelector('.banner-slider .swiper');

		if (bannerActionsSlider) {


      let actionSwiper = new Swiper(bannerActionsSlider, {
        spaceBetween: 0,
        slidesPerView: 1,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: true,
        },
        autoHeight: true,
        pagination: {
          el: ".banner-slider .swiper-pagination",
        },
      });
     
    }
    
   if (window.screen.width < 579) {
    const newsBlockSlider = document.querySelector('.news-block .swiper');

		if (newsBlockSlider) {


      let newsBlockSwiper = new Swiper(newsBlockSlider, {
        spaceBetween: 10,
        slidesPerView: 1
      });
     
    }
   }
	

   const sertSlider = document.querySelector('.sert .swiper');

   if (sertSlider && window.screen.width < 768) {

     let sertSwiper = new Swiper(sertSlider, {
       spaceBetween: 10,
       lazy: true,
       slidesPerView: 3,
       breakpoints: {
         300: {
           slidesPerView: 2,
           spaceBetween: 10,
         },
         578: {
           slidesPerView: 3,
           spaceBetween: 0,
         }
       },
     });
    
   }

   const cardsSlider = document.querySelectorAll('.cards .item');

		if (cardsSlider.length > 0) {
      cardsSlider.forEach(elem => {
        const swiper = elem.querySelector('.swiper');
        const pagination = elem.querySelector('.dots');
        new Swiper(swiper, {
          spaceBetween: 0,
          lazy: true,
          slidesPerView: 1,
          pagination: {
            el: pagination,
            clickable: true,
          },
          
        });
      })
    }

}); //end