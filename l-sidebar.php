<div class="l-sidebar">
			<div class="">
			    <div style="margin: 0 0 10px 0;">
				    <div ></div>
				</div>
				<div class="b opinion">
				    <h3 class="title"><a href="<?php echo $main_name; ?>/topic/l-sidebar/10">Рупор правды</a></h3>



					<?php for($count = 0 ; $count <4; $count++): ?>
					<a href="<?php echo $main_name; ?><?php echo $lsidebar[$count]['url']; ?>" class="opinion__item">
					    <div class="opinion__pic">
						    <img src="<?php echo str_replace('news', 'pictures', $lsidebar[$count]['url']); ?>/img_1_2.jpg"
								 alt="<?php echo $lsidebar[$count]['teme']; ?>" width="120" height="76">
						</div>
						<div class="opinion__content"><strong class="news__title"><?php echo $lsidebar[$count]['teme']; ?></strong>
						    <span class="opinion__author"><?php echo $lsidebar[$count]['description']; ?></span>
						</div>
					</a>
					<?php   endfor ?>	
					
				</div>
				
						
						<div class="b subscription">


							<ul>
								<li><script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>

									<!-- VK Widget -->
									<div id="vk_groups"></div>
									<script type="text/javascript">
										VK.Widgets.Group("vk_groups", {mode: 1}, 150640109);
									</script>
								</li>
							</ul>
							<ul>
								<li><a class="twitter-timeline" href="https://twitter.com/BYPolit"  width="240" height="700"
									   data-chrome="nofooter" lang="ru">Tweets by BYPolit</a>
									<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</li>
							</ul>

                        </div>

				<div class="b opinion">


					<?php for($count = 4 ; $count <8; $count++): ?>
						<a href="<?php echo $main_name; ?><?php echo $lsidebar[$count]['url']; ?>" class="opinion__item">
							<div class="opinion__pic">
								<img src="<?php echo str_replace('news', 'pictures', $lsidebar[$count]['url']); ?>/img_1_2.jpg"
									 alt="<?php echo $lsidebar[$count]['teme']; ?>" width="120" height="76">
							</div>
							<div class="opinion__content"><strong class="news__title"><?php echo $lsidebar[$count]['teme']; ?></strong>
								<span class="opinion__author"><?php echo $lsidebar[$count]['description']; ?></span>
							</div>
						</a>
					<?php   endfor ?>

				</div>
				<div class="b subscription">

						<ul>
							<li>

								<div class="fb-follow" data-href="https://www.facebook.com/BYPolit.org" data-layout="button_count" data-size="large" data-show-faces="true"></div>
							</li>
						</ul>


					<ul>
						<li><h1><a class="icon-rss" href="<?php echo $main_name; ?>/rss">RSS</a></h1></li>
					</ul>
					
				</div>
				<div class="b opinion">


					<?php for($count = 8 ; $count <12; $count++): ?>
						<a href="<?php echo $main_name; ?><?php echo $lsidebar[$count]['url']; ?>" class="opinion__item">
							<div class="opinion__pic">
								<img src="<?php echo str_replace('news', 'pictures', $lsidebar[$count]['url']); ?>/img_1_2.jpg"
									 alt="<?php echo $lsidebar[$count]['teme']; ?>" width="120" height="76">
							</div>
							<div class="opinion__content"><strong class="news__title"><?php echo $lsidebar[$count]['teme']; ?></strong>
								<span class="opinion__author"><?php echo $lsidebar[$count]['description']; ?></span>
							</div>
						</a>
					<?php   endfor ?>

				</div>

			</div>
</div>