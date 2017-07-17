<?php

$id_news = $page['id'];

$select_comments = "SELECT * FROM $Name_database.$table_comments WHERE id_news = '$id_news' ORDER BY datetime_com DESC LIMIT 100";
$res_comments = mysqli_query($link, $select_comments);

$j = 0;
while($row = mysqli_fetch_array($res_comments))
{
    $comments[$j]['text_com'] = $row['text_com'];
    $comments[$j]['login'] = $row['login'];
    $comments[$j++]['datetime_com'] =  explode ( ' ', $row['datetime_com']);
}

$total_comments = $j;



if(empty($_POST['text_com']) and empty($_POST['pass']) and empty($_POST['login']) and !isset($_SESSION['pass']) and !isset($_SESSION['login'])) $com_form = 1;
else {
    require("chek_login.php");
    if (empty($row_users[0])) {
        //требуется создать нового пользователя и добавить коммент
        $com_form = 1;
        if (!empty($row_users[0])) $login_com = $row_users[0];
        else $login_com = '';
        if (!empty($row_users[1])) $password_com = $row_users[1];
        else $password_com = '';
        if (!empty($_POST['text_com'])) $text_com = $_POST['text_com'];
        else $text_com = '';
        $trebovanie = 'Что-то не так с логином или паролем!';
        $insert_com = "REPLACE INTO $Name_database.$table_users (`id_com`, `text_com`, `login`, `id_news`, `datetime_com` ) 
	VALUES ($id_com,'$text_com','$login',$id_news,'$datetime_com')";


    } else {
        //требуется создать новую новость и новый логин
        $_SESSION['pass'] = $pass;
        $_SESSION['login'] = $login;
        $id_com = time();
        $text_com = $_POST['text_com'];
        $id_news = $page['id'];
        $datetime_com = date("Y-m-d H:i:s");

        $insert_com = "REPLACE INTO $Name_database.$table_comments (`id_com`, `text_com`, `login`, `id_news`, `datetime_com` ) 
	VALUES ($id_com,'$text_com','$login',$id_news,'$datetime_com')";

        $result = mysqli_query($link, $insert);
        if ($result = 'true') {
            //echo "Информация занесена в базу данных";
        } else {
            echo "Информация не занесена в базу данных";
        }
    }
}