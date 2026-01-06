<?php
/**
 * Created by PhpStorm.
 * User: darkfriend <hi@darkfriend.ru>
 * Date: 31.05.2020
 * Time: 21:25
 */
IncludeModuleLangFile($notFoundFile);
?>
<style type="text/css">
    <?= file_get_contents(__DIR__.'/style.css'); ?>
</style>

<div class="ufo_wrapper">
    <div class="site">
        <div class="sketch">
            <div class="bee-sketch red"></div>
            <div class="bee-sketch blue"></div>
        </div>

        <h1>404: <small>Page Not Found</small></h1>
    </div>
</div>