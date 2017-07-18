<?php



if (!isset($_SESSION['login'])) { // сессия пустая - значит это либо пустой вход, либо новый пользователь

    if (!empty($_POST['login'])) {// проверяем, есть ли такой пользователь вообще в базе данных
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $select_users = "SELECT * FROM $Name_database.$table_users WHERE login = '$login' ";
        $res_users = mysqli_query($link, $select_users);
        $row_users = mysqli_fetch_array($res_users);
        if (empty($row_users[0])) {//такого логина еще нет, можно добавить его в базу данных и запомнить в сессии
            $аdm = 0;
            $url_avatar = '/pictures/avatars/'.$login.'/';
            $id_user = time();
            $insert_com = "REPLACE INTO $Name_database.$table_users (`login`, `pass`,`adm`, `url_avatar`,`id_user`) 
	VALUES ('$login','$pass',$аdm,'$url_avatar',$id_user)";
            $result_user = mysqli_query($link, $insert_com);
            if ($result_user == 'true'){
                //echo "Информация занесена в базу данных";
            }else{
                echo "Информация не занесена в базу данных";
            }
            $_SESSION['pass'] = $pass;
            $_SESSION['login'] = $login;
            $com_form = true; // пускаем делать комменты с новым логином и запущенной сессией
        } else { // такой логин уже есть, нужно проверить пароль
            $select_users = "SELECT * FROM $Name_database.$table_users WHERE pass = '$pass' AND login = '$login' ";
            $res_users = mysqli_query($link, $select_users);
            $row_users = mysqli_fetch_array($res_users);
            if (empty($row_users[0])) $com_form = false;//выборка пустая - пароль оказался неверным. Не пускаем делать комменты
            else {// пускаем делать комменты и заносим в сессию
                $com_form = true;
                $_SESSION['pass'] = $pass;
                $_SESSION['login'] = $login;
            }
        }

    } else $com_form = false;//случай, когда переменная пост пустая - не пускаем делать комменты
} else $com_form = true;//true; //сессия полная - пускаем делать комменты



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



if (!empty($_POST['text_com'])) { //добавление комментариев


    $id_com = time();
    $text_com = $_POST['text_com'];
    $login = $_SESSION['login'];
    $id_news = $page['id'];
    $datetime_com = date("Y-m-d H:i:s");

    $insert_com = "REPLACE INTO $Name_database.$table_comments (`id_com`, `text_com`,`login`, `id_news`,`datetime_com`) 
	VALUES ($id_com,'$text_com','$login',$id_news,'$datetime_com')";
    $result_user = mysqli_query($link, $insert_com);
    
    if ($result_user = 'true'){

        $page_id = $page['id'];
        $insert_comments = "UPDATE $Name_database.$table SET comments=$total_comments WHERE id = $page_id ";
        $res_comments = mysqli_query($link, $insert_comments);
        if ($res_comments = 'true'){

        }else{
            echo "Информация не занесена в базу данных";
        }
        header('Location: '.$main_name.$page['url']);
    }else{
        echo "Информация не занесена в базу данных";
    }


}


