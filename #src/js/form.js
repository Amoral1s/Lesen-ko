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

	
	const setUrl = () => {
		const date = new Date;
		const hours = date.getHours();
		const min = date.getMinutes();
		const href = window.location.href;

		if (localStorage.getItem('url')) {
			const localUrls = localStorage.getItem('url');
			const newUrl = `${hours}:${min} - ${href}\n${localUrls}`;
			localStorage.setItem('url', newUrl);
		} else {
			const newUrl = `${hours}:${min} - ${href}\n`;
			localStorage.setItem('url', newUrl);
		}

		setTimeout(() => {
			$('input[name="User_urls"]').val(localStorage.getItem('url'));
			console.log($('input[name="User_urls"]').val());
		}, 10000);
		
	}
	setUrl();

}); //end