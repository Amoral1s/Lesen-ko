jQuery(document).ready(function ($) {
	if (window.screen.width <= 992) {
		$('.share').click(function() {
			$('.share-block').fadeToggle(200);
		});
		$('.burger').on('click', function() {
			$('.mob-menu').slideToggle(200);
			$(this).toggleClass('active');
		});
		$('li.menu-item-has-children > a').click(function(e) {
			e.preventDefault();
			if ($(this).hasClass('active')) { 
				window.location.href = $(this).attr('href');
			} else {
				$(this).next().next('ul').slideDown(200);
				$(this).addClass('active');
			}
		});
		$('li.menu-item-has-children > span').click(function(e) {
			e.preventDefault();
			if ($(this).hasClass('active')) { 
				$(this).next().next('ul').slideUp(200);
				$(this).removeClass('active');
			} else {
				$(this).next().next('ul').slideDown(200);
				$(this).addClass('active');
			}
		});
		$('.mob-menu .item-header').click(function(e) {
			if ($(this).hasClass('active')) {
				$(this).next('ul').slideToggle(200);
				$(this).toggleClass('active');
			} else {
				$('.mob-menu .item-header').removeClass('active');
				$('.mob-menu .item-header').next().slideUp(200);
				$(this).next('ul').slideToggle(200);
				$(this).toggleClass('active');
			}
				
		});
		$('.mob-menu .back-btn').click(function(e) {
				$('.mob-menu-catalog').fadeOut(200);
		});
		$('.mob-menu .toggle').click(function(e) {
				$('.mob-menu-catalog').fadeIn(200);
		});
	} else {
		$('.share').hover(function() {
			$('.share-block').fadeIn(200);
		}, function() {
			$('.share-block').fadeOut(200);
		});
		$('.how-pc .toggle').hover(function() {
			$(this).next().fadeIn(200);
		}, function() {
			$(this).next().fadeOut(200);
		});
		$(window).scroll(function() { 
			if ($(window).scrollTop() > 200) {
				$('.header').addClass('active');
			} else {
				$('.header').removeClass('active');
			}
		});
		$('li.menu-item-has-children').hover(function() {
			$(this).addClass('active')
			$(this).children('ul').slideDown(0);
		}, function() {
			$(this).removeClass('active')
			$(this).children('ul').slideUp(0);
		});
		$('.cat-btn-wrap').hover(function() {
			$('.cat-btn').addClass('active')
			$('.catalog-menu').addClass('active');
			$('.header').addClass('open-cat');
			/* $('html').addClass('fixed');	 */
		}, function() {
			$('.cat-btn').removeClass('active')
			$('.catalog-menu').removeClass('active');
			$('.header').removeClass('open-cat');
			$('html').removeClass('fixed');	

		});
		
	} 

	
	

	const products = document.querySelectorAll('.cards-wrap a.item');

	if (products.length > 0) {
		products.forEach(elem => {
			const elemGallery = elem.querySelector('.mag-toggle-cards');
			if (window.screen.width > 0) {
				$(elemGallery).magnificPopup({
					delegate: 'div',
					type: 'image',
					gallery: {
						enabled: true
					}
				});
			}
			elem.addEventListener('click', (e) => {
				e.preventDefault();
				let target = e.target;
				if (!target.closest('.item .button.buy-stair') && !target.closest('.item-gall')) {
					window.location.href = elem.href;
				}
				if (target.closest('.item-gall')) {
					
				}
			})
		})
	}
	const magToggle = document.querySelectorAll('.mag-toggle');
	
	if (magToggle.length > 0) {
		magToggle.forEach(elem => {
			$(elem).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		})
	}
	const gallery = document.querySelectorAll('.gallery');
	
	if (gallery.length > 0) {
		gallery.forEach(elem => {
			$(elem).magnificPopup({
				delegate: 'figure a',
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		})
	}
	

	$('.faq .item-title').on('click', function() {
		$(this).next().slideToggle(200);
		$(this).toggleClass('active');
	})



	

/* const links = document.querySelectorAll('a');

if (links) {
	links.forEach((elem) => {
		if (elem.href.indexOf('#') != -1) {
			elem.classList.add('click');
		}
	});
} */

	//Header
	


	
	

	const actionsTimers = document.querySelectorAll('.page-actions .item .time');

	if (actionsTimers.length > 0) {
		actionsTimers.forEach((elem, index) => {
			
			const dateString = elem.dataset.value.trim();
			// Разбиваем строку на значения дня, месяца и года
			const dateParts = dateString.split("/");
			const day = parseInt(dateParts[0], 10);
			const month = parseInt(dateParts[1], 10) - 1; // Здесь вычитаем 1, так как в JavaScript месяцы начинаются с 0
			const year = parseInt(dateParts[2], 10);

			const textDays = elem.querySelector('.days .num');
			const textHours = elem.querySelector('.hours .num');
			const textMin = elem.querySelector('.min .num');
			const textSec = elem.querySelector('.sec .num');

			// Создаем объект Date, используя полученные значения
			const expiryDate = new Date(year, month, day);
			const nowDate = new Date();
			if (nowDate > expiryDate) {
				elem.textContent = 'Акция закончилась';
				elem.classList.add('no-act')
				return
			}


			// Функция, которая обновляет таймер каждую секунду
			function updateTimer() {
				// Получаем текущую дату и время
				const currentDate = new Date();

				// Вычисляем оставшееся время в миллисекундах
				const timeRemaining = expiryDate - currentDate;

				// Проверяем, если время истекло
				if (timeRemaining <= 0) {
					clearInterval(timerInterval); // Останавливаем таймер
					console.log("Акция уже закончилась!");
					return;
				}

				// Вычисляем количество дней, часов, минут и секунд
				const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
				const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

				textDays.textContent = days;
				textHours.textContent = hours;
				textMin.textContent = minutes;
				textSec.textContent = seconds;
				
			}

			// Вызываем функцию updateTimer сразу, чтобы показать оставшееся время сразу после загрузки страницы
			updateTimer();

			// Обновляем таймер каждую секунду
			const timerInterval = setInterval(updateTimer, 1000);
		})
	}

	const galleryPage = document.querySelector('.cards.gall-page');

	if (galleryPage) {
		const posts = galleryPage.querySelectorAll('.item');
		const showMoreBtn = galleryPage.querySelector('.show-more');
		const tagList = galleryPage.querySelectorAll('.news-cats li');

		

		function selectIndexes(tagName) {
			posts.forEach((post) => {
				let termsList = post.querySelector('.item-terms').textContent.trim();
				let arrTerms = termsList.split(",");

				if (arrTerms.indexOf(tagName) !== -1) {
					post.classList.remove('unselect');
					post.style.display = 'block';
				} else {
					post.classList.add('unselect');
					post.style.display = 'none';
				}
			});
		}
	

		function showMoreSort() {
			const maxLength = 12;
			let currLength = 0;
			posts.forEach(post => {
				if (!post.classList.contains('unselect')) {
					if (maxLength > currLength) {
						post.style.display = 'block';
						currLength++;
					} else {
						post.style.display = 'none';
					}
				}
			});
			if (currLength == 12) {
				showMoreBtn.classList.remove('hidden');
			} else {
				showMoreBtn.classList.add('hidden');
			}
		}
		showMoreBtn.addEventListener('click', () => {
			posts.forEach(elem => {
				if (!elem.classList.contains('unselect')) {
					elem.style.display = 'block';
				}
			})
			showMoreBtn.classList.add('hidden');

		})

		showMoreSort();
		
		tagList.forEach(tag => {
			tag.addEventListener('click', () => {
				tagList.forEach(e => e.classList.remove('active'));
				let tagName = tag.textContent.trim();
				tag.classList.add('active');

				selectIndexes(tagName);
				showMoreSort();
			});
		})
	}
	const textFeed = document.querySelectorAll('.text-feed .wrap .item');

	if (textFeed.length > 4) {
		let ind = 0;
		textFeed.forEach((elem) => {
			if (ind < 4) {
				elem.style.display = 'block';
			} else {
				elem.style.display = 'none';
			}
			ind++;
		});
		const btn = document.createElement('div');
		btn.classList.add('button');
		btn.textContent = 'Показать все отзывы';
		textFeed[0].parentElement.appendChild(btn);
		btn.addEventListener('click', () => {
			if (btn.classList.contains('open')) {
				let ind = 0;
				textFeed.forEach((elem) => {
					if (ind < 4) {
						elem.style.display = 'block';
					} else {
						elem.style.display = 'none';
					}
					ind++;
				});
				btn.textContent = 'Показать все отзывы';
				btn.classList.remove('open');
			} else {
				textFeed.forEach(elem => {
					elem.style.display = 'block';
				});
				btn.textContent = 'Скрыть отзывы';
				btn.classList.add('open');
			}
			
		})
	}
	/* const seoText = document.querySelector('section.seo .container');

	if (seoText) {
		const seoContent = seoText.querySelector('.content');

		if (seoText.parentElement.classList.contains('no-hidden')) {
			return
		}

		if (seoContent.clientHeight > 210) {
			seoContent.style.height = '210px';
			seoContent.classList.add('seo-hidden');
			const btn = document.createElement('div');
			btn.innerHTML = `
				<span>Показать весь текст</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M5.46967 8.46967C5.76256 8.17678 6.23744 8.17678 6.53033 8.46967L12 13.9393L17.4697 8.46967C17.7626 8.17678 18.2374 8.17678 18.5303 8.46967C18.8232 8.76256 18.8232 9.23744 18.5303 9.53033L12.5303 15.5303C12.2374 15.8232 11.7626 15.8232 11.4697 15.5303L5.46967 9.53033C5.17678 9.23744 5.17678 8.76256 5.46967 8.46967Z" fill="#C01025"/>
				</svg>
			`;
			btn.classList.add('seo-more');
			btn.addEventListener('click', () => {
				seoContent.style.height = 'auto';
				seoContent.classList.remove('seo-hidden');
				btn.remove();
			})
			seoText.appendChild(btn);
		}
		
	} */

	const accelerator = document.querySelectorAll('a');

	accelerator.forEach(e => {
		if (e.href.indexOf('accelerator') != -1) {
			e.remove();
			setTimeout(() => {
				if (e) {
					e.remove();
				}
			}, 5000);
		}
	});
}); //end