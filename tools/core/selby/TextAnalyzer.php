<?php

namespace tools\core\selby;

class TextAnalyzer extends BaseTool
{
    const CYRILLIC_DICTIONARY   = 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя';
    const DIGIT_DICTIONARY      = '0..9';
    const ADDITIONAL_DICTIONARY = ''; 

    public function __construct($userData)
    {
        $this->input = trim($userData['input']);
        array_walk($userData['options'], function($value, $key) {
            $this->options[$key] = $value;
        });
    }

    public function getText()
    {
        return $this->input;
    }

    public function strlen()
    {
        $text = $this->input;
        return mb_strlen($text);
    }

    public function strlenNoSpaces()
    {
        $text = $this->input;
        $text = preg_replace('#\s#su', '', $text);
        return mb_strlen($text);
    }

    public function wordCount(bool $dump = false)
    {
        $text = $this->input;

        // rule 1:
        // заменить '_' на '-', т.к. слова типа str_replace должны считаться дним словом
        $text = str_replace('_', '-', $text);

        // rule 2:
        // заменить ' - ' на ' | ', т.к. функция str_word_count считает - как возможный символ слова
        $text = str_replace([' - ', ' ‒ '], ' | ', $text);

        // rule 3:
        // удаляем лишние символы
        $text = str_replace(['«', '»', '‒ ', '…'], '', $text);

        $charlist = self::CYRILLIC_DICTIONARY . self::DIGIT_DICTIONARY . self::ADDITIONAL_DICTIONARY;
        return str_word_count($text, 0, $charlist);
    }
}
