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


        for($i = 0; $i < $total; $i++) {
$rss_file = $rss_file.'<item>
            <title>'.$news_latest[$i]["teme"].'</title>
            <link>'.$main_name.$news_latest[$i++]["url"].'</link>
            <category>news</category>
            <author/>
            <pubDate>'.DateTime::createFromFormat('Y-m-d H:i:s', $news_latest[$i]["datetime"])->format(DateTime::RSS).'</pubDate>
            <description>'.$news_latest[$i]["description"].'</description>
            <fulltext>
                <![CDATA[ ]]>
            </fulltext>
        </item>';
}

$rss_file = $rss_file.'</channel>
</rss>';

file_put_contents('rss.xml', $rss_file);

