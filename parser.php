<?php

//$ParserPage = 'https://news.tut.by/economics/552639.html#ua:main_news~2';

//$mainContent = file_get_contents($ParserPage);

//echo $mainContent;
set_time_limit(0);


//require_once("functions.php");



//$name_user = 'root';//база данных
//$Name_database = 'mymetro';
//$password = 'Usimov5031661';
//$name_server = 'localhost';


//$link = mysqli_connect(
//    $name_server,
//    $name_user,
//    $password,
//    $Name_database);
//if (!$link) {
//    printf("Ошибка в базе данных: %s\n", mysqli_connect_error());
//    exit;
//}

$table ='news';


function parser_page($url, $StartWord, $EndWord){

//откуда будем парсить информацию
//$ParserPage = 'http://rumol.org/blizkie-dali-neladno-v-dome-porugaj-soseda/';
    $ParserPage_feed = $url;

    $mainContent_feed = file_get_contents($ParserPage_feed);
    $contentTitle_feed = $mainContent_feed;
    $StartWord_feed = $StartWord;//"entry-content clearfix";
    $EndWord_feed = $EndWord;//"crp_related";
    $LengthWord_feed = 0;
// Определяем позицию строки, до которой нужно все отрезать
    $pos_feed = strpos($contentTitle_feed, $StartWord_feed);

//Отрезаем все, что идет до нужной нам позиции
    $contentTitle_feed = substr($contentTitle_feed, $pos_feed);

// Точно таким же образом находим позицию конечной строки
    $pos_feed = strpos($contentTitle_feed, $EndWord_feed);

// Отрезаем нужное количество символов от нулевого
    $contentTitle_feed = substr($contentTitle_feed, $LengthWord_feed, $pos_feed);

//если в тексте встречается текст, который нам не нужен, вырезаем его
    //$contentTitle_feed = str_replace('entry-content clearfix">','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('<div class="','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('featured-image">','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('src=','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('<img width="800" height="445"','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('©','', $contentTitle_feed);
    //$contentTitle_feed = str_replace('"','', $contentTitle_feed);
//$contentTitle = str_replace('</h1','', $contentTitle);
//$contentTitle = str_replace('<title','', $contentTitle);
//$contentTitle = str_replace('<','', $contentTitle);
//$contentTitle = stripslashes($contentTitle);
//$contentTitle = htmlspecialchars($contentTitle);

// выводим спарсенный текст.
    return $contentTitle_feed;

}

$timer = 0;
$keys_temp = 'мир, Белоруссия, Россия';
echo $keys_temp;
$ParserPage = 'https://news.tut.by/rss/world.rss'; //мир, Белоруссия, Россия
require ("parser_tut_by.php");

//$timer = 3;
//$keys_temp = 'политика';
//echo $keys_temp;
//$ParserPage = 'https://news.tut.by/rss/society.rss'; //политика, Белоруссия !!!!
//require ("parser_tut_by.php");


//$timer = 16;
$keys_temp = 'экономика, политика';
echo $keys_temp;
$ParserPage = 'https://news.tut.by/rss/economics.rss'; // экономика, Белоруссия
require ("parser_tut_by.php");


//$timer = 31;
$keys_temp = 'экономика, Белоруссия';
echo $keys_temp;
$ParserPage = 'https://news.tut.by/rss/finance.rss';//экономика, Белоруссия
require ("parser_tut_by.php");

//$timer = 12;
$keys_temp = 'наука, армия';
echo $keys_temp;
$ParserPage = 'https://news.tut.by/rss/it.rss';// наука, армия
require ("parser_tut_by.php");