
<h2><?php echo $title; ?></h2>

<div class="wrapper">
    <div class="provider_list">
        <?php
        foreach($providers as $provider):
            $obj_provider = (object) $provider;
            ?>
        <div>
            <a href="<?php echo $obj_provider->url; ?>"><?php echo $obj_provider->name; ?></a>
        </div>
        <?php
        endforeach;
        ?>

    </div>
</div>