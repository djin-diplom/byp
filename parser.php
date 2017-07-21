<?php
//откуда будем парсить информацию
$mainContent = file_get_contents($ParserPage);
$contentTitle = $mainContent;
$StartWord = "<article";
$EndWord = "/article>";
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
//$contentTitle = str_replace('>','', $contentTitle);
//$contentTitle = str_replace('</h1','', $contentTitle);
//$contentTitle = str_replace('<title','', $contentTitle);
//$contentTitle = str_replace('<','', $contentTitle);
//$contentTitle = stripslashes($contentTitle);
//$contentTitle = htmlspecialchars($contentTitle);

// выводим спарсенный текст.
echo $contentTitle;

?>