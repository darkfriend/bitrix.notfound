<?php
/**
 * Created by PhpStorm.
 * User: darkfriend <hi@darkfriend.ru>
 * Date: 31.05.2020
 * Time: 21:25
 */
IncludeModuleLangFile(__LINE__);
$APPLICATION->RestartBuffer();
?>
<style type="text/css">
    <?= file_get_contents(__DIR__.'/style.css'); ?>
</style>

<div class="face">
    <div class="band">
        <div class="red"></div>
        <div class="white"></div>
        <div class="blue"></div>
    </div>
    <div class="eyes"></div>
    <div class="dimples"></div>
    <div class="mouth"></div>
</div>

<h1><?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TITLE')?></h1>
<div class="btn_wrapper">
    <a href="/" class="btn">
        <?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TO_MAIN')?>
    </a>
</div>
<?php die(); ?>