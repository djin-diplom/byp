<?php

$id_news = $page['id'];

$select_comments = "SELECT * FROM $Name_database.$table_comments WHERE id_news = '$id_news' ORDER BY datetime_com DESC LIMIT 100";
$res_comments = mysqli_query($link, $select_comments);

$j = 0;
while($row = mysqli_fetch_array($res_comments))
{
    $comments[$j]['text_com'] = $row['text_com'];
    $comments[$j]['login'] = $row['login'];
    $comments[$j++]['datetime_com'] =  explode ( ' ', $row['datetime_com']);
}

$total_comments = $j;
