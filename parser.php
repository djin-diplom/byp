<?php
set_time_limit(0);

function otbor_parse($string, $StartWord, $EndWord)
{
    $LengthWord = 0;
// Определяем позицию строки, до которой нужно все отрезать
    $pos = strpos($string, $StartWord);
    //if ($pos === false) return '';
//Отрезаем все, что идет до нужной нам позиции <item>
    $string = substr($string, $pos);
// Точно таким же образом находим позицию конечной строки
    $pos = strpos($string, $EndWord);
    //if ($pos === false) return '';
// Отрезаем нужное количество символов от нулевого
    $string = substr($string, $LengthWord, $pos);
    $string = str_replace($StartWord, '', $string);//получили
    return $string;
}

$ParserPage = 'https://news.tut.by/rss/all.rss'; //мир, Белоруссия, Россия

$parse_file = "parser_tut_by.php";

$name_parse = "parse";
$keys_temp = 'мир, Белоруссия, Россия, политика, экономика';

if (empty($_POST['hours'])) {
    ?>
<form method="POST" enctype="multipart/form-data" action="<?php echo $main_name; ?>/<?php echo $name_parse; ?>">
    <input type="text" name="hours" value="0"><br>
    <input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Отправить парсинг c задержкой (ввести интервал задержки в часах)"/>
</form>
<?php
} else $hours = $_POST['hours'];

$table ='news';
$table_link ='link';



//require_once("parse_all.php");
require_once("parser_otbor.php");