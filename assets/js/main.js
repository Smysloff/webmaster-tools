// элементы на странице
const toolEndpointsFolder        = '/tools/tool/';
      inputData                  = document.getElementById('inputData'),
      outputData                 = document.getElementById('outputData'),
      inputNotification          = document.body.querySelector('.input-notification'),
      outputNotification         = document.body.querySelector('.output-notification'),
      submitButton               = document.body.querySelector('.submit-button'),
      copyButton                 = document.body.querySelector('.copy-button'),
      toolSelectors              = document.body.querySelectorAll('.tool-selector input'),
      toolSelectorOptionsParents = document.body.querySelectorAll('.tool-options .aside__item'),
      dashboardHeader            = document.body.querySelector('main section h2');
      formDescriptions           = document.body.querySelectorAll('.form__description');

// инициализация при загрузки страницы
window.addEventListener('load', () => {

    // событие "нажатие на кнопку" для отправки данных пользователем
    submitButton.addEventListener('click', function(e){
        e.preventDefault();
        clickSubmitButton(this);
    });

    // событие "нажатие на кнопку" для копирования выходных данных
    copyButton.addEventListener('click', function(e){
        e.preventDefault();
        clickCopyButton();
    });

    // событие "смена инструмента" по клику в меню
    toolSelectors.forEach(selector => {
        selector.addEventListener('change', function() {
            changeTool();
        });
    });

    // событие "смена инструмента" при загрузке страницы
    changeTool();

    // добавить автовыбор инструмента на основании cookie
});


function clickSubmitButton(button) {

    // получаем введенную пользователем информацию
    const inputData = button.parentElement.querySelector('.form__textarea').value.trim();
    if (! inputData) return;

    // получаем выбраный инструмент
    const tool = document.forms['tool-selector'].elements['tool'].value;
    if (! tool) return;

    // выводим сообщение о начале работы
    inputNotification.textContent = 'запрос обрабатывается...';
    setTimeout(function(){
        inputNotification.textContent = '';
    }, 2000);

    // получаем выбранные опции инструмента
    const options = {};
    const formOptions = document.forms[`${tool}-options`];

    if (formOptions) {
        Array.from(document.forms[`${tool}-options`].elements).forEach(input => {
            if (input.checked) {
                options[input.name] = input.value;
            }
        });
        if (Object.keys(options).length == 0) return;
    }

    // формируем объект с данными для отправки на endpoint
    const userData = {
        input : inputData,
        options,
    };

    sendToEndpoint(tool, userData);

    // добавить отправку данных на endpoint
}


function clickCopyButton() {

    // выделяем нужный текст
    const range = document.createRange();
    range.selectNode(outputData); 
    window.getSelection().addRange(range); 

    // копируем текст в буфер обмена
    document.execCommand('copy'); 

    // очистим выделение текста
    window.getSelection().removeAllRanges();

    // выводим сообщение о копировании текста
    outputNotification.textContent = 'данные успешно скопированы';
    setTimeout(function(){
        outputNotification.textContent = '';
    }, 2000);
}


function changeTool() {

    const selectedTool = document.forms['tool-selector'].elements['tool'];
    const selector = selectedTool.value;
    const selectedToolOptions = document.forms[`${selector}-options`];

    // меняем список с опциями для настройки выбранного инструмента
    if (selectedToolOptions) {
        toolSelectorOptionsParents.forEach(toolSelectorOptionsParent => {
            toolSelectorOptionsParent.hidden = (toolSelectorOptionsParent != selectedToolOptions.parentElement);
        });
    } else {
        toolSelectorOptionsParents.forEach(toolSelectorParent => toolSelectorParent.hidden = true);
    }

    // меняем текст заголовка в Dashboard'e на выбронное название инструмента
    Array.from(selectedTool).forEach(input => {
        if (input.checked) {
            dashboardHeader.textContent = input.parentElement.textContent;

            Array.from(formDescriptions).forEach(description => {
                if (description.classList.contains(`${input.value}-input-description`) || 
                    description.classList.contains(`${input.value}-output-description`)) {
                    description.hidden = false;
                } else {
                    description.hidden = true;
                }
            });
        }
    });

    // добавить смену описания для полей ввода/вывода

    // добавить запись в cookie выбранного значения selectedTool
}


function sendToEndpoint(tool, body) {
    fetch(toolEndpointsFolder + tool, {
        method: 'POST',
        headers: {'Content-Type': 'application/json;charset=utf-8'},
        body: JSON.stringify(body),
    }).then(data => data.text())
      .then(data => {
          outputData.textContent = data;
          copyButton.disabled    = false;
      });
}



// response-code-
// tag-parser-
// transliter-
// decoder-
// sitemap-