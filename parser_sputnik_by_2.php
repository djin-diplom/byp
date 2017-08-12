<?php



$url_mass_url[$i] = $_POST['link_'.$k];
$text_temp_2 = file_get_contents($url_mass_url[$i]);
                        $text_temp_2 = otbor_parse($text_temp_2, "©", "b-banner");
                        $text_temp_2 = str_replace('©','', $text_temp_2);
                        $pos_feed_1 = strpos($text_temp_2, '<div class="b-inject');
                        $contentTitle_feed_1 = substr($text_temp_2, 0, $pos_feed_1);
                        $pos_feed_2 = strpos($text_temp_2, '<div class="b-inject');
                        $contentTitle_feed_2 = substr($text_temp_2, $pos_feed_2);
                        $pos_feed_2 = strpos($contentTitle_feed_2, '</div></div></p>');
                        $contentTitle_feed_2 = substr($contentTitle_feed_2, $pos_feed_2);
                        $text_temp_2 = $contentTitle_feed_1.'</p><br>'.$contentTitle_feed_2;


                        $text_temp_2 = strip_tags($text_temp_2, '<p><img><frame><figure><figcaption><h1><h2><h3><strong><table><tbody><tr><td>');
                        $pos_text = strpos($text_temp_2, '<p>');
                        $text_temp_2 = substr($text_temp_2, $pos_text);
                        $text_temp_2 = str_replace('px', '', $text_temp_2);
                        $text_temp_2 = str_replace('style', '', $text_temp_2);
                        $text_temp_2 = str_replace('width', '', $text_temp_2);
                        $text_temp_2 = str_replace('height', '', $text_temp_2);
                        $text_temp_2 = str_replace('</figure>', '</figure></br>', $text_temp_2);
                        $text_temp_2 = str_replace('Читайте также:', '', $text_temp_2);
                        $text_temp_2 = str_replace('Читайте также', '', $text_temp_2);
                        $text_temp_2 = str_replace('FINANCE.', '', $text_temp_2);
                        $url_mass_texts[$i] = str_replace('Sputnik','BYPolit.org', $text_temp_2);
      
                        $contentTitle = str_replace('Sputnik','BYPolit.org',$_POST['title_'.$k]);
                        $url_mass_titles[$i] = $contentTitle;

                        $contentTitle = str_replace('Sputnik','BYPolit.org',$_POST['description_'.$k]);
                        $url_mass_description[$i] = strip_tags($contentTitle, '<p>');

                        $url_mass_texts[$i] = str_replace('<p>'.$url_mass_description[$i].'</p>','',$url_mass_texts[$i]);
   
                        $url_mass_img[$i] = $_POST['img_'.$k];
