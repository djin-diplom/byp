


	<!-- BEGIN header -->
	<header class="header">
		<div class="header__right">
			<a class="logo" href="<?php echo $main_name; ?>/news/"><?php echo $site_name; ?></a>
			   <span class="header__date"><?php echo date("Y-m-d H:i:s"); ?></span>
		</div>
		<div class="header__main">
			<div class="header__top">
			
				<form action="<?php echo $main_name; ?>/searchnews/empty/10" method="post" name="searchnews">
			
			<input class="header__top-item pda"  style=" background: #f6d654;" 
			value='Поиск' name='searchnews' type="submit" />
			<input class="header__top-item pda" style="width:200px; height:15px; border: 1px solid #cccccc;" 
		 name='searchnews' value='Введите слово'  />
			</form>
				
				<a class="header__top-item send-news" href="<?php echo $main_name; ?>/prepare-news/">Прислать новость</a>
                <a class="icon-search js-search-show"></a>
			</div>
			
			<ul class="header__topnews">
			    <?php for($count = 0 ; $count <3; $count++): ?>
        			<li class="header__topnews_multiline header__topnews_mid">
                        <a href="<?php echo $main_name; ?><?php echo $header[$count]['url']; ?>">
                            <img src="<?php echo str_replace('news', 'pictures', $header[$count]['url']); ?>/img_2.jpg" width="228" height="76" />
							<span><?php echo $header[$count]['teme']; ?></span>
                        </a>
                    </li>
				<?php   endfor ?>	
			</ul>
		</div>
	</header>
	<!-- END header -->