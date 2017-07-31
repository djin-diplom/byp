<?php

$link = mysqli_connect(
	$name_server,
	$name_user,
	$password,
	$Name_database);
if (!$link) {
	printf("Ошибка в базе данных: %s\n", mysqli_connect_error());
	exit;
}

$table_users ='users';

$table_comments ='comments';

$table ='news';
$select = "SELECT * FROM $Name_database.$table WHERE razdel = 'toplist' AND datetime < '$datetime_site' ORDER BY datetime DESC LIMIT 4";
$res = mysqli_query($link, $select);

$i = 0;
while($row = mysqli_fetch_array($res))
{
	$toplist[$i]['datetime'] = $row['datetime'];
	$toplist[$i]['teme'] = $row['teme'];
	$toplist[$i]['comments'] = $row['comments'];
	$toplist[$i++]['url'] = $row['url'];
}

$select = "SELECT * FROM $Name_database.$table WHERE razdel = 'topnews' AND datetime < '$datetime_site' ORDER BY datetime DESC LIMIT 1";
$res = mysqli_query($link, $select);

$i = 0;
while($row = mysqli_fetch_array($res))
{
	$topnews[$i]['datetime'] = $row['datetime'];
	$topnews[$i]['teme'] = $row['teme'];
	$topnews[$i]['description'] = $row['description'];
	$topnews[$i]['comments'] = $row['comments'];
	$topnews[$i++]['url'] = $row['url'];
}

$select = "SELECT * FROM $Name_database.$table WHERE razdel = 'header' AND datetime < '$datetime_site' ORDER BY datetime DESC LIMIT 3";
$res = mysqli_query($link, $select);

$i = 0;
while($row = mysqli_fetch_array($res))
{
	$header[$i]['teme'] = $row['teme'];
	$header[$i++]['url'] = $row['url'];
}

$select = "SELECT * FROM $Name_database.$table WHERE razdel = 'l-sidebar' AND datetime < '$datetime_site' ORDER BY datetime DESC LIMIT 12";
$res = mysqli_query($link, $select);

$i = 0;
while($row = mysqli_fetch_array($res))
{
	$lsidebar[$i]['teme'] = $row['teme'];
	$lsidebar[$i]['description'] = $row['description'];
	$lsidebar[$i++]['url'] = $row['url'];
}