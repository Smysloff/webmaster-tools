<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Tools</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <base href="/tools/assets/"> 
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="grid">

        <header class="header">
            <div class="container">
                <div class="slogan">
                    <h1>Инструменты умного вебмастера</h1>
                </div>
            </div>
        </header>

        <aside class="aside">

            <div class="container">

                <form name="tool-selector" class="aside__list tool-selector">
                    <div class="aside__item">
                        <label>
                            <input type="radio" name="tool" value="response-code" class="tool-item" checked>
                            <span>Код ответа сервера</span>
                        </label>
                    </div>
                    <div class="aside__item">
                        <label>
                            <input type="radio" name="tool" value="tag-parser" class="tool-item">
                            <span>Парсер тегов</span>
                        </label>
                    </div>
                    <div class="aside__item">
                        <label>
                            <input type="radio" name="tool" value="transliter" class="tool-item">
                            <span>Транслитерация</span>
                        </label>
                    </div>
                    <div class="aside__item">
                        <label>
                            <input type="radio" name="tool" value="decoder" class="tool-item">
                            <span>(Де)кодирование</span>
                        <label>
                    </div>
                    <div class="aside__item">
                        <label>
                            <input type="radio" name="tool" value="sitemap" class="tool-item">
                            <span>Карта сайта</span>
                        <label>
                    </div>
                </form>

                <hr>

                <div class="aside__list tool-options">

                    <div class="aside__item" hidden>
                        <form name="response-code-options">
                            <div class="tool-options__item">Добавлять адреса страниц в вывод?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <span>да</span>
                                        <input type="radio" name="add-urls" value="on" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="add-urls" value="off">
                                        <span>нет</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="aside__item" hidden>
                        <form name="tag-parser-options">

                            <div class="tool-options__item">Какой тег парсим?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="tag" value="title" checked>
                                        <span>title</span>
                                    </label>
                                </div>
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="tag" value="h1">
                                        <span>h1</span>
                                    </label>
                                </div>
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="tag" value="description">
                                        <span>description</span>
                                    </label>
                                </div>
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="tag" value="keywords">
                                        <span>keywords</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="tool-options__item">Добавлять адреса страниц в вывод?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <span>да</span>
                                        <input type="radio" name="add-urls" value="on" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="add-urls" value="off">
                                        <span>нет</span>
                                    </label>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="aside__item" hidden>
                        <form name="transliter-options">
                            <div class="tool-options__item">Добавлять исходные строки в вывод?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <span>да</span>
                                        <input type="radio" name="add-src" value="on" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="add-src" value="off">
                                        <span>нет</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="aside__item" hidden>
                        <form name="decoder-options">
                            <div class="tool-options__item">С чем работаем?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="module" value="url" checked>
                                        <span>URL-кодирование</span>
                                    </label>
                                </div>
                                <div class="form__row">
                                    <label>
                                        <input type="radio" name="module" value="base64">
                                        <span>Base64</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="tool-options__item">Что нужно сделать?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                    <span>кодировать</span>
                                        <input type="radio" name="type" value="code" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="type" value="decode">
                                        <span>декодировать</span>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="tool-options__item">Добавлять исходные строки в вывод?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <span>да</span>
                                        <input type="radio" name="add-src" value="on" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="add-src" value="off">
                                        <span>нет</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="aside__item" hidden>
                        <form name="sitemap-options">
                            <div class="tool-options__item">Какая карта сайта нужна?</div>
                            <div class="tool-options__checker">
                                <div class="form__row">
                                    <label>
                                        <span>xml</span>
                                        <input type="radio" name="type" value="xml" checked>
                                    </label>
                                    <label>
                                        <input type="radio" name="type" value="html">
                                        <span>html</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                </div> <!-- aside__list -->

            </div> <!-- /container -->

        </aside>

        <main class="main">

            <section class="section">

                <h2>Код ответа сервера</h2>

                <form class="form">

                    <div class="form__item form__item-input">
                        <div class="form__hint">ввод</div>
                        <textarea class="form__textarea" rows="20" id="inputData"></textarea>
                        <button class="form__button submit-button">Отправить</button>
                        <div class="form__notification input-notification"></div>
                        <div class="form__description response-code-input-description" hidden>
                            <p>Этот инструмент поможет вам пакетно проверить доступность страниц из вашего списка, а так же наличие редиректа при обращении к ним. Отправка запросов на сторонний сервер требует времени, поэтому результат иногда нужно подождать. Максимальное число адресов за один раз - <?= TOOLS_ROWS_LIMIT ?>, остальные будут проигнорированы.</p>
                            <p>Адреса страниц необходимо добавлять списком, где каждый адрес расположен на новой строке. Инструмент показывает код ответа именно той страницы, которую вы ему отправите. Он не совершает редиректов и не пытается предугадать правильный вариант адреса, поэтому проверяйте наличие протокола "http" или "https", а так же наличие или отсутствие поддомена "www" и "/" на конце.</p>
                        </div>

                        <div class="form__description tag-parser-input-description" hidden>
                            <p>При помощи данного инструмента вы можете спарсить содержимое нужных вам тегов по заданному списку страниц. Максимальное число страниц за одну запрос - <?= TOOLS_ROWS_LIMIT ?>, остальные будут проигнорированы.</p>
                            <p>Адреса страниц необходимо добавлять списком, где каждый адрес расположен на новой строке. Он не совершает редиректов и не пытается предугадать правильный вариант адреса, поэтому проверяйте наличие протокола "http" или "https", а так же наличие или отсутствие поддомена "www" и "/" на конце.</p>
                        </div>

                        <div class="form__description transliter-input-description" hidden>
                            <p>Инструмент позволяет транслитерировать кирилические строки в URL-адреса, в строгом соответствии рекомендациям Яндекса. Максимальное число строк на одну операцию - <?= TOOLS_ROWS_LIMIT ?>, остальные будут проигнорированы.</p>
                            <p>Текст необходимо добавлять единым списком, где каждый элемент расположен на новой строке.</p>
                        </div>

                        <div class="form__description decoder-input-description" hidden>
                            <p>Инструмент позволяет кодировать (шифровать) и декодировать(расшифровывать) строки согласно выбранным технологиям. Максимальное число строк на одну операцию - <?= TOOLS_ROWS_LIMIT ?>, остальные будут проигнорированы.</p>
                            <p>Текст необходимо добавлять единым списком, где каждый элемент расположен на новой строке.</p>
                        </div>

                        <div class="form__description sitemap-input-description" hidden>
                            <p>Инструмент позволяет создавать карту сайта на основе списка URL. Можно создавать как XML-карту сайта, так и HTML-список для HTML-карты сайта. Максимальное количество переданных адресов в одну задачу - 999, остальные будут проигнорированы.</p>
                            <p>URL необходимо передавать списком, где каждый адрес расположен на новой строке. Для HTML-карты сразу после адреса через точку с запятой можно передать заголовок страницы (например: <u>http://examle.com;Custom title</u>). В противном случае заголовки будут парситься с самой страницы. По умолчанию - это &lt;h1&gt;, если он не будет найден, то - &lt;title&gt;.</p>
                        </div>
                    </div>

                    <div class="form__item form__item-output">
                        <div class="form__hint">вывод</div>
                        <textarea class="form__textarea" rows="20" id="outputData" disabled></textarea>
                        <button class="form__button copy-button" disabled>Копировать</button>
                        <div class="form__notification output-notification"></div>
                        <div class="form__description response-code-output-description" hidden>
                            <p>По умолчанию выводятся не только коды ответов сервера, но и адреса самих страниц, отделенных точкой запятой от ответов. Такой вариант удобен для наглядного сопоставления страниц и ответов сервера, а так же при использовании различных инструментов в редакторах вроде Microsoft Excel (например, функции ВПР). Это поведение можно отключить переключателем в боковой панели, оставив только коды ответов. Если по какой-то причине инструменту не удалось обработать URL (например, он не корректен), то в списке будет выводиться слово "error".</p>
                            <p>Чтобы забрать выходные данные, вы можете нажать на кнопку "копировать", и тогда весь список будет скопирован в ваш буфер обмена. Либо вы можете сами скопировать нужные вам строки, подобно тому как делаете это в текстовых редакторах.</p>
                        </div>

                        <div class="form__description tag-parser-output-description" hidden>
                            <p>По умолчанию выводится не только содержимое тегов, но и адреса самих страниц, отделенных точкой запятой от ответов. Такой вариант удобен для наглядного сопоставления страниц и полученной информации, а так же при использовании различных инструментов в редакторах вроде Microsoft Excel (например, функции ВПР). Это поведение можно отключить переключателем в боковой панели, оставив только коды ответов. Если по какой-то причине инструменту не удалось обработать URL (например, он не корректен) или спарсить содержимое тега, то в списке будет выводиться слово "error".</p>
                            <p>Чтобы забрать выходные данные, вы можете нажать на кнопку "копировать", и тогда весь список будет скопирован в ваш буфер обмена. Либо вы можете сами скопировать нужные вам строки, подобно тому как делаете это в текстовых редакторах.</p>
                        </div>

                        <div class="form__description transliter-output-description" hidden>
                            <p>По умолчанию выводятся не только транслитерированые варианты, но и исходные строки, отделенные от них точкой запятой. Такой вариант удобен для наглядного сопоставления полученной информации с исходными данными, а так же при использовании различных инструментов в редакторах вроде Microsoft Excel (например, функции ВПР). Это поведение можно отключить переключателем в боковой панели, оставив только коды ответов.</p>
                            <p>Чтобы забрать выходные данные, вы можете нажать на кнопку "копировать", и тогда весь список будет скопирован в ваш буфер обмена. Либо вы можете сами скопировать нужные вам строки, подобно тому как делаете это в текстовых редакторах.</p>
                        </div>

                        <div class="form__description decoder-output-description" hidden>
                            <p>По умолчанию выводятся не только обработанные варианты, но и исходные строки, отделенные от них точкой запятой. Такой вариант удобен для наглядного сопоставления полученной информации с исходными данными, а так же при использовании различных инструментов в редакторах вроде Microsoft Excel (например, функции ВПР). Это поведение можно отключить переключателем в боковой панели, оставив только коды ответов.</p>
                            <p>Чтобы забрать выходные данные, вы можете нажать на кнопку "копировать", и тогда весь список будет скопирован в ваш буфер обмена. Либо вы можете сами скопировать нужные вам строки, подобно тому как делаете это в текстовых редакторах.</p>
                        </div>

                        <div class="form__description sitemap-output-description" hidden>
                            <p>Сформированную XML-карту сайта нужно скопировать и вставить в файл с расширением <u>.xml</u> (например: <u>sitemap.xml</u>). Готовый HTML-список необходимо скопировать, обернуть в тег &lt;ul&gt; или &lt;ol&gt; и вставить в HTML-шаблон страницы.</p>
                            <p>Чтобы забрать выходные данные, вы можете нажать на кнопку "копировать", и тогда весь список будет скопирован в ваш буфер обмена. Либо вы можете сами скопировать нужные вам строки, подобно тому как делаете это в текстовых редакторах.</p>
                        </div>
                        
                    </div>

                </form>
            </section>

            <div class="section tool-common-description text-center">
                <p>Этот набор инструментов находится в стадии разработки, поэтому возможны баги, неожиданные результаты и стремительный коллапс видимой Вселенной.<br>Используйте его на свой страх и риск ;)</p>
                <p class="bold">Текущая версия: 0.200404</p>
            </div>

        </main>

        <footer class="footer">
            <div class="container">
                <hr>
                <div class="copy"><?= date('Y') ?> © <a href="/"><?= $_SERVER['HTTP_HOST'] ?></a></div>
            </div>
        </footer>

    </div>

    <script src="js/main.js"></script>
</body>
</html>