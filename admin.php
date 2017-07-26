<?php 





if (!empty($_POST['teme'])){
	
	$datetime = $_POST["datetime"];//date("Y-m-d H:i:s");
    $id = $_POST["id"];//time();
	$datetime_mass_1 = explode ( ' ', $datetime);
	$datetime_mass_2 = explode ( '-', $datetime_mass_1[0]);
	$year = $datetime_mass_2[0];
	$month = $datetime_mass_2[1];
	$day = $datetime_mass_2[2];
    $comments = 0;
	$teme = $_POST["teme"];
	$url = $_POST["url"];
	if ($_POST["chpu_url_switch"] == 1 ) $url = $url.translate_into_english($_POST['teme']).'/';
	$description = $_POST["description"];
	$razdel = $_POST["razdel"];
	$text = $_POST["text"];
	$text = transform_img($text,$url);
	$keys = $_POST["keys"];
$url_ext = $_POST["url_ext"];
$url_frame = $_POST["url_frame"];
$url_int = $_POST["url_int"];
$teme_int = $_POST["teme_int"];
	
	$insert = "REPLACE INTO $Name_database.$table (`id`, `datetime`, `teme`, `description`, `razdel`, `url`, `comments`, `text`, `keys`, `url_ext`, `url_frame`, `url_int`, `teme_int`) 
	VALUES ($id,'$datetime','$teme','$description','$razdel','$url',$comments,'$text','$keys','$url_ext','$url_frame','$url_int','$teme_int')";
	
	$result = mysqli_query($link, $insert);
	if ($result = 'true'){
       //echo "Информация занесена в базу данных";
    }else{
    echo "Информация не занесена в базу данных";
	}
	
	//echo '<br>';
	//print_r($_FILES);
	//Для загрузки файлов
	if($_FILES['filename']['size'] > 1024*1024)
    {
    echo ("Размер файла превышает 1 мегабайт");
    exit;
    }
	if($_FILES['filename_2']['size'] > 1024*1024)
    {
    echo ("Размер файла превышает 1 мегабайт");
    exit;
    }
	if($_FILES['filename_3']['size'] > 1024*1024)
	{
		echo ("Размер файла превышает 1 мегабайт");
		exit;
	}
	if($_FILES['filename_4']['size'] > 1024*1024)
	{
		echo ("Размер файла превышает 1 мегабайт");
		exit;
	}
	if($_FILES['filename_5']['size'] > 1024*1024)
	{
		echo ("Размер файла превышает 1 мегабайт");
		exit;
	}

    // Проверяем загружен ли файл
	$url_mass = explode ( '/', $url);
	if (!empty($url_mass[6])) $chpu_url ="/".$url_mass[6];
	else $url_mass[6] = '';
	$url_pic = "pictures/".$url_mass[2]."/".$url_mass[3]."/".$url_mass[4]."/".$url_mass[5].$chpu_url;
    if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
    {
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
	// Создаем папки
	@mkdir("pictures/".$url_mass[2], 0755);
	@mkdir("pictures/".$url_mass[2]."/".$url_mass[3], 0755);
	@mkdir("pictures/".$url_mass[2]."/".$url_mass[3]."/".$url_mass[4], 0755);
	@mkdir("pictures/".$url_mass[2]."/".$url_mass[3]."/".$url_mass[4]."/".$id, 0755);
	@mkdir($url_pic, 0755);
    move_uploaded_file($_FILES["filename"]["tmp_name"], $url_pic."/img_1.jpg");
		$filename_sq = $url_pic."/";
		$filename1_sq = $filename_sq.'img_1.jpg';
		//echo $filename1;
		$filename2_sq = $filename_sq.'img_1_2.jpg';
		//echo $filename2;
		$image_smoll_sq =  imagecreatefromjpeg($filename1_sq);
		imagejpeg($image_smoll_sq, $filename2_sq, 10);
    }
	if(is_uploaded_file($_FILES["filename_2"]["tmp_name"]))
	{
		move_uploaded_file($_FILES["filename_2"]["tmp_name"], $url_pic."/img_2.jpg");
	}
	if(is_uploaded_file($_FILES["filename_3"]["tmp_name"]))
	{
		move_uploaded_file($_FILES["filename_3"]["tmp_name"], $url_pic."/img_3.jpg");
	}
	if(is_uploaded_file($_FILES["filename_4"]["tmp_name"]))
	{
		move_uploaded_file($_FILES["filename_4"]["tmp_name"], $url_pic."/img_4.jpg");
	}
	if(is_uploaded_file($_FILES["filename_5"]["tmp_name"]))
	{
		move_uploaded_file($_FILES["filename_5"]["tmp_name"], $url_pic."/img_5.jpg");
	}
}
if(@$_POST["post_vk"] == 1) require_once('vk.php');

?>


<br><br>
<?php
if (!empty($_POST['datetime_del'])){
	
	$sel_2 = $_POST['datetime_del'];

$delete = "DELETE FROM $Name_database.$table WHERE datetime = '$sel_2'";
$res = mysqli_query($link, $delete);

}

?>

<br>

<?php
if (!empty($_POST['datetime_re'])){
	
$sel_1 = $_POST['datetime_re'];

$select = "SELECT * FROM $Name_database.$table WHERE datetime = '$sel_1' ";
$res = mysqli_query($link, $select);

	$row = mysqli_fetch_array($res);
	
	$datetime = $row['datetime'];
    $id = $row['id'];
    $url = $row['url'];
    $comments = $row['comments'];
	$teme = $row['teme'];
	$chpu_url_switch = 0;
	$description = $row['description'];
	$razdel = $row["razdel"];
	$text = $row["text"];
	$keys = $row["keys"];
    $url_ext = $row["url_ext"];
    $url_frame = $row["url_frame"];
    $url_int = $row["url_int"];
    $teme_int = $row["teme_int"];
	$post_vk = 0;

} else {
	$datetime = date("Y-m-d H:i:s");
    $id = time();
	$datetime_mass_1 = explode ( ' ', $datetime);
	$datetime_mass_2 = explode ( '-', $datetime_mass_1[0]);
	$year = $datetime_mass_2[0];
	$month = $datetime_mass_2[1];
	$day = $datetime_mass_2[2];
    $url = '/news/'.$year.'/'.$month.'/'.$day.'/'.$id.'/';
	$chpu_url_switch = 1;
    $comments = 0;
	$teme = 'Тема';
	$description = 'Описание';
	$razdel = '';
	$text = 'Текст';
	$keys = 'Ключи, через, запятую';
	$url_ext = 'https://vz.ru';
	$url_frame = '';
	$url_int = '/news/';
	$teme_int = 'Другие новости по этой теме.';
	$post_vk = 1;
}
?>

<h1>Панель администратора для добавления статей</h1>
<form method="POST" enctype="multipart/form-data" action="<?php echo $main_name; ?>/admin/<?php echo $keys_value; ?>/<?php echo $nomer_url; ?>">
        <textarea style="width:500px; height:50px; border: 1px solid #cccccc;" name="teme" type="text" ><?php echo $teme; ?></textarea><br>
		<textarea style="width:600px; height:50px; border: 1px solid #cccccc;" 
		name="description" type="text" ><?php echo $description; ?></textarea><br>
<textarea style="width:300px; height:25px; border: 1px solid #cccccc;" name="url_ext" type="text" ><?php echo $url_ext ?></textarea><br><br>
<p>&lt;a target="_blank" href="\news\...\"&gt;&lt;/a&gt;</p><br>
<?php 
echo '&lt;img_2img&gt;';?><br>

		<textarea style="width:800px; height:300px; border: 1px solid #cccccc;" name="text" type="text" ><?php echo $text ?></textarea><br>
<textarea style="width:600px; height:25px; border: 1px solid #cccccc;" name="url_frame" type="text" ><?php echo $url_frame ?></textarea><br>
<textarea style="width:600px; height:100px; border: 1px solid #cccccc;" name="teme_int" type="text" ><?php echo $teme_int ?></textarea><br>
<textarea style="width:600px; height:25px; border: 1px solid #cccccc;" name="url_int" type="text" ><?php echo $url_int ?></textarea><br>
		<textarea style="width:500px; height:50px; border: 1px solid #cccccc;" name="keys" type="text" ><?php echo $keys ?></textarea><br>
		<input type="hidden" name="chpu_url_switch" value="<?php echo $chpu_url_switch; ?>">
		
		<select style="width:300px; height:30px; border: 1px solid #cccccc;" name="razdel" type="text">
  <option <?php if ($razdel == 'news_latest') echo "selected"; ?> value="news_latest">Обычные новости</option>
  <option <?php if ($razdel == 'header') echo "selected"; ?> value="header">Шапка (3)</option>
   <option <?php if ($razdel == 'topnews') echo "selected"; ?> value="topnews">Главная (1)</option>
   <option <?php if ($razdel == 'toplist') echo "selected"; ?> value="toplist">Топ (4)</option>
   <option <?php if ($razdel == 'l-sidebar') echo "selected"; ?> value="l-sidebar">Мнение (4)</option>
</select><br><br>
<textarea style="width:200px; height:30px; border: 1px solid #cccccc;" 
		name="datetime" type="text" ><?php echo $datetime; ?></textarea><br>
		<textarea 	 name="id" type="text" ><?php echo $id; ?></textarea><br>
		<textarea style="width:600px; height:25px; border: 1px solid #cccccc;" name="url" type="text" ><?php echo $url; ?></textarea><br>
        <p>Добавить картинку (360х230, jpg, Главная)</p>
		<input type="hidden" name="MAX_FILE_SIZE" value="60005005360">
        <input type="file" name="filename"><br><br>
		<input type="file" name="filename_2"><br><br>
		<input type="file" name="filename_3"><br><br>
		<input type="file" name="filename_4"><br><br>
		<input type="file" name="filename_5"><br><br>
	<input type="hidden" name="post_vk" value="<?php echo $post_vk; ?>">
		<input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Отправить статью"/>
		<br><br>
</form>