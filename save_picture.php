<?php

$select = "SELECT * FROM $Name_database.$table ";
$res = mysqli_query($link, $select);

while($row = mysqli_fetch_array($res))
{
	$filename = str_replace('/news', 'pictures', $row['url']);
	$filename1 = $filename.'img_1.jpg';
	echo $filename1;
	$filename2 = $filename.'img_2.jpg';
	echo $filename2;
	$image_smoll =  imagecreatefromjpeg($filename1);
	imagejpeg($image_smoll, $filename2, 5);
}

//$filename11 = 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_1.jpg';

//$image_smoll = imagejpeg($image_smoll, 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_2.jpg',10);

