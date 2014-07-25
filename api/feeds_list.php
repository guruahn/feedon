<?php
/**
 * Created by PhpStorm.
 * User: gongjam
 * Date: 14. 7. 25
 * Time: 오후 4:37
 */

require_once($_SERVER['DOCUMENT_ROOT']."/myfeed/common/config.php");
require_once(_BASE_PATH_."/myfeed/class/provider.class.php");
require_once(_BASE_PATH_."/myfeed/class/feed.class.php");

$feed = new Feed($db);

//feeds list
$orderby = Array(
    "pubDate" => "Desc"
);

$feeds = $feed->getList($orderby);