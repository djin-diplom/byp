<?php
$url_mass_url[$k] = $_POST['link_'.$k];

$temp_url = $url_mass_url[$k];
$text_temp_2 = strip_tags(parser_page($temp_url, "article_body", "</div>"), '<p><img><frame><figure><figcaption><h1><h2><h3><strong><table><tbody><tr><td>');
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
                        $url_mass_texts[$k] = str_replace('TUT.BY', 'BYPolit.org', $text_temp_2);




                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$_POST['title_'.$k]);
                        $url_mass_titles[$k] = $contentTitle;



                        $contentTitle = str_replace('&#x3C;','<',$_POST['description_'.$k]);
                        $contentTitle = str_replace('/&#x3E;','>',$contentTitle);
                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$contentTitle);
                        $contentTitle = str_replace('FINANCE.', '',$contentTitle);
                        $url_mass_description[$k] = strip_tags($contentTitle, '<p>');

                        $url_mass_img[$k] = $_POST['img_'.$k];