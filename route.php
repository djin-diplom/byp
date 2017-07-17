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
	$page['id'] = $row['id];
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

$keys_name = 'keys';

switch($rubrika){
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
	if (!empty($nomer_url_mass[3]) and $nomer_url_mass[3] > 10) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = 10;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	$keys = translate_into_russian_pastnews($keys);
	}
	break;
	
	case 'pastnews': $keys_value = $nomer_url_mass[2];
	if ($nomer_url_mass[3] > 10) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = 10;
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
	if ($nomer_url_mass[3] > 10) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = 10;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	$keys = translate_into_russian($keys);
		
	break;
	case 'topic': $keys_name = 'razdel';
	$keys_value = $nomer_url_mass[2];
	if ($nomer_url_mass[3] > 10) $nomer_url = $nomer_url_mass[3];
	else $nomer_url = 10;
	if ($keys_value == 'empty') $keys = '';
	else $keys = $keys_value;
	break;
	
	case 'news': $rubrika = 'pastnews';
	$keys_value = 'empty';
	$keys = '';
	$nomer_url = 10;
	break;

        default: header('Location: '.$main_name.'/news/');
        break;
}
$nomer_url_2 = $nomer_url - 10;
$nomer_url_3 = $nomer_url + 10;


$select = "SELECT COUNT(*) FROM $Name_database.$table WHERE datetime < '$datetime_site' AND `$keys_name` LIKE '%$keys%'";
$res = mysqli_query($link, $select);
$row = mysqli_fetch_row($res);
$all_count = $row[0]; // всего записей по выборке

$select = "SELECT * FROM $Name_database.$table WHERE datetime < '$datetime_site' AND `$keys_name` LIKE '%$keys%' ORDER BY datetime DESC LIMIT $nomer_url_2, 10";
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