﻿<?php

//откуда будем парсить информацию
//$ParserPage = 'http://rumol.org/blizkie-dali-neladno-v-dome-porugaj-soseda/';
$ParserPage = 'http://rumol.org/feed/';

$mainContent = file_get_contents($ParserPage);

$contentTitle = 2;

$url_mass = array();

$i = 0;
while(!empty($contentTitle)) {

	$contentTitle = $mainContent;
	$StartWord = "<link>";
	$EndWord = "</link>";
	$LengthWord = 0;
// Определяем позицию строки, до которой нужно все отрезать
	//$contentTitle = substr($contentTitle, $pos_2);
	$pos = strpos($contentTitle, $StartWord);


//Отрезаем все, что идет до нужной нам позиции
	$contentTitle = substr($contentTitle, $pos);

	$mainContent = substr($contentTitle, $pos +1);

	//echo '<br>'.$ParserPage.'<br>';

// Точно таким же образом находим позицию конечной строки
	$pos = strpos($contentTitle, $EndWord);

// Отрезаем нужное количество символов от нулевого
	$contentTitle = substr($contentTitle, $LengthWord, $pos);

//если в тексте встречается текст, который нам не нужен, вырезаем его
	$contentTitle = str_replace('entry-content clearfix">', '', $contentTitle);
//$contentTitle = str_replace('</h1','', $contentTitle);
//$contentTitle = str_replace('<title','', $contentTitle);
//$contentTitle = str_replace('<','', $contentTitle);
//$contentTitle = stripslashes($contentTitle);
//$contentTitle = htmlspecialchars($contentTitle);

// выводим спарсенный текст.
	//echo $contentTitle;
	$url_mass[$i++] = $contentTitle;
}

print_r($url_mass);



/*

//откуда будем парсить информацию
//$ParserPage = 'http://rumol.org/blizkie-dali-neladno-v-dome-porugaj-soseda/';
$ParserPage = 'http://rumol.org/poroshenko-podpisal-zakon-pro-zapret-georgievskoj-lenty-na-ukraine/';

$mainContent = file_get_contents($ParserPage);
$contentTitle = $mainContent;
$StartWord = "entry-content clearfix";
$EndWord = "<div";
$LengthWord = 0;
// Определяем позицию строки, до которой нужно все отрезать
$pos = strpos($contentTitle, $StartWord);

//Отрезаем все, что идет до нужной нам позиции
$contentTitle = substr($contentTitle, $pos);

// Точно таким же образом находим позицию конечной строки
$pos = strpos($contentTitle, $EndWord);

// Отрезаем нужное количество символов от нулевого
$contentTitle = substr($contentTitle, $LengthWord, $pos);

//если в тексте встречается текст, который нам не нужен, вырезаем его
$contentTitle = str_replace('entry-content clearfix">','', $contentTitle);
//$contentTitle = str_replace('</h1','', $contentTitle);
//$contentTitle = str_replace('<title','', $contentTitle);
//$contentTitle = str_replace('<','', $contentTitle);
//$contentTitle = stripslashes($contentTitle);
//$contentTitle = htmlspecialchars($contentTitle);

// выводим спарсенный текст.
//echo $contentTitle;
*/
?>