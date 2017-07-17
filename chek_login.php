<?php

if (!isset($_SESSION['pass'])) {
	$pass = $_POST['pass'];
	$login = $_POST['login'];
} else {
	$pass = $_SESSION['pass'];
	$login = $_SESSION['login'];
}

$select_users = "SELECT * FROM $Name_database.$table_users WHERE pass = '$pass' AND login = '$login' ";

$res_users = mysqli_query($link, $select_users);

$row_users = mysqli_fetch_array($res_users);

if (empty($row_users[2]) and $row_users[2] != 1) {//проверяем права доступа в $row_users[2]
	session_destroy();
	header('Location: '.$main_name.'/admin');
}
else {
	echo "<a href='/delete'>Выйти из учетной записи $login</a>";
	$_SESSION['pass'] = $pass;
	$_SESSION['login'] = $login;
}

