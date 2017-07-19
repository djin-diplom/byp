<rss version="2.0">
    <channel>
        <title>
            <?php echo $site_name; ?> :: Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск
        </title>
        <link><?php echo $main_name ?></link>
        <description>
            <?php echo $site_name; ?> :: Новости Беларуси, Белорусские новости, Новости Белоруссии, News from Belarus
        </description>
        <image>
            <title>
                <?php echo $site_name; ?> :: Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск
            </title>
            <url>/img/metro.jpg</url>
            <link><?php echo $main_name ?></link>
            <description>
                <?php echo $site_name; ?> :: Новости Беларуси, Белорусские новости, Новости Белоруссии, News from Belarus
            </description>
        </image>

        <language>ru</language>
        <?php for($i = 0; $i < $total; $i++): ?>
        <item>
            <title><?php echo $news_latest[$i]['teme']; ?></title>
            <link><?php echo $main_name.$news_latest[$i++]['url']; ?></link>
            <category>news</category>
            <author/>
            <pubDate><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $news_latest[$i]['datetime'])->format(DateTime::RSS); ?></pubDate>
            <description><?php echo $news_latest[$i]['description'] ?></description>
            <fulltext>
                <![CDATA[ ]]>
            </fulltext>
        </item>
        <?php endfor; ?>

    </channel>
</rss>