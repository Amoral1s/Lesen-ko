jQuery(document).ready(function ($) {

 const singlePageRef = document.querySelector('.single-page');
 if (!singlePageRef) {
	return
 }

 const infoTabs = document.querySelectorAll('.stair-info-top .item');
 const infoWrappers = document.querySelectorAll('.stair-info-bot .item');

 	if (infoTabs.length > 0 && infoWrappers.length > 0) {
		if (window.screen.width > 992) {
			infoTabs[0].classList.add('active');
			infoWrappers[0].classList.add('active');
	
			infoTabs.forEach((el, i) => {
				el.addEventListener('click', () => {
					infoTabs.forEach(e => e.classList.remove('active'))
					infoWrappers.forEach(e => e.classList.remove('active'))
					el.classList.add('active')
					infoWrappers[i].classList.add('active')
				})
			});
		} else {
			infoTabs.forEach((tab, index) => {
				let wrapItem = infoWrappers[index].cloneNode(true);
				wrapItem.classList.remove('item');
				wrapItem.classList.add('item-wrapper');
				infoWrappers[index].remove();
				tab.parentElement.insertBefore(wrapItem, tab.nextElementSibling);
				
			});
			$('.stair-info-top .item').on('click', function() {
				$(this).next().slideToggle(200);
				$(this).toggleClass('active');
			});
		}
		
	}



const links = document.querySelectorAll('a');

if (links) {
	links.forEach((elem) => {
		if (elem.href.indexOf('#') != -1) {
			elem.classList.add('click');
		}
	});
}

	const starRatingFunc = () => {
		const stars = document.querySelectorAll('.popup.review .form-stars img');
		const starsWrap = stars[0].parentElement;

		stars.forEach((e, i) => {
			e.addEventListener('click', (event) => {
				starsWrap.classList.add('selected');
				$('.stars-input').val(i + 1)
				stars.forEach(e => {
					e.classList.remove('active')
				})
				for (let r = 0; r < i + 1; r++) {
					stars[r].classList.add('active');
				}
				
			})
		})
		
		$(stars).hover(function() {
			if (!starsWrap.classList.contains('selected')) {
				$(this).addClass('active');
				$(this).prev().addClass('active');
				$(this).prev().prev().addClass('active');
				$(this).prev().prev().prev().addClass('active');
				$(this).prev().prev().prev().prev().addClass('active');
			}
		}, function() {
			if (!starsWrap.classList.contains('selected')) {
				$(this).removeClass('active');
				$(this).prev().removeClass('active');
				$(this).prev().prev().removeClass('active');
				$(this).prev().prev().prev().removeClass('active');
				$(this).prev().prev().prev().prev().removeClass('active');
			}

			
		});

	}
	

	/* const blogBreadcrumbs = document.querySelector('.blog-bread > span');

	if (blogBreadcrumbs) {
		const blogLink = document.createElement('span');
		blogLink.innerHTML = `<span><a class="cent" href="/our-blog/">Our blog</a></span> > `;
		const referenceElement = blogBreadcrumbs.querySelector('.breadcrumb_last');
		blogBreadcrumbs.insertBefore(blogLink, referenceElement);
	} */

	const singlePage = document.querySelector('.only-single-page');

	if (singlePage) {
		$('.wpd-thread-info').text('Комментарии');
		const navWrap = document.querySelector('.single-nav-wrap');
		if (!navWrap) {
			return
		}
		const navWrapParent = navWrap.parentElement;
		const content = document.querySelector('.content');
		const contentBlocks = content.querySelectorAll('*');
		let elems = 0;
		contentBlocks.forEach((elem, index) => {
			if (elem.id) {
				if (elem.classList.contains('cards-wrap') || elem.classList.contains('swiper-wrapper')) {
					return
				}
				const navLink = document.createElement('a');
				navLink.href = `#${elem.id}`;
				navLink.classList.add('anchor');
				navLink.textContent = elem.id.replace(/\-/g, ' ');
				navWrap.appendChild(navLink);
				elems++;
			}
		});
		if (elems === 0) {
			navWrapParent.remove();
		}
		const rating = document.querySelector('.wpd-rating-stars').cloneNode(true);
		const ratngTopWrap = document.querySelector('.new-rating');
		const ratngVotes = document.querySelector('.wpd-rating-value .wpdrc').textContent;
		const votes = document.querySelector('.votes');

		ratngTopWrap.appendChild(rating);
		votes.textContent = ratngVotes;
	}


	$(".anchor").click(function () {
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top - 200;
		$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 500);
		return false;
	});

}); //end