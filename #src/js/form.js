jQuery(document).ready(function ($) {
		
  $(".wpcf7").on('wpcf7mailsent', function(event){
			if (event.detail.contactFormId == '1622') {
				$('#thx-feed').fadeIn(200);
				$('.popup').addClass('popup-thx');
				$('#thx-feed').removeClass('popup-thx');
				$('.overlay').fadeIn(300);
				$('html').removeClass('fixed');
			} else {
				$('#thx').fadeIn(200);
				$('.popup').addClass('popup-thx');
				$('#thx').removeClass('popup-thx');
				$('.overlay').fadeIn(300);
				$('html').removeClass('fixed');
			}
			$('.input').removeClass('listen');
  });
  $(".wpcf7").on('wpcf7invalid', function(event){
    alert('Заполните поля правильно и повторите попытку!');
  });
  $(".wpcf7").on('wpcf7mailfailed', function(event){
    alert('Ошибка отправки! Попробуйте еще раз!');
  });
	
	document.addEventListener('input', (event) => {
		if (event.target.value != '') {
			if (event.target.closest('.input')) {
				event.target.closest('.input').classList.add('listen');
			}
		}
		if (event.target.value === '') {
			if (event.target.closest('.input')) {
				event.target.closest('.input').classList.remove('listen');
			}
		}
	});

	$('.overlay').on('click', function() {
		$('.popup').fadeOut(300);
		$('.overlay').fadeOut(300);
		$('.popup.popup-video iframe').attr('src', '');
		$('html').removeClass('fixed');	
		$('.popup').removeClass('popup-thx');
	});
	$('.popup .close').on('click', function() {
		$('.popup').fadeOut(300);
		$('.overlay').fadeOut(300);
		$('.popup.popup-video iframe').attr('src', '');
		$('html').removeClass('fixed');
		$('.popup').removeClass('popup-thx');
	});
	$('.button.close-button').on('click', function() {
		$('.popup').fadeOut(300);
		$('.overlay').fadeOut(300);
		$('.popup.popup-video iframe').attr('src', '');
		$('html').removeClass('fixed');
		$('.popup').removeClass('popup-thx');
	});

	const inputPhones = document.querySelectorAll('.wpcf7-tel');

	if (inputPhones.length > 0) {
		inputPhones.forEach(input => {
			IMask(input, {mask: '+{7} (000) 000-00-00'})
		});
	}

	const formCheck = document.querySelectorAll('.form small');

	if (formCheck.length > 0) {
		formCheck.forEach((elem, index) => {
			elem.addEventListener('click', () => {
				const elemForm = elem.closest('.form');
				const formSubmit = elemForm.querySelector('.button');
				$(elem).toggleClass('unselect');
				$(formSubmit).toggleClass('disabled')
			})
		})
	}

	const fileInputs = document.querySelectorAll('input[type="file"]');

	if (fileInputs.length > 0) {
		fileInputs.forEach(elem => {
			elem.addEventListener('change', () => {
					const file = elem.files[0];
					const wrap = elem.closest('.input.file');
					const text = wrap.querySelector('p');
					if (file) {
						text.textContent = 'Файл загружен'
					} else {
						text.textContent = 'Прикрепить свой проект';
					}
			 });
		})
	}

	//Попап видео
	$('.video-data').on('click', function() {
		$('.popup.popup-video').fadeIn(200);
		$('.overlay').fadeIn(200);
		$('.popup.popup-video iframe').attr('src', $(this).attr('data-src'));
		$('html').addClass('fixed');
	});
	//Обратный звонок
	$('.button.callback').on('click', function() {
		$('.popup.popup-callback').fadeIn(200);
		$('.overlay').fadeIn(200);
		$('html').addClass('fixed');
	});
	$('.button.buy-stair').on('click', function() {
		$('.popup.popup-buy').fadeIn(200);
		$('.popup.popup-buy input[name="stair_link"]').val($(this).attr('data-link'));
		$('.popup.popup-buy input[name="stair_name"]').val($(this).attr('data-title'));
		$('.overlay').fadeIn(200);
		$('html').addClass('fixed');
	});

	
	const getValidLocalUrls = () => {
		try {
				const localUrls = localStorage.getItem('url');
				if (localUrls) {
						return JSON.parse(localUrls);
				}
		} catch (error) {
				console.error('Error parsing URLs from localStorage:', error);
				// Очистим некорректные данные из localStorage
				localStorage.removeItem('url');
		}
		return [];
};

const setUrl = () => {
		const date = new Date();
		const hours = String(date.getHours()).padStart(2, '0'); // Форматируем часы
		const min = String(date.getMinutes()).padStart(2, '0'); // Форматируем минуты
		const href = window.location.href;

		// Получаем валидные ссылки из localStorage или создаем пустой массив, если их нет
		const localUrls = getValidLocalUrls();

		// Добавляем новую ссылку с временем
		const newUrl = `${hours}:${min} - ${href}`;
		localUrls.push(newUrl);

		// Ограничиваем количество ссылок до последних 10
		if (localUrls.length > 10) {
				localUrls.shift(); // Удаляем самый старый элемент
		}

		// Сохраняем обновленный массив ссылок в localStorage
		localStorage.setItem('url', JSON.stringify(localUrls));
		console.log('Set URLs in storage:', localUrls);
	};

	const populateUrls = () => {
			try {
					const inputURLS = document.querySelectorAll('.user_urls');

					if (inputURLS.length > 0) {
							const storedUrls = getValidLocalUrls();
							const urlsString = storedUrls.join('\n'); // Преобразуем массив ссылок в строку с переносом строки

							inputURLS.forEach(input => {
									input.value = urlsString;
							});
							console.log('URLs added to inputs:', urlsString);
					}
			} catch (error) {
					console.error('Error populating URLs:', error);
			}
	};

	setUrl();
	setTimeout(() => {
			populateUrls();
	}, 5000);

}); //end