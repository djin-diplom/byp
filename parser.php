<?php
set_time_limit(0);
//require_once ('functions.php');

$ParserPage = 'https://news.tut.by/rss/all.rss'; //мир, Белоруссия, Россия

$parse_file = "parser_tut_by.php";

$name_parse = "parse";
$keys_temp = 'мир, Белоруссия, Россия, политика, экономика';

$hours = 1;

$table ='news';
$table_link ='link';



//require_once("parse_all.php");
require_once("parser_otbor.php");