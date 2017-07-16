<div class="l-main">
   <article class="article" style="margin-top:0px;">
		<header class="article__header">
			<h1><?php echo $page['teme']; ?></h1>
			<a href="<?php echo $main_name; ?><?php echo $page['url']; ?>" class="news__counter"><?php echo $page['comments']; ?></a>
			<ul class="article__info">
			    <li><?php echo $page['datetime']; ?></li>
<li><span class="news__views"><?php echo rand(50, 3650);?><i class="icon-eye"></i></span></li>	
			</ul>
		</header>
		<figure class="article__left article__photo">
			<img src="<?php echo str_replace('news', 'pictures', $page['url']); ?>/img_1.jpg"  />
		</figure>
		<p class="lead"><?php echo $page['description']; ?></p>
                <p><a target="_blank" href="<?php echo $page['url_ext']; ?>">/oo\</a></p>
		<p><?php echo nl2br($page['text']); ?></p>
<p><center></p>
<?php echo $page['url_frame']; ?>
		<p><a target="_blank" href="<?php echo $main_name; ?><?php echo $page['url_int']; ?>"><?php echo $page['teme_int']; ?></a></p>


</article>


	
   <div class="article__footer last-news-mk">
	<h3 class="title" style="cursor: pointer;">основные события</h3>
	<span class="news__counter news__counter_square"  style="cursor: pointer; display: none;"></span>
	<ul class="article__footer-news-list show-news-mk">

	  <?php for($count = 0 ; $count <$total; $count++): ?>
		<li>
			<a href="<?php echo $main_name; ?><?php echo $news_latest[$count]['url']; ?>"  >
				<span class="news__time"><?php echo $news_latest[$count]['datetime']; ?></span>
				<strong class="news__title"><?php echo $news_latest[$count]['teme']; ?></strong>
			</a>
		</li>
	  <?php   endfor ?>	 
	</ul>

	<ul class="uploaded-news-mk" style="display:none;">
	</ul>
</div>

		

</div>