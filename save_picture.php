<?php
						//$filename11 = str_replace('news', 'pictures', $news_latest[$count]['url']).'/img_1.jpg';
						//echo $filename11;
						$filename11 = 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_1.jpg';
						$image_smoll =  imagecreatefromjpeg($filename11);
						$image_smoll = imagejpeg($image_smoll, 'pictures/2017-2/07/25/1500988669/dom-plyushkina-i-buduar-posredi-goroda-kakie-otzyvy-ostavlyayut-turisty-o-vitebskih-gostinicah/img_2.jpg',50);
						//echo $image_smoll;
