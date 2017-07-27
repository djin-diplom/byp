<?php


//откуда будем парсить информацию
//$ParserPage = 'https://news.tut.by/rss/all.rss';

//require_once("file_xml/sput.php");
//$ParserPage = $sput;



$url_mass_url = array();
$url_mass_titles = array();
$url_mass_description = array();
$url_mass_img = array();
$url_mass_texts = array();
$all_count = array();

for($j = 0; $j < 4; $j++) {
    $mainContent = file_get_contents($ParserPage);
    $contentTitle = $mainContent;

    $i = 0;
    $k = 0;
    while (true) {
        $contentTitle = $mainContent;
        switch($j) {
            case 0:
                if ($i == 0) {
                    $StartWord = "<pubDate>";
                    $EndWord = "</pubDate>";
                } else {
                    $StartWord = "<title>";
                    $EndWord = "</title>";
                }
                break;
            case 1:
                if ($i == 0) {
                    $StartWord = "<pubDate>";
                    $EndWord = "</pubDate>";
                } else {
                    $StartWord = "<link>";
                    $EndWord = "</link>";
                }
                break;

            case 2:
                $StartWord = "<description>";
                $EndWord = "</description>";
                break;
            case 3:
                if ($i == 0){
                    $StartWord = '<language>';
                    $EndWord = '</language>';
                } else {
                    $StartWord = '<enclosure url="';
                    $EndWord = '" ';
                }
                break;
        }
        $LengthWord = 0;
// Определяем позицию строки, до которой нужно все отрезать
        $pos = strpos($contentTitle, $StartWord);
        if ($pos === false) break;


//Отрезаем все, что идет до нужной нам позиции
        $contentTitle = substr($contentTitle, $pos);

        $pos_2 = strpos($contentTitle, $EndWord);
        $mainContent = substr($contentTitle, $pos_2);

        //echo '<br>'.$ParserPage.'<br>';

// Точно таким же образом находим позицию конечной строки
        $pos = strpos($contentTitle, $EndWord);

// Отрезаем нужное количество символов от нулевого
        $contentTitle = substr($contentTitle, $LengthWord, $pos);

//если в тексте встречается текст, который нам не нужен, вырезаем его
        //$contentTitle = str_replace('entry-content clearfix">', '', $contentTitle);
$contentTitle = str_replace('<link>','', $contentTitle);
        $contentTitle = str_replace('<title>','', $contentTitle);
        $contentTitle = str_replace('<description><![CDATA[','', $contentTitle);
        //$contentTitle = str_replace('Информационный портал Русь молодая','', $contentTitle);
        //$contentTitle = str_replace('впервые появилась','', $contentTitle);
        //$contentTitle = str_replace('Запись ','', $contentTitle);
        //$contentTitle = str_replace('  ','', $contentTitle);
        $contentTitle = str_replace('<enclosure url="','', $contentTitle);
//$contentTitle = str_replace('<title','', $contentTitle);
//$contentTitle = str_replace('<','', $contentTitle);
//$contentTitle = stripslashes($contentTitle);
//$contentTitle = htmlspecialchars($contentTitle);

// выводим спарсенный текст.
        //echo $contentTitle;
        if($i != 0) {
            switch ($j) {
                case 0:
                    $select = "SELECT COUNT(*) FROM $Name_database.$table WHERE `teme` = '$contentTitle'";
                    $res = mysqli_query($link, $select);
                    $row = mysqli_fetch_row($res);
                    $all_count[$i] = $row[0]; // всего записей по выборке
                    //echo $all_count;

                    if ($all_count[$i] == 0) {
                        $k++;
                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$contentTitle);
                        $url_mass_titles[$k] = $contentTitle;
                    }

                    break;
                case 1:
                    if ($all_count[$i] == 0) {
                        $k++;

                        $url_mass_url[$k] = str_replace(' ', '', trim($contentTitle));
                        $temp_url = $url_mass_url[$k];
                        // Определяем позицию строки <p>, до которой нужно все отрезать
                        $text_temp_2 = strip_tags(parser_page($temp_url, "article_body", "</div>"), '<p><img><frame><figure><figcaption><h1><h2><h3><strong><table><tbody><tr><td>');
                        $pos_text = strpos($text_temp_2, '<p>');
                        $text_temp_2 = substr($text_temp_2, $pos_text);
                        $text_temp_2 = str_replace('px', '', $text_temp_2);
                        $text_temp_2 = str_replace('style', '', $text_temp_2);
                        $text_temp_2 = str_replace('width', '', $text_temp_2);
                        $text_temp_2 = str_replace('height', '', $text_temp_2);
                        $text_temp_2 = str_replace('</figure>', '</figure></br>', $text_temp_2);
                        $text_temp_2 = str_replace('Читайте также:', '', $text_temp_2);
                        $text_temp_2 = str_replace('Читайте также', '', $text_temp_2);
                        $text_temp_2 = str_replace('FINANCE.', '', $text_temp_2);
                        $url_mass_texts[$k] = str_replace('TUT.BY', 'BYPolit.org', $text_temp_2);
                        //$url_mass_img[$i] = parser_page($contentTitle, "featured-image", "class=");
                    }
                    break;

                case 2:
                    if ($all_count[$i] == 0) {
                        $k++;
                        $contentTitle = str_replace('&#x3C;','<',$contentTitle);
                        $contentTitle = str_replace('/&#x3E;','>',$contentTitle);
                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$contentTitle);
                        $url_mass_description[$k] = strip_tags($contentTitle, '<p>');
                    }
                    break;
                case 3:
                    if ($all_count[$i] == 0) {
                        $k++;
                        $url_mass_img[$k] = $contentTitle;
                    }
                    break;
            }
        } else {
            $url_mass_url[0] = '';
            $url_mass_texts[0] = '';
            $url_mass_img[0] = '';
            $url_mass_titles[0] = '';
            $url_mass_description[0] = '';
        }
        $i++;
        if ($k == 6 ) break;

    }
}

