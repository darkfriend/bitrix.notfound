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

<div class="blackhole_body">
    <div class="wrapper">
        <h1>Hmm.</h1>
        <p>It seems that you're lost in a perpetual black hole. Let us help guide you out and get you back home.</p>
        <div class="buttons">
            <a href="/">home</a>
        </div>
    </div>
    <div class="space">
        <div class="blackhole"></div>
        <div class="ship"></div>
    </div>
</div>
