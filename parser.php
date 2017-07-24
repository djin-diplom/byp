<?php

$ParserPage = 'https://news.tut.by/economics/552639.html#ua:main_news~2';

$mainContent = file_get_contents($ParserPage);

echo $mainContent;