<?php
//https://oauth.vk.com/blank.html#access_token=867dacadec5d54b85f0c391c488ce7cd2d09d24422dfc239513d685032d070a39c68a9f22d6dfd8692f16&expires_in=0&user_id=438721554
//код чувака require_once('../src/Vkontakte.php');

require_once('vkontakte.php');

$accessToken = '867dacadec5d54b85f0c391c488ce7cd2d09d24422dfc239513d685032d070a39c68a9f22d6dfd8692f16';
$vkAPI = new \BW\Vkontakte(['access_token' => $accessToken]);
$publicID = '150640109';

if ($vkAPI->postToPublic($publicID, $teme.'\n'.$description, $main_name.'/'.$url_pic.'/img_1.jpg', [$keys])) {//if ($vkAPI->postToPublic($publicID, $teme.'\n'.$description, getcwd().$url_pic.'/img_1.jpg', [$description])) {

echo "Ура! Всё работает, пост добавлен\n";

} else {

echo "Фейл, пост не добавлен(( ищите ошибку\n";
}