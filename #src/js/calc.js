jQuery(document).ready(function ($) {

  const calcPage = document.querySelector('section.calc');

  if (!calcPage) {
    return
  }
  const summText = calcPage.querySelector('.calc-form .summ');
  
  function calculate() {
    const inputs = calcPage.querySelectorAll('input');
    const ranges = calcPage.querySelectorAll('.ranges .view-val'); //Инпуты range
    let values = []; //будущий массив для обработки
    inputs.forEach(input => {
      if (input.checked) {
        values.push(input.value); //вставляем значения инпутов в массив
      }
    });
    ranges.forEach(range => {
      const rangeValue = range.textContent.trim(); //Значение range
      const rangePrices = range.parentElement.querySelector('input').dataset.price.trim(); //Массив цен
      let lastIndex = rangePrices.lastIndexOf(","); //последняя запятая
      let newPrices = rangePrices.slice(0, lastIndex) + rangePrices.slice(lastIndex + 1); //удаляем запятую
      const formattedStr = newPrices.replace(/%/g, ""); // Удаляем символы "%"
      const arr = JSON.parse(formattedStr); //форматируем в json
      let result = null; //записываем нзачение в % из range
      for (const [value, percent] of arr) {
        
        if (value == rangeValue) {
          result = percent; //выдаем процент
          break;
        }
        if (rangeValue >= value) {
          result = percent; // Запоминаем текущий процент
        } else {
          break; // Последнее значение уже установлено в предыдущей итерации
        }
      }
      values.push(result !== null ? result + '%' : arr[0][1] + '%')//добавляем в общий массив значений
    });
    let sum = 0; // общая сумма
    let percentSum = 0; // сумма процентов
    let percentSummPlus = 0;
    let indexPercent = true;
    values.forEach(item => {
      if (!item.includes('%')) {
        sum += parseFloat(item);
      } else {
        if (indexPercent == true) {
          indexPercent = false;
          let percent = parseFloat(item.replace('%', ''));
          percentSummPlus += percent;
        } else {
          let percent = parseFloat(item.replace('%', ''));
          percentSum += percent;
        }
      }
    });
    
    // Вычисляем сумму процентов
    let percentValueFirstPlus = sum * (percentSummPlus / 100);
    sum += percentValueFirstPlus;
    

    let percentValue = sum * (percentSum / 100);
    
    // Применяем процент к общей сумме
    sum += percentValue;
    summText.textContent = sum.toLocaleString('ru-RU');
    console.log(sum)
    
  }

  document.addEventListener('change', () => {
    calculate();
  });

  const ranges = document.querySelectorAll('input[type="range"]');

  if (ranges.length > 0) {
    ranges.forEach(elem => {
      let minVal = +elem.dataset.min;
      let maxVal = +elem.dataset.max;
      let stepVal = +elem.dataset.step;
      let defaultVal = +elem.dataset.default;

      const elemTextValue = elem.parentElement.querySelector('.view-val');

      $(elem).ionRangeSlider({
        skin: "round",
        type: "single",
        min: minVal,
        max: maxVal,
        from: defaultVal,
        step: stepVal,
        onChange: function (data) {
          elemTextValue.textContent = data.from;
          calculate();
        }
      });

    });
  }
  calculate();

  function setValuesToForm() {
    const itemWrappers = calcPage.querySelectorAll('.calc-item-wrap');
    const inputFormForValue = document.querySelector('input[name="calc_values"]');
    inputFormForValue.value = '';
    let valuesArr = []

    itemWrappers.forEach(elem => {
      const title = elem.querySelector('.title').textContent.trim();
      const inputsRadio = elem.querySelectorAll('input[type="radio"]');
      const inputsRange = elem.querySelectorAll('.ranges-block .item');
      

      if (inputsRadio.length > 0) {
        inputsRadio.forEach(input => {
          if (input.checked) {
            const value = input.nextElementSibling.querySelector('b').textContent.trim();
            valuesArr.push({ key: title, value: value});
          }
        })
      }

      if (inputsRange.length > 0) {
        inputsRange.forEach(range => {
          const titleRange = range.querySelector('p').textContent.trim();
          const value = range.querySelector('.view-val').textContent.trim();
          valuesArr.push({ key: titleRange, value: value});
        })
      }
      
      
    })
    const summValue = summText.textContent.trim();
    valuesArr.push({ key: 'Сумма калькулятора', value: summValue + ' руб.'});
    let inputString = valuesArr.map(item => `${item.key}: ${item.value}`).join('\n');
    inputFormForValue.value = inputString;
  }


  $('.button.calculate-call').on('click', function() {
    setValuesToForm();
		$('.popup.popup-calc').fadeIn(200);
		$('.overlay').fadeIn(200);
		$('html').addClass('fixed');
	});

  const quiz = document.querySelector('.calc.quiz');

  if (quiz) {
    const quizLine = quiz.querySelector('.quiz-line');
    const quizSteps = quiz.querySelectorAll('.quiz-step');
    const countAll = quiz.querySelector('.step-all');
    const countNow = quiz.querySelector('.step-now');
    

    if (quizSteps.length > 0) {
      quizSteps.forEach((elem, index) => {
        const newLine = document.createElement('span');
        if (index == 0) {
          newLine.classList.add('active')
        }
        quizLine.appendChild(newLine);
      });

      countAll.textContent = quizSteps.length;
      countNow.textContent = 1;
    }

    // Получаем все скрытые блоки квиза
    // Получаем кнопки "Назад" и "Далее"
    const backButton = document.querySelector('.back');
    const nextButton = document.querySelector('.next');
    // Устанавливаем индекс текущего активного шага
    let currentStep = 0;
    const stepIndicators = document.querySelectorAll('.quiz-line span');
    
    // Функция для обновления состояния квиза
    function updateQuizState() {
      // Перебираем все шаги квиза
      quizSteps.forEach((step, index) => {
        // Если индекс шага соответствует текущему активному шагу, добавляем класс "active", иначе удаляем его
        if (index === currentStep) {
          step.classList.add('active');
        } else {
          step.classList.remove('active');
        }
      });

      stepIndicators.forEach((indicator, index) => {
        if (index === currentStep) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
      // Обновляем отображение текущего шага
      countAll.textContent = quizSteps.length;
      countNow.textContent = currentStep + 1;

      // Если текущий шаг является первым, скрываем кнопку "Назад", иначе показываем её
      if (currentStep === 0) {
        backButton.style.display = 'none';
      } else {
        backButton.style.display = 'flex';
      }

      // Если текущий шаг является последним, скрываем кнопку "Далее", иначе показываем её
      if (currentStep === quizSteps.length - 1) {
        nextButton.style.display = 'none';
      } else {
        nextButton.style.display = 'flex';
      }
    }

    // Функция для перехода к следующему шагу
    function goToNextStep() {
      if (currentStep < quizSteps.length - 1) {
        currentStep++;
        updateQuizState();
      }
    }

    // Функция для перехода к предыдущему шагу
    function goToPreviousStep() {
      if (currentStep > 0) {
        currentStep--;
        updateQuizState();
      }
    }

    // Назначаем обработчики событий на кнопки "Назад" и "Далее"
    backButton.addEventListener('click', goToPreviousStep);
    nextButton.addEventListener('click', goToNextStep);

    // Обновляем состояние квиза в начале
    updateQuizState();


  }





}); //end
