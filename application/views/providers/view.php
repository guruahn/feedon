<?php
$obj_provider = (object) $provider;
?>
<h2><?php echo $title; ?></h2>

<h3 class="feed-id-<?php echo $obj_provider->id; ?>">
    <a href="<?php echo $obj_provider->link; ?>" target="_blank"><?php echo $obj_provider->name; ?></a>
</h3>
<div class="content"><?php echo $obj_provider->description; ?></div>