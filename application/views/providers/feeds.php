
<h2><?php echo $title; ?></h2>

<div class="wrapper">
    <div id="navigation">
        <div class="find_feed"><input type="text" name="find_feed" /></div>
        <div class="update"><button>업데이트</button></div>
    </div>

    <div id="find_feed_list"></div>
    <div class="feed_list">
        <?php
        foreach($feeds as $feed):
            $obj_feed = (object) $feed;
            ?>
            <div>
                <a href="<?php echo $obj_feed->url; ?>"><?php echo text_cut_utf8($obj_feed->title, 70); ?></a>
                <span><?php echo $obj_feed->pubDate?></span>
                <p><?php echo text_cut_utf8($obj_feed->description, 200); ?></p>
            </div>
        <?php
        endforeach;
        ?>

    </div>
    <div id="loadmoreajaxloader">로딩중</div>
</div>
