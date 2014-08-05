<?php
$obj_feed = (object) $feed;
?>
<h2><?php echo $title; ?></h2>

<h3 class="feed-id-<?php echo $obj_feed->id; ?>">
    <a href="<?php echo $obj_feed->url; ?>" target="_blank"><?php echo $obj_feed->title; ?></a>
</h3>
<p class="pub-date"><?php echo $obj_feed->pubDate; ?></p>
<div class="content"><?php echo $obj_feed->description; ?></div>