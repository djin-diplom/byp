<div class="l-main">
<br>
    <h3 class="title">Основные события (<?php if ($all_count != 0) echo ($nomer_url_2+1).'-'.$nomer_url.' всего '.$all_count; else echo 'Не обнаружено'; ?>) 
	<?php if ($keys_value != 'empty') echo '<br>Поиск по ключу: '.$keys_l_main?></h3>
	<div class="news news_latest">
		<ul>
		  <?php for($count = 0 ; $count <$total; $count++): ?>
		    <li>
			    <a href="<?php echo $main_name; ?><?php echo $news_latest[$count]['url']; ?>">
				<br>
				    <div class="news__pic">
					    <img src="<?php echo str_replace('news', 'pictures', $news_latest[$count]['url']); ?>/img_1.jpg" 
						alt="<?php echo $news_latest[$count]['teme']; ?>" />
					</div>
					<span class="news__time"><?php echo $news_latest[$count]['datetime']; ?></span>
					<strong class="news__title"><?php echo $news_latest[$count]['teme']; ?></strong>
			    </a>
				<p><?php echo $news_latest[$count]['description']; ?></p>
				<?php if ($admin): ?>	
			<form method="POST" enctype="multipart/form-data" action="<?php echo $main_name; ?>/admin/<?php echo $keys_value; ?>/<?php echo $nomer_url; ?>">
                <textarea style="visibility: hidden;" name="datetime_re" 
				type="text" ><?php echo $news_latest[$count]['datetime']; ?></textarea>
                <input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Изменить"/>
            </form>
			<form method="POST" enctype="multipart/form-data" action="<?php echo $main_name; ?>/admin/<?php echo $keys_value; ?>/<?php echo $nomer_url; ?>">
                <textarea style="visibility: hidden;" name="datetime_del" 
				type="text" ><?php echo $news_latest[$count]['datetime']; ?></textarea>
                <input style="width:200px; height:50px; border: 1px solid #cccccc;" type="submit" value="Удалить"/>
            </form>
			<?php endif; ?>
				
			</li>
		  <?php   endfor ?>		
		  
		</ul>
	</div>
	
	
	<div class="pagi 11 + 1 = 11 ">
	  <?php if($all_count > $nomer_url) : ?>
		<a class="btn btn_prev" href="<?php echo $main_name; ?>/<?php echo $rubrika; ?>/<?php echo $keys_value; ?>/<?php echo $nomer_url_3; ?>">
		    <i class="icon-left"></i>прошлое
		</a>
      <?php endif; ?>
	  <?php if($nomer_url_2 >= 10) : ?>
		<a class="btn btn_archive" href="<?php echo $main_name; ?>/<?php echo $rubrika; ?>/<?php echo $keys_value; ?>/<?php echo $nomer_url_2; ?>">
		    <i class="icon-calendar"></i>будущее
	    </a>
	  <?php endif; ?>
    </div>
</div>