<?php
//https://oauth.vk.com/blank.html#access_token=867dacadec5d54b85f0c391c488ce7cd2d09d24422dfc239513d685032d070a39c68a9f22d6dfd8692f16&expires_in=0&user_id=438721554
//код чувака require_once('../src/Vkontakte.php');

require_once('vkontakte.php');

$accessToken = 'https://oauth.vk.com/blank.html#access_token=867dacadec5d54b85f0c391c488ce7cd2d09d24422dfc239513d685032d070a39c68a9f22d6dfd8692f16&expires_in=0&user_id=438721554';
$vkAPI = new \BW\Vkontakte(['access_token' => $accessToken]);
$publicID = 'bypolit';

if ($vkAPI->postToPublic($publicID, "Привет Хабр!", getcwd().'/habr.jpg', ['вконтакте api', 'автопостинг', 'первые шаги'])) {

echo "Ура! Всё работает, пост добавлен\n";

} else {

echo "Фейл, пост не добавлен(( ищите ошибку\n";
}