<?php

$select = "SELECT * FROM $Name_database.$table ";
$res = mysqli_query($link, $select);
$i = 0;
while($row = mysqli_fetch_array($res))
{
	$datetime = $row["datetime"];//date("Y-m-d H:i:s");
	$id = $row["id"];//time();
	//$datetime_mass_1 = explode ( ' ', $datetime);
	//$datetime_mass_2 = explode ( '-', $datetime_mass_1[0]);
	//$year = $datetime_mass_2[0];
	//$month = $datetime_mass_2[1];
	//$day = $datetime_mass_2[2];
	$comments = $row['comments'];


	$teme = $row["teme"];
	$url = $row["url"];
	//if ($_POST["chpu_url_switch"] == 1 ) $url = $url.translate_into_english($_POST['teme']).'/';
	$description = $row["description"];
	$razdel = $row["razdel"];
	$text_temp_2 = $row["text"];
	//$text_temp_2 = str_replace('px', '', $text_temp_2);
	//$text_temp_2 = str_replace('style', '', $text_temp_2);
	//$text_temp_2 = str_replace('width', '', $text_temp_2);
	//$text_temp_2 = str_replace('height', '', $text_temp_2);
	//$text_temp_2 = str_replace('</figure>', '</figure></br>', $text_temp_2);
	$text_temp_2 = str_replace('Читайте также:', '', $text_temp_2);
	$text_temp_2 = str_replace('Читайте также', '', $text_temp_2);
	$text_temp_2 = str_replace('FINANCE.', '', $text_temp_2);
	$text = $text_temp_2;
	//$text = transform_img($text,$url);
	$keys = $row["keys"];
	$url_ext = $row["url_ext"];
	$url_frame = $row["url_frame"];
	$url_int = $row["url_int"];
	$teme_int = $row["teme_int"];

	$insert = "REPLACE INTO $Name_database.$table (`id`, `datetime`, `teme`, `description`, `razdel`, `url`, `comments`, `text`, `keys`, `url_ext`, `url_frame`, `url_int`, `teme_int`) 
	VALUES ($id,'$datetime','$teme','$description','$razdel','$url',$comments,'$text','$keys','$url_ext','$url_frame','$url_int','$teme_int')";

	$result = mysqli_query($link, $insert);
	if ($result = 'true'){
		$i++;
		echo $i."  Информация занесена в базу данных  ";
	}else{
		echo "Информация не занесена в базу данных";
	}
}



/*
$select = "SELECT * FROM $Name_database.$table ";
$res = mysqli_query($link, $select);

while($row = mysqli_fetch_array($res))
{
	$filename = str_replace('/news', 'pictures', $row['url']);
	$filename1 = $filename.'img_1.jpg';
	echo $filename1;
	$filename2 = $filename.'img_1_2.jpg';
	echo $filename2;
	$image_smoll =  imagecreatefromjpeg($filename1);
	imagejpeg($image_smoll, $filename2, 5);
}

*/

//$filename11 = 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_1.jpg';

//$image_smoll = imagejpeg($image_smoll, 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_2.jpg',10);

