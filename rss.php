<?php $rss_file = '
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>
            '.$site_name.' :: Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск
        </title>
        <link>'.$main_name.'</link>
        <description>
            '.$site_name.' :: Новости Беларуси, Белорусские новости, Новости Белоруссии, News from Belarus
        </description>
        <image>
            <title>
                '.$site_name.' ?> :: Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск
            </title>
            <url>/img/metro.jpg</url>
            <link>'.$main_name.'</link>
            <description>
                '.$site_name.' :: Новости Беларуси, Белорусские новости, Новости Белоруссии, News from Belarus
            </description>
        </image>

        <language>ru</language>';

$n_l_t =  $news_latest[$i]['teme'];
$n_l_u = $news_latest[$i++]['url'];
$n_l_date = DateTime::createFromFormat('Y-m-d H:i:s', $news_latest[$i]["datetime"])->format(DateTime::RSS);
$n_l_des = $news_latest[$i]["description"];

        for($i = 0; $i < $total; $i++) {
$rss_file = $rss_file.'<item>
            <title>'.$n_l_t.'</title>
            <link>'.$main_name.$n_l_u.'</link>
            <category>news</category>
            <author/>
            <pubDate>'.$n_l_date.'</pubDate>
            <description>'.$n_l_des.'</description>
            <fulltext>
                <![CDATA[ ]]>
            </fulltext>
        </item>';
}

$rss_file = $rss_file.'</channel>
</rss>';

file_put_contents('rss.xml', $rss_file);

