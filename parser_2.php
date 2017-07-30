<?php

$ParserPage = 'http://rumol.org/feed/';

$mainContent = file_get_contents($ParserPage);

echo $mainContent;