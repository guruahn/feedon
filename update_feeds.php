<?php
require_once($_SERVER['DOCUMENT_ROOT']."/myfeed/common/config.php");
require_once(_BASE_PATH_."/myfeed/class/provider.class.php");
require_once(_BASE_PATH_."/myfeed/class/feed.class.php");

$provider = new Provider($db);
$providers = $provider->getList();

$feed = new Feed($db);

$updated_count = 0;
foreach($providers as $item)
{
	$count = $feed->updateFeeds($item);
	if(is_numeric($count)) $updated_count = $updated_count + $count;
}

ErrorMsg("총 ".$updated_count."개를 업데이트 했습니다.", $url = "feeds_list.php");