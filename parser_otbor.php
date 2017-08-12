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
    <form method="POST" action="<?php echo $main_name; ?>/parser_otbor.php">
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

    for($i = 0; $i < $_POST['post_1']; $i++){
        if(!empty($_POST['checkbox_'.$i])){
            echo $_POST['title_'.$i].'<br>';
            echo $_POST['link_'.$i].'<br>';
            echo $_POST['description_'.$i].'<br>';
            echo $_POST['img_'.$i].'<br>';
        }
    }
}
