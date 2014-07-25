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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="텐던시" />
	<title>피드리스트</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/superhero.css" rel="stylesheet" />
    <link href="css/bootswatch.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<div id="wrapper" class="container">
        <div class="bs-docs-section clearfix">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="navbar">My Feed</h1>
                    </div>
                    <div class="bs-component">
                        <div class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Home</a>
                            </div>
                            <div class="navbar-collapse collapse navbar-inverse-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Active</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">Dropdown header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left">
                                    <input type="text" name="q" class="form-control col-lg-8 find_feed" placeholder="feed search" />
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="update_feeds.php">Update</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
                    </div><!-- /example -->

                </div>
            </div>
        </div>

        <div id="content"></div>
		<div class="list-group">
				<?php
				if($feeds)
				{
					foreach($feeds as $item){
						$feed->setItem($item);
                ?>
                        <a href='<?php echo $feed->url; ?>' class='list-group-item' target='_blank'>
                            <h4 class='list-group-item-heading'><?php echo text_cut_utf8( $feed->title, 100 ); ?></h4>
                            <p class='list-group-item-text'>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        </a>

                <?php
					}//end foreach
				}
				else
				{
				?>
					<a href="" class='list-group-item' >피드가 없습니다.</a>
				<?php
                }//end if
                ?>
		</div><!--//.list-->
		<div id="footer">
			피드구독기 테스트버전 © Copyright 2014 tendency. All rights reserved.
		</div>
	</div><!--//#wrapper-->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootswatch.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/myfeed.js"></script>
</body>
</html>