<?php
session_start();

require_once __DIR__ . '/facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '1709130946060030', //Замените на ваш id приложения
	'app_secret' => 'b0d1a8d3ede167168e69577c315f0762' //Ваш секрет приложения
]);

$facebook_access_token = 'EAAYScg7qHv4BAFUjUwfNd5E1VZAkYU7Dn68AwDywSdR8uE83Whd2lJSZBZAcWdWrB2KxwngM5GkrMzCyqazeHwUWuBhBXWlUWI1s6RmYDINGla83od2Qm5ucGLZBZCr9jnIi6ZCLyx5TLrAA05EqrQQPsNt2Uglivr0JRlplZBNLAZDZD';

$str_page = '/10211410447675884/feed';

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

