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
			<img src="<?php echo str_replace('news', 'pictures', $page['url']); ?>/img_1.jpg" width="360" height="230" />
		</figure>
		<p class="lead"><?php echo $page['description']; ?></p>
                <p><a target="_blank" href="<?php echo $page['url_ext']; ?>">/oo\</a></p>
		<p><?php echo nl2br($page['text']); ?></p>
<p><center></p>
<?php echo $page['url_frame']; ?>
		<p><a target="_blank" href="<?php echo $main_name; ?><?php echo $page['url_int']; ?>"><?php echo $page['teme_int']; ?></a></p>

<div class="comments" id="comments" style="text-align: left;">
	<div class="comments__head">Комментарии <span class="news__counter">1</span></div>
		<div class="comments__container" style="overflow-wrap: break-word; word-wrap: break-word; word-break: normal; line-break: auto; hyphens: manual;">
			<div class="comment  commentContainer " >
			         <div class="comment__info">
					<div class="comment__rating commentVoting">
			<a href="#arcommvoteneg-7854145" class="comment__rating-change negVoteLink">–</a>
			<span class="comment__rating-value posweight">+4</span>
			<a href="#arcommvotepos-7854145" class="comment__rating-change posVoteLink">+</a>
		                       </div>
					<span class="comment__author">freedom</span>,
				        <span class="comment__time">16:45, 13.07</span>
			         </div>
			<p class="comment__content">Люблю Белоруссию!</p>
			<a class="comment__answer-btn replyLink" href="#replycomment-7854145">Ответить</a>
		        </div>
	        </div>
		<div id="endcomments" style="margin: 0 0 30px 0;">&nbsp;</div>
		<div class="addedCommentPlaceholder" id="addedCommentPlaceholder" style="display:none;">
			<h3>Ваш комментарий добавлен и появится здесь после модерации</h3>
		</div>

		<div class="commentVoteSuccessMsgPlaceholder" id="commentVoteSuccessMsgPlaceholder" style="display:none;">
			Вы проголосовали		</div>

		<div class="commentVoteErrorMsgPlaceholder" id="commentVoteErrorMsgPlaceholder" style="display:none;">
                   </div>



		<div class="commentFormContainer" id="commentformcontainer">

			<div class="comments__head">Написать комментарий
				<button type="button" id="commentFormClose" class="icon-cancel" style="float: right; display: none;"></button>
			</div>

			<div class="comments__write">
				<input type="hidden" name="c"    value="arcomm">
				<input type="hidden" name="i" value="256251">
				<input type="hidden" name="p"   value="1">
				<input type="hidden" name="c2"   value="araddcom">
				<input type="hidden" id="comment_ari"                      value="256251">
				<input type="hidden" id="comment_cmi"                      value="0">

				<div class="comments__input is-marked">
				<i class="icon-comment"></i>
					<label for="in_author">Имя</label>
					<input type="text" name="in_author" id="in_author" maxlength="20">
				</div>
				<div class="comments__input">
					<label for="in_email">E-mail</label>
					<input type="text" name="in_email" id="in_email"  maxlength="30">
					<span class="comments__info-text">E-mail не будет опубликован</span>
				</div>
				<div class="comments__input">
					<label for="in_comment">Комментарий</label>
					<textarea name="in_comment" id="in_comment" cols="" rows="10" maxlength="1000"></textarea>
					<button class="comments__submit" id="commentFormSubmit">Отправить</button>
					<span class="comments__info-text"><b></b></span>
				</div>
			</div>
		</div>

		<div id="commentFormProgressPanel" style="display:none; position: absolute; top:0; left:0; background-color: #F6F6F6;"> </div>
		<img border="0" title="Loading..." alt="" src="/images/ajax-loader.gif" id="progressimage" style="display:none; position: absolute; margin:0; padding:0; border:0;"/>
</div>
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

	<div class="comments__head">




	</div>

</div>