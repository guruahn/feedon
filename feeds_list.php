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
            피드검색<input type="text" name="q" class="find_feed" placeholder="rss주소나 키워드를 입력하세요"/>
		</div>
        <div id="content"></div>
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
			피드구독기 테스트버전 © Copyright 2014 tendency. All rights reserved.
		</div>
	</div><!--//#wrapper-->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.find_feed').keyup(function(){
                findFeeds($(this).val());
            });
        });
        google.load("feeds", "1");

        function findFeeds(query) {
            // Query for president feeds on cnn.com
            google.feeds.findFeeds(query, findDone);
        }

        function findDone(result) {
            // Make sure we didn't get an error.
            if (!result.error) {
                // Get content div
                console.log(result);
                var content = document.getElementById('content');
                var html = '';

                // Loop through the results and print out the title of the feed and link to
                // the url.
                for (var i = 0; i < result.entries.length; i++) {
                    var entry = result.entries[i];
                    html += '<p> <img src="http://www.google.com/s2/favicons?domain='+ entry.link +'" alt=""/> <a href="/feed/v1/' + entry.url + '" title="'+ entry.title +'">' + entry.title + '</a></p>';
                }
                content.innerHTML = html;
            }
        }

    </script>
</body>