<?php
/**
 * Created by PhpStorm.
 * User: gongjam
 * Date: 14. 7. 25
 * Time: 오후 5:38
 */
require_once($_SERVER['DOCUMENT_ROOT']."/myfeed/common/config.php");
require_once(_BASE_PATH_."/myfeed/class/provider.class.php");
require_once(_BASE_PATH_."/myfeed/class/feed.class.php");

$provider = new Provider($db);
$provider->name = $_REQUEST['name'];
$provider->url = $_REQUEST['feed_url'];

$result["result"] = $provider->insert();
echo json_encode($result);
//$result = $provider->insert();
