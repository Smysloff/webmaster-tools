<?php

namespace tools\core;

/**
 * Приложение: запускает action'ы controller'ов, которые соответствуют маршрутам, полученным из URL
 */
final class App
{
    const TOOL_PATH               = '/tools';
    const CONTROLLERS_NAMESPACE   = '\tools\core\controllers\\'; 
    const DEFAULT_CONTROLLER      = self::CONTROLLERS_NAMESPACE.'Main';
    const DEFAULT_ACTION          = 'index';

    private static $url;
    private static $controller = self::CONTROLLERS_NAMESPACE.'Errors';
    private static $action     = self::DEFAULT_ACTION;

    /**
     * Запуск приложения
     *
     * @return void
     */
    public static function Run() : void
    {
        self::$url = self::GetURL($_SERVER['REQUEST_URI']);
        self::Dispatch();

        $controller = self::$controller;
        $action     = self::$action;

        (new $controller())->$action();
    }

    /**
     * Подбор controller'a и action'a, соответствующих URL
     *
     * @return void
     */
    private static function Dispatch() : void
    {
        // Валидация URL: отсеиваем сразу URL с запрещенными символами
        if (self::ValidateURL(self::$url)) {
            self::$url = self::TransformURL(self::$url);
        } else {
            return;
        }

        // Маршрут для главной страницы
        if (self::$url == '/') {
            self::$controller = self::DEFAULT_CONTROLLER;
            return;
        }

        // Разбиваем URL на сегменты и подсчитываем их кол-во
        $urlParts   = explode('/', trim(self::$url, '/'));
        $countParts = count($urlParts);

        // Маршрут для одного сегмента URL
        if ($countParts == 1) {

            // - методы controller'a по умолчанию
            $controller = self::DEFAULT_CONTROLLER;
            $action     = $urlParts[0];
            
            if (is_callable([$controller, $action]) && $action != self::DEFAULT_ACTION) {
            
                self::$controller = $controller;
                self::$action     = $action;

                return;
            }

            // - методы по умолчанию для остальных controller'ов
            $controller = self::CONTROLLERS_NAMESPACE.ucfirst($urlParts[0]);
            $action     = self::DEFAULT_ACTION;

            if (is_callable([$controller, $action])) {
            
                self::$controller = $controller;
                self::$action     = $action;

                return;
            }
        }

        // Маршрут для двух сегментов URL
        if ($countParts == 2) {

            $controller = self::CONTROLLERS_NAMESPACE.ucfirst($urlParts[0]);
            $action     = $urlParts[1];

            if (is_callable([$controller, $action]) &&
                $controller != self::DEFAULT_CONTROLLER &&
                $action     != self::DEFAULT_ACTION) {

                self::$controller = $controller;
                self::$action     = $action;

                return;
            }
        }
    }

    /**
     * Получение URL с учетом того, что движок находится во вложенной папке
     *
     * @param string $url
     * URL в виде строки
     * 
     * @return string
     * Метод возвращает URL в виде строки
     */
    private static function GetURL(string $url): string
    {
        $pattern = '#^'.self::TOOL_PATH.'#';

        $url = parse_url($url, PHP_URL_PATH);
        $url = preg_replace($pattern, '', $url);

        return $url;
    }

    /**
     * Проверка переданного URL на корректность
     *
     * @param string $url
     * URL в виде строки
     * 
     * @param string $pattern
     * [optional] 
     * 
     * Паттерн для проверки соответствия.
     * 
     * По умолчанию допускаются только латинские буквы в нижнем регистре, цифры, слэш и дефис
     * 
     * @return boolean
     * Метод возвращает булево значение, соответствующее результату проверки
     */
    private static function ValidateURL(string $url, string $pattern = '#^[\da-z/-]#'): bool
    {
        return preg_match($pattern, $url);
    }

    /**
     * Заменяет в URL нижнее подчеркивание на дефисы.
     * 
     * Полученный URL можно использовать в controller'ах.
     *
     * @param string $url
     * URL в виде строки
     * 
     * @return string
     * Метод возвращает измененный URL в виде строки
     */
    private static function TransformURL(string $url): string
    {
        return str_replace('-', '_', $url);
    }
}
