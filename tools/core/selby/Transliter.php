<?php

namespace tools\core\selby;

class Transliter extends BaseTool
{
    public function work()
    {
        $result = '';

        $yandex_dic = [ // правила транслитерации https://yandex.ru/support/nmaps/app_transliteration.html
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъе'=> 'ye', 'ъ' => '', 'ый' => 'iy', 'ий' => 'iy', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];

        $custom_dic = [ // словарь для слов, транслитерация которых не подпадает под правила
            'цска' => 'cska',
        ];

        for ($i = 0; $i < min(count($this->input), TOOLS_ROWS_LIMIT); $i++) {

            // ...
            $raw = trim($this->input[$i]);

            // ...
            if (filter_var($this->options['add-src'], FILTER_VALIDATE_BOOLEAN)) {
                $result .= $raw.';';
            }

            // приводим строку в нижний регистр
            $transformed = function_exists('mb_strtolower') ? mb_strtolower($raw) : strtolower($raw);

            // транслитерация с учетом правил и словаря
            $transformed = strtr($transformed, $yandex_dic + $custom_dic);

            $transformed = preg_replace("/[^0-9a-z-]/i", " ", $transformed); // заменяем пробелами недопустимые символы
            $transformed = preg_replace('/\s+/', ' ', $transformed);         // удаляем множественные пробелы
            $transformed = str_replace(" ", "-", $transformed);              // заменяем пробелы дифисами
            $transformed = trim($transformed, '-');                          // удаляем дифисы в начале и в конце строк

            $result .= $transformed . PHP_EOL;

        }

        return trim($result);

    }
}
