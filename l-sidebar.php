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
								<li><a class="twitter-timeline" href="https://twitter.com/BYPolit">Tweets by BYPolit</a>
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
								<iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F2379541508936868%2F&width=0&height=80&layout=standard&size=small&show_faces=true&appId" width="0" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							</li>
						</ul>


					<ul>
						<li><h1><a class="icon-rss" href="<?php echo $main_name; ?>/rss">RSS</a></h1></li>
					</ul>
					<ul>
						<link href="<?php echo $main_name; ?>/index_files/classic-081711.css" rel="stylesheet" type="text/css">
						<div id="mc_embed_signup">
							<form action="<?php echo $main_name ?>"
								  method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
								  class="validate" target="_blank" novalidate="novalidate">
								<div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<input placeholder="E-mail" name="EMAIL" class="required email" id="mce-EMAIL" aria-required="true" type="email">
									</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none: color:#777"></div>
									</div>
									<div style="position: absolute; left: -5000px;" aria-hidden="true">
										<input name="b_c7abb483574b173324169d1f0_429e5501fc" tabindex="-1" type="text">
									</div>
									<div class="clear">
										<input value="подписка" name="subscribe" id="mc-embedded-subscribe" class="button" type="submit">
									</div>
								</div>
							</form>
						</div>
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