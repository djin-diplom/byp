<?php


require_once __DIR__ . '/facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '1709130946060030', //Замените на ваш id приложения
	'app_secret' => 'b0d1a8d3ede167168e69577c315f0762' //Ваш секрет приложения
]);

$helper = $fb->getRedirectLoginHelper();

try {

	$accessToken = $helper->getAccessToken();
	echo $accessToken;

}

catch(Facebook\Exceptions\FacebookResponseException $e) {

	echo 'Graph вернул ошибку: ' . $e->getMessage();
	//exit;

}

catch(Facebook\Exceptions\FacebookSDKException $e) {

	echo 'Facebook SDK вернул ошибку: ' . $e->getMessage();
	exit;

}

if (isset($accessToken))
	echo $accessToken;//$_SESSION['facebook_access_token'] = (string) $accessToken;

elseif ($helper->getError()){
	echo 'Ошибка';
	exit;
}

//echo $_SESSION['facebook_access_token'];

/*
try {

	$response = $fb->get('/1202925035?fields=access_token', $_SESSION['facebook_access_token']);

}

catch (Facebook\Exceptions\FacebookResponseException $e) {

	echo 'Graph вернул ошибку: ' . $e->getMessage();
	exit;

}

catch (Facebook\Exceptions\FacebookSDKException $e) {

	echo 'Facebook SDK вернул ошибку: ' . $e->getMessage();
	exit;

}

//Токен страницы
echo $response->getGraphNode()['access_token'];

$facebook_access_token = 'AQBfy1WJuHjMZh_KKpEZT5jXb7Lh81-W9E6-lLnuMrOcZYExoqcCygM-fGvUZW7W0y--vlkKkorpL2Ebtd_ioAY3NVAjZu3N79buSPiNj_dH37r60mjxhfpx5eLdkQfo4HUsX4ALwmEzUBYZ_dkALEjRpyJWUgGYpRGulLUzk6a7qLDkOp5yIslEE_YUGgIdLB5rdCUhCpseq1xq3XodvgTBruginjhg0TcHcsKMPdHa_hPw3hb-ZNp8tSvf77PdJ0ehrKQ0aQ1S9U0YNa6USOZLcC0CDXiJOLwflozif0wjz2FgjpFf_LmEc5Z557eLGvA';

$str_page = '/1202925035/feed';

$feed = array('message' => 'тест');

try {

	$response = $fb->post($str_page, $feed, $facebook_access_token);

}

catch (Facebook\Exceptions\FacebookResponseException $e) {

	echo 'Graph вернул ошибку: ' . $e->getMessage();
	exit;

}

catch (Facebook\Exceptions\FacebookSDKException $e) {

	echo 'Facebook SDK вернул ошибку: ' . $e->getMessage();
	exit;

}

$graphNode = $response->getGraphNode();

echo 'Опубликовано, id: ' . $graphNode['id'];

*/