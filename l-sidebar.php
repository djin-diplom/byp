<div class="l-sidebar">
			<div class="">
			    <div style="margin: 0 0 10px 0;">
				    <div ></div>
				</div>
				<div class="b opinion">
				    <h3 class="title"><a href="<?php echo $main_name; ?>/topic/l-sidebar/10">Мысли вслух</a></h3>
					
					<?php for($count = 0 ; $count <4; $count++): ?>
					<a href="<?php echo $main_name; ?><?php echo $lsidebar[$count]['url']; ?>" class="opinion__item">
					    <div class="opinion__pic">
						    <img src="<?php echo str_replace('news', 'pictures', $lsidebar[$count]['url']); ?>/img_1.jpg" alt="<?php echo $lsidebar[$count]['teme']; ?>">
						</div>
						<div class="opinion__content"><strong class="news__title"><?php echo $lsidebar[$count]['teme']; ?></strong>
						    <span class="opinion__author"><?php echo $lsidebar[$count]['description']; ?></span>
						</div>
					</a>
					<?php   endfor ?>	
					
				</div>
				
						
						<div class="b subscription">
						    <h3 class="title">подписка</h3>
							<ul>
		                       <li><a class="icon-facebook-1" href="https://www.facebook.com/<?php echo $main_name_corot; ?>">facebook</a></li>
		                      <li><a class="icon-video" href="https://www.youtube.com/user/<?php echo $main_name_corot; ?>video">youtube</a></li>
		                       <li><a class="icon-twitter" href="https://twitter.com/<?php echo $main_name_corot; ?>">twitter</a></li>
		                        <li><a class="icon-vk" href="https://vk.com/<?php echo $main_name_corot; ?>">vkontakte</a></li>
		                       <li><a class="icon-odnoklassniki" href="https://ok.ru/<?php echo $main_name_corot; ?>">ok.ru</a></li>
		                           <li><a class="icon-gplus" href="https://google.com/+<?php echo $main_name_corot; ?>org_news/">gplus</a></li>
		                         <li><a class="icon-rss" href="<?php echo $main_name; ?>/ru/page/rss/">RSS</a></li>
	                        </ul>
                        </div>
						<div class="b subscription_mail">
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
                         </div>
			</div>
</div>