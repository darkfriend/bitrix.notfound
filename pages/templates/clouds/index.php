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
<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class='c'>
    <div class='_404'>404</div>
    <hr>
    <div class='_1'>
        <?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TEMPLATE_CLOUD_TITLE')?>
    </div>
    <div class='_2'>
        <?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TEMPLATE_CLOUD_TITLE2')?>
    </div>
    <a class='btn' href='/'>
        <?=\Bitrix\Main\Localization\Loc::getMessage('DEV2FUN_NOTFOUND_TEMPLATE_CLOUD_TO_MAIN')?>
    </a>
</div>
<?php die(); ?>
