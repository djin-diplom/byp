<?php
if(empty($_POST['post_1'])) {

   


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
    <form method="POST" action="<?php echo $main_name; ?>/parse">
        <?php for ($i = 0; $i < $k; $i++): ?>
            <input type="checkbox" name="checkbox_<?php echo $i; ?>"><?php echo $content_title[$i]; ?><br>


            <textarea type="hidden" name="title_<?php echo $i; ?>"  ><?php echo $content_title[$i]; ?></textarea><br>
            <textarea type="hidden" name="link_<?php echo $i; ?>"  ><?php echo $content_link[$i] ?></textarea><br>
            <textarea type="hidden" name="description_<?php echo $i; ?>"  ><?php echo $content_description[$i]; ?></textarea><br>

            <textarea type="hidden" name="img_<?php echo $i; ?>"  ><?php echo $content_img[$i]; ?></textarea><br>

            <?php
        endfor;
        ?>
        <input type="hidden" name="post_1" value="<?php echo $k;?>">
        <input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Отправить данные"/>
    </form>

    <?php

} else {


    $url_mass_url = array();
    $url_mass_titles = array();
    $url_mass_description = array();
    $url_mass_img = array();
    $url_mass_texts = array();
    //$all_count = array();
    //$all_count_2 = array();

    $total_parse_all = $_POST['post_1'];
//echo $total_parse_all;


    $i = 0;
    for($k = 0; $k < $total_parse_all; $k++){
        //if(!empty($_POST['checkbox_'.$i])){
        //    echo $_POST['title_'.$i].'<br>';
        //    echo $_POST['link_'.$i].'<br>';
        //    echo $_POST['description_'.$i].'<br>';
        //    echo $_POST['img_'.$i].'<br><br><br>';
        //}
        if(!empty($_POST['checkbox_'.$k])) {
            //echo $_POST['checkbox_'.$k].$k.'<br>';
            // echo $_POST['title_'.$i].'<br>';
             // echo $_POST['link_'.$i].'<br>';
               //echo $_POST['description_'.$i].'<br>';
              // echo $_POST['img_'.$i].'<br><br><br>';
            require('parser_tut_by_2.php');
            $i++;
        }
    }
    $total_parse = $i;

    $url_ext = 'https://www.tut.by';
    
    require_once("parser_insert_news.php");
}
