<?php

$REQUEST_URI = $_SERVER['REQUEST_URI'];

$select = "SELECT * FROM $Name_database.$table WHERE url = '$REQUEST_URI' ";
$res = mysqli_query($link, $select);

$i = 0;
	$row = mysqli_fetch_array($res);
$route = false;	
if (empty($row)) {
	$route = true;
} else {
	$page['datetime'] = $row['datetime'];
	$page['teme'] = $row['teme'];
	$page['description'] = $row['description'];
	$page['comments'] = $row['comments'];
	$page['url'] = $row['url'];
	$page['text'] = $row['text'];
	$page['keys'] = $row['keys'];
	$page['id'] = $row['id'];
if ($row['url_ext'] == NULL) $page['url_ext'] = 'https://ria.ru/';
else $page['url_ext'] = $row['url_ext'];
if ($row['url_frame'] == NULL) $page['url_frame'] = '';
else $page['url_frame'] = '<p><iframe width="100%" height="360" src="'.$row['url_frame'].'" frameborder="0" allowfullscreen></iframe></p>';
if ($row['url_int'] == NULL) $page['url_int'] = '/news/';
else $page['url_int'] = $row['url_int'];
if ($row['teme_int'] == NULL) $page['teme_int'] = 'Смотрите другие новости по этой теме.';
else $page['teme_int'] = $row['teme_int'];
}

$admin = false;
//if ($REQUEST_URI == '/admin/622118') $admin = true;


$nomer_url_mass = explode ( '/', $REQUEST_URI);

$rubrika = $nomer_url_mass[1];

if (!empty($nomer_url_mass[2])) $news_year = $nomer_url_mass[2];
else $news_year = '2017-0';
$news_year_mass = explode ( '-', $news_year);
if (!empty($news_year_mass[1])) $news_year_2 = $news_year_mass[1];
else $news_year_2 = 0;




$keys_name = 'keys';

$number_of_pages = 50;//константа

$nomer = $number_of_pages;

$rss = 0;

switch($rubrika){
	case 'parse': require("parser.php");
		exit;
		break;
	case 'rss': $rss = 1;
		// //создаем файл rss.xml
		$nomer = 2*$number_of_pages;
		$rubrika = 'news';
		$keys_value = 'empty';
		$keys = '';
		$nomer_url = $number_of_pages;
		break;
	    case 'delete': unset($_SESSION['name']); // или $_SESSION = array() для очистки всех данных сессии
		session_destroy();
		header('Location: '.$main_name.'/admin');
        break;
	
        case 'robots.txt': require("robots.txt");
        exit;
        break;
		
        case 'sitemap.xml': require("sitemap.xml");
        exit;
        break;
		
	case 'admin': if(empty($_POST['pass']) and !isset($_SESSION['pass'])) {
		require("chek_form.php");
		exit;
	} else {
	require("chek_login.php");
		
		$admin = true;
	if (empty($nomer_url_mass[2])) $keys_value = 'empty';
	else $keys_value = $nomer_url_mass[2];
	if (!empty($nomer_url_mass[3]) and $nomer_url_mass[3] > $number_of_pages) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = $number_of_pages;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	$keys = translate_into_russian_pastnews($keys);
	}
	break;
	
	case 'pastnews': $keys_value = $nomer_url_mass[2];
	if ($nomer_url_mass[3] > $number_of_pages) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = $number_of_pages;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	$keys = translate_into_russian_pastnews($keys);
	break;
	
	case 'searchnews': 
	$keys_name = 'text';
	if (!empty($_POST['searchnews'])) {
		$keys_value = $_POST['searchnews'];
		$keys_value = translate_into_english($keys_value);
		if($nomer_url_mass[2] == 'empty') header("Location: ".$main_name."/searchnews/".$keys_value."/10");
	}
	else {
		$keys_value = $nomer_url_mass[2];
	}
	if ($nomer_url_mass[3] > $number_of_pages) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = $number_of_pages;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	$keys = translate_into_russian($keys);
		
	break;
	case 'topic': $keys_name = 'razdel';
	$keys_value = $nomer_url_mass[2];
	if ($nomer_url_mass[3] > $number_of_pages) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = $number_of_pages;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	break;
	
	case 'news': $rubrika = 'pastnews';
	$keys_value = 'empty';
	$keys = '';
	$nomer_url = $number_of_pages;
	break;

        default: header('Location: '.$main_name.'/news/');
        break;
}
$nomer_url_2 = $nomer_url - $number_of_pages;
$nomer_url_3 = $nomer_url + $number_of_pages;

if ($admin) $select = "SELECT COUNT(*) FROM $Name_database.$table WHERE `$keys_name` LIKE '%$keys%'";
else $select = "SELECT COUNT(*) FROM $Name_database.$table WHERE datetime > '2017-01-25 20:12:53' AND datetime < '$datetime_site' AND `$keys_name` LIKE '%$keys%'";
$res = mysqli_query($link, $select);
$row = mysqli_fetch_row($res);
$all_count = $row[0]; // всего записей по выборке


if ($admin) $select = "SELECT * FROM $Name_database.$table WHERE `$keys_name` LIKE '%$keys%' ORDER BY datetime DESC LIMIT $nomer_url_2, $nomer";
else $select = "SELECT * FROM $Name_database.$table WHERE datetime > '2017-01-25 20:12:53' AND datetime < '$datetime_site' AND `$keys_name` LIKE '%$keys%' ORDER BY datetime DESC LIMIT $nomer_url_2, $nomer";
$res = mysqli_query($link, $select);

//if ($nomer_url_2 == 0) $nomer_url_2 = 1;
if ($nomer_url > $all_count) $nomer_url = $all_count;

$keys_l_main = $keys;

$keys_value = translate_into_english($keys_value);

$i = 0;
while($row = mysqli_fetch_array($res))
{
	$news_latest[$i]['datetime'] = $row['datetime'];
	$news_latest[$i]['teme'] = $row['teme'];
	$news_latest[$i]['description'] = $row['description'];
	$news_latest[$i]['comments'] = $row['comments'];
	$news_latest[$i++]['url'] = $row['url'];
}
$total = $i;

if($rss == 1) {
	require("rss.php");
	header('Location: '.$main_name.'/rss.xml');
	//require("rss.xml");
	//echo $rss_file;
	exit;
}


