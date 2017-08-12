<?php
if(empty($_POST['post_1'])) {

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


    $mainContent = file_get_contents($ParserPage);

    $otbor = array();

    $mainContent_parser = '';


    $k = 0;
    for ($i = 0; ; $i++) {
        $content = $mainContent;
        $StartWord = "<item>";
        $EndWord = "</item>";

        $pos = strpos($mainContent, $StartWord);
        if ($pos === false) break;
        $mainContent = substr($mainContent, $pos);
        $pos = strpos($mainContent, $EndWord);
        $mainContent = substr($mainContent, $pos); //сохранили в $mainContent обрезку original до </item>

        $content = otbor_parse($content, $StartWord, $EndWord); //i-й обрезок от item до /item

        //Получаем link
        $StartWord = "<link>";
        $EndWord = "</link>";
        $content_link_temp = otbor_parse($content, $StartWord, $EndWord);
        $content_link_temp = str_replace(' ', '', trim($content_link_temp));

        $select = "SELECT COUNT(*) FROM $Name_database.$table_link WHERE `url` = '$content_link_temp'";
        $res = mysqli_query($link, $select);
        $row = mysqli_fetch_row($res);
        $all_count = $row[0]; // всего записей по выборке 0 или 1

        if ($all_count == 0) {
            $content_link[$k] = $content_link_temp;

            //$id = time() + ($i);
           // $insert = "INSERT INTO $Name_database.$table_link (`id`, `url`) VALUES ($id,'$content_link_temp')";
           // $result = mysqli_query($link, $insert);
          //  if ($result = 'true') {
          //      //echo "Информация занесена в базу данных";
          //  } else {
           //     echo "Информация не занесена в базу данных";
          //  }

            //Получаем title
            $StartWord = "<title>";
            $EndWord = "</title>";
            $content_title[$k] = otbor_parse($content, $StartWord, $EndWord);//получили title

            //Получаем description
            $StartWord = "<description>";
            $EndWord = "</description>";
            $content_description[$k] = otbor_parse($content, $StartWord, $EndWord);//получили description


            //Получаем img
            $StartWord = '<enclosure url="';
            $EndWord = '" ';
            $content_img[$k] = otbor_parse($content, $StartWord, $EndWord);//получили img

            $k++;

        }
        if ($k == 4 ) break;
    }

    ?>
    <form method="POST" action="<?php echo $main_name; ?>/parser.php">
        <?php for ($i = 0; $i < $k; $i++): ?>
            <input type="checkbox" name="checkbox_<?php echo $i; ?>"><?php echo $content_title[$i]; ?><br>
            <input type="hidden" name="title_<?php echo $i; ?>" value="<?php echo $content_title[$i]; ?>">
            <input type="hidden" name="link_<?php echo $i; ?>" value="<?php echo $content_link[$i] ?>">
            <input type="hidden" name="description_<?php echo $i; ?>" value="<?php echo $content_description[$i]; ?>">
            <input type="hidden" name="img_<?php echo $i; ?>" value="<?php echo $content_img[$i]; ?>">
            <?php
        endfor;
        ?>
        <input type="hidden" name="post_1" value="<?php echo $k;?>">
        <input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Отправить данные"/>
    </form>

    <?php

} else {


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
        $contentTitle_feed = str_replace('©','', $contentTitle_feed);

// выводим спарсенный текст.
        return $contentTitle_feed;

    }

    $url_mass_url = array();
    $url_mass_titles = array();
    $url_mass_description = array();
    $url_mass_img = array();
    $url_mass_texts = array();
    //$all_count = array();
    //$all_count_2 = array();

    $total_parse = $_POST['post_1'];

    for($k = 0; $k < $total_parse; $k++){
        //if(!empty($_POST['checkbox_'.$i])){
        //    echo $_POST['title_'.$i].'<br>';
        //    echo $_POST['link_'.$i].'<br>';
        //    echo $_POST['description_'.$i].'<br>';
        //    echo $_POST['img_'.$i].'<br><br><br>';
        //}
        require_once ('parser_tut_by_2.php');
    }

    $url_ext = 'https://www.tut.by';


    require_once("parser_insert_news.php");
}
