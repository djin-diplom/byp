<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . '/facebook/autoload.php';

$fb = new Facebook\Facebook([
	  'app_id' => '1709130946060030', //Замените на ваш id приложения
	  'app_secret' => 'b0d1a8d3ede167168e69577c315f0762' //Ваш секрет приложения
	  ]);

	  $helper = $fb->getRedirectLoginHelper();

//Добавьте разрешение publish_actions, чтобы постить от имени пользователя, а не от имени страницы


$permissions = ['manage_pages','publish_pages'];

$url = 'https://bypolit.org/facebook_2.php';

$loginUrl = $helper->getLoginUrl($url, $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Вход</a>';

