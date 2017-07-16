<?php
setlocale(LC_TIME,"ru_RU.utf8");

function translate_into_english($s) {
$s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));	
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  return $s; // возвращаем результат
}

function translate_into_russian_service_1($string) {
$rus=array('Щ','щ');
$lat=array('SCH','sch');	
	$string = str_replace($lat, $rus, $string);	
	return $string;
}

function translate_into_russian_service_2($string) {
	$string = translate_into_russian_service_1($string);
$rus=array('Ж','Ч','Ш','Ю','Я','ж','ч','ш','ю','я');
$lat=array('GH','CH','SH','YU','YA','gh','ch','sh','yu','ya');	
	$string = str_replace($lat, $rus, $string);
	return $string;
}

function translate_into_russian($string) {
	$string = translate_into_russian_service_2($string);
$rus=array(' ','А','Б','В','Г','Д','Е','Ё','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ъ','Ы','Ь','Э','а','б','в','г','д','е','ё','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ъ','ы','ь','э',' ');
$lat=array('-','A','B','V','G','D','E','E','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','C','Y','Y','Y','E','a','b','v','g','d','e','e','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','y','y','y','e',' ');	
	$string = str_replace($lat, $rus, $string);
	return $string;
}


function translate_into_russian_pastnews($string) {
$rus=array('Белоруссия','Россия','Украина','Польша','Запад','Советский Союз','СНГ','Экономика','Политика','Сирия','Новороссия','Прибалтика','Мир','Интервью','Армия','Союзное государство России и Белоруссии','История','Религия','Наука','Русский язык','Агенты Запада','Ядерное оружие','ОДКБ','BYPolit.org');
$lat=array('belarus','russia','ukri','poland','west','ussr','cis','economy','policy','syria','novoros','baltic','world','interview','army','rusbel','history','religion','science','language','agent','nweapon','CSTO','site');	
	$string = str_replace($lat, $rus, $string);	
	return $string;
}

function transform_img($string,$url) {
	$url = str_replace('news', 'pictures', $url);
	$img=array('<img src="'.$url.'img_','.jpg" />');
	$zamena=array('<img_','img>');
	$string = str_replace($zamena, $img, $string);
	return $string;
}