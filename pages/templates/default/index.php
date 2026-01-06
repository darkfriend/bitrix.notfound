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

<h1>404 Error Page</h1>
<section class="error-container">
    <span>4</span>
    <span><span class="screen-reader-text">0</span></span>
    <span>4</span>
</section>
<div class="link-container">
    <a target="_blank" href="/" class="more-link">
        <?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TO_MAIN')?>
    </a>
</div>
