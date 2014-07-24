<?php
require_once($_SERVER['DOCUMENT_ROOT']."/myfeed/common/config.php");
require_once(_BASE_PATH_."/myfeed/class/provider.class.php");
require_once(_BASE_PATH_."/myfeed/class/feed.class.php");

$feed = new Feed($db);

//feeds list
$orderby = Array(
	"pubDate" => "Desc"
);
$feeds = $feed->getList($orderby);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="텐던시" />
	<meta name="viewport" content="width=1400">
	<title>피드리스트</title>
</head>
<body>
	<div id="wrapper">
		<div id="navigation">
			<a href="update_feeds.php" >피드 업데이트</a>
		</div>
		<div class="list">
			<ul>
				<?php
				if($feeds)
				{
					foreach($feeds as $item){
						$feed->setItem($item);
                        echo "<li>";
                        echo "<a href='".$feed->url."' target='_blank'>".text_cut_utf8( $feed->title, 100 )."</a>";
                        echo "</li>";
					}
				}
				else
				{
				?>
					<li>피드가 없습니다.</li>
				<?php }?>
			</ul>
		</div><!--//.list-->
		<div id="footer">
			피드구독기 테스트버전 © Copyright 2013 tendency. All rights reserved.
		</div>
	</div><!--//#wrapper-->
</body>