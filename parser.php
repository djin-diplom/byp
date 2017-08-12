<?php
set_time_limit(0);

function otbor_parse($string, $StartWord, $EndWord)
{
    $LengthWord = 0;
// Определяем позицию строки, до которой нужно все отрезать
    $pos = strpos($string, $StartWord);
    if ($pos === false) return '';
//Отрезаем все, что идет до нужной нам позиции <item>
    $string = substr($string, $pos);
// Точно таким же образом находим позицию конечной строки
    $pos = strpos($string, $EndWord);
    if ($pos === false) return '';
// Отрезаем нужное количество символов от нулевого
    $string = substr($string, $LengthWord, $pos);
    $string = str_replace($StartWord, '', $string);//получили
    return $string;
}

$ParserPage = 'https://news.tut.by/rss/all.rss'; //мир, Белоруссия, Россия

$parse_file = "parser_tut_by.php";

$name_parse = "parse";
$keys_temp = 'мир, Белоруссия, Россия, политика, экономика';

$hours = 1;

$table ='news';
$table_link ='link';



//require_once("parse_all.php");
require_once("parser_otbor.php");