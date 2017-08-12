<?php

$ParserPage = 'https://news.tut.by/rss/all.rss'; //мир, Белоруссия, Россия

$parse_file = "parser_tut_by.php";

$name_parse = "parse";
set_time_limit(0);


$table ='news';
$table_link ='link';



//require_once("parse_all.php");
require_once("parser_otbor.php");