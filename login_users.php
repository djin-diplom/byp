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
            $url_avatar = '/pictures/avatars/'.$login;
            $id_user = time();
            $insert_com = "REPLACE INTO $Name_database.$table_users (`login`, `pass`,`adm`, `url_avatar`,`id_user`) 
	VALUES ('$login','$pass',$аdm,'$url_avatar',$id_user)";
            $result_user = mysqli_query($link, $insert_com);
            if ($result_user == 'true'){
                //echo "Информация занесена в базу данных";
            }else{
                echo "Информация не занесена в базу данных";
            }
            $com_form = true; // пускаем делать комменты с новым логином
        } else { // такой логин уже есть, нужно проверить пароль
            $select_users = "SELECT * FROM $Name_database.$table_users WHERE pass = '$pass' AND login = '$login' ";
            $res_users = mysqli_query($link, $select_users);
            $row_users = mysqli_fetch_array($res_users);
            if (empty($row_users[0])) $com_form = false;//выборка пустая - пароль оказался неверным. Не пускаем делать комменты
            else $com_form = true; // пускаем делать комменты
        }

    } else $com_form = false;//случай, когда переменная пост пустая - не пускаем делать комменты
} else $com_form = true;//true; //сессия полная - пускаем делать комменты