$total_parse = $k + 1;
//echo $total_parse;

print_r($url_mass_url);
print_r($url_mass_titles);
print_r($url_mass_description);
//print_r($url_mass_img);
//print_r($url_mass_texts);


for($k = 1; $k < $total_parse; $k++) {

    $datetime = date("Y-m-d H:i:s",strtotime("+".($k*20+$hours*60)." minutes"));
    $id = time()+($k);
    $datetime_mass_1 = explode(' ', $datetime);
    $datetime_mass_2 = explode('-', $datetime_mass_1[0]);
    $year = $datetime_mass_2[0].'-2';
    $month = $datetime_mass_2[1];
    $day = $datetime_mass_2[2];
    $comments = 0;
    $teme = $url_mass_titles[$k];
$url = '/news/'.$year.'/'.$month.'/'.$day.'/'.$id.'/';
$url = $url.translate_into_english($teme).'/';
$description = $url_mass_description[$k];
$razdel = 'news_latest';
$text = $url_mass_texts[$k];
$text = transform_img($text, $url);
$keys = $keys_temp;
$url_ext = 'https://www.tut.by';
$url_frame = '';

    $temp_time_ogr = '2017-01-25 20:12:53';
    $select_rand = "SELECT COUNT(*) FROM $Name_database.$table WHERE `datetime` > '$temp_time_ogr' ";
    $res_rand = mysqli_query($link, $select_rand);
    $row_rand = mysqli_fetch_row($res_rand);
    $all_count_temp_1 = $row_rand[0] - 70; // всего записей по выборке

    $nomer_zap = rand(0,$all_count_temp_1);

    $select_rand = "SELECT * FROM $Name_database.$table WHERE `datetime` > '$temp_time_ogr' LIMIT $nomer_zap, 1";

   //$select_rand = "SELECT * FROM $Name_database.$table WHERE `datetime` > '$temp_time_ogr' ORDER BY RAND() LIMIT 1";
    $res_rand = mysqli_query($link, $select_rand);
    $row_rand = mysqli_fetch_array($res_rand);

    $url_int = $row_rand['url'];
    $teme_int = $row_rand['teme'];



    $insert = "INSERT INTO $Name_database.$table (`id`, `datetime`, `teme`, `description`, `razdel`, `url`, `comments`, `text`, `keys`, `url_ext`, `url_frame`, `url_int`, `teme_int`) 
	VALUES ($id,'$datetime','$teme','$description','$razdel','$url',$comments,'$text','$keys','$url_ext','$url_frame','$url_int','$teme_int')";


    $result = mysqli_query($link, $insert);
    if ($result = 'true') {
        //echo "Информация занесена в базу данных";
    } else {
        echo "Информация не занесена в базу данных";
    }

    $url_mass = explode('/', $url);
    if (!empty($url_mass[6])) $chpu_url = "/" . $url_mass[6];
    else $url_mass[6] = '';
    $url_pic = "pictures/" . $url_mass[2] . "/" . $url_mass[3] . "/" . $url_mass[4] . "/" . $url_mass[5] . $chpu_url;

    @mkdir("pictures/" . $url_mass[2], 0755);
    @mkdir("pictures/" . $url_mass[2] . "/" . $url_mass[3], 0755);
    @mkdir("pictures/" . $url_mass[2] . "/" . $url_mass[3] . "/" . $url_mass[4], 0755);
    @mkdir("pictures/" . $url_mass[2] . "/" . $url_mass[3] . "/" . $url_mass[4] . "/" . $id, 0755);
    @mkdir($url_pic, 0755);

    $url_pic_site = str_replace(' ', '', $url_mass_img[$k]);
    $url_pic_site = trim($url_pic_site);
    $url_pic = "./pictures/" . $url_mass[2] . "/" . $url_mass[3] . "/" . $url_mass[4] . "/" . $url_mass[5] . $chpu_url;

    $url_pic_temp = $url_pic;

    $url_pic = $url_pic . '/img_1.jpg';

    file_put_contents($url_pic, file_get_contents($url_pic_site));

    $filename_sq = $url_pic_temp."/";
    $filename1_sq = $filename_sq.'img_1.jpg';
    //echo $filename1;
    $filename2_sq = $filename_sq.'img_1_2.jpg';
    //echo $filename2;
    $image_smoll_sq =  imagecreatefromjpeg($filename1_sq);
    imagejpeg($image_smoll_sq, $filename2_sq, 10);


}