<?php
/*
============================================================================================
Filename: 
---------
config.php

Description: 
------------
공통으로 사용할 변수 및 상수를 정의하는 곳입니다.

Author:
-------
guruahn@gmail.com

License:
--------
This code (from TENDENCY) is made available free of charge with the rights to use,
copy, modify, merge, publish and distribute. This Software shall be used for Good, not Evil.

First Created on:
-----------------
July/021/2014

============================================================================================
*/
define ("_BASE_PATH_", $_SERVER['DOCUMENT_ROOT']);
require_once("MysqliDb.php");
require_once("functions.php");
$db = new MysqliDb('localhost', 'witinweb', 'wjddn2tmfrl', 'witinweb');

// XML filename from where details about RSS feed providers are read from.
define ("RSS_FEED_SOURCES_FILE_NAME", "rss_feed_sources.xml");
// Directory name where the feed results will be stored.
define ("RSS_FEED_RESULTS_DIRECTORY", "feed_results");
// Suffix part of the result file name. A 3 digit number will be
// prepended to this.
define ("RSS_FEED_RESULTS_FILE_NAME_SUFFIX", "_rss_feed_items.txt");
// File attribute.
define ("FILE_CREATE_WRITE_FLAG", "x");
// A newline character
define ("NEW_LINE", "\n");
// Label name for the feed provider sequence in the input file.
define ("FEED_PROVIDER_SEQUENCE_NUMBER", "Feed Provider Sequence Number: ");
// Label name for the feed provider l.
define ("RSS_FEED_PROVIDER_NAME", "RSS Feed Provider: ");
// Label name for the number of feeds received.
define ("RECEIVED_RSS_FEEDS_CNT", "Number of RSS feed items received: ");
// RSS feed item separator line.
define ("FEED_ITEM_SEPARATOR_LINE", 
	"==================================================================");
// Label name for feed item number
define ("FEED_ITEM_SEQUENCE_NUMBER", "Feed Item: ");
// Label name for Title
define ("FEED_ITEM_TITLE", "Title: ");
// Label name for URL
define ("FEED_ITEM_URL", "URL: ");
// Label name for Description
define ("FEED_ITEM_DESCRIPTION", "Description: ");