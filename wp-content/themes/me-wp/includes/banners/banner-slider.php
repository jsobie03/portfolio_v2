<?php $slider_revolution_alias = me_wp_get_field('slider_revolution_alias'); ?>
<div class="home-slider">
    <?php if(function_exists('putRevSlider')){
        putRevSlider($slider_revolution_alias, $slider_revolution_alias);
    } ?>
</div>