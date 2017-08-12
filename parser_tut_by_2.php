<?php
$url_mass_url[$i] = $_POST['link_'.$i];

$temp_url = $url_mass_url[$i];
$text_temp_2 = strip_tags(otbor_parse($temp_url, "article_body", "</div>"), '<p><img><frame><figure><figcaption><h1><h2><h3><strong><table><tbody><tr><td>');
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
                        $url_mass_texts[$i] = str_replace('TUT.BY', 'BYPolit.org', $text_temp_2);




                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$_POST['title_'.$i]);
                        $url_mass_titles[$i] = $contentTitle;



                        $contentTitle = str_replace('&#x3C;','<',$_POST['description_'.$i]);
                        $contentTitle = str_replace('/&#x3E;','>',$contentTitle);
                        $contentTitle = str_replace('TUT.BY', 'BYPolit.org',$contentTitle);
                        $contentTitle = str_replace('FINANCE.', '',$contentTitle);
                        $url_mass_description[$i] = strip_tags($contentTitle, '<p>');

                        $url_mass_img[$i] = $_POST['img_'.$i];