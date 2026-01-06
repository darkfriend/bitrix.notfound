<?php
/**
 * Created by PhpStorm.
 * User: darkfriend <hi@darkfriend.ru>
 * Date: 31.05.2020
 * Time: 21:25
 */
IncludeModuleLangFile($notFoundFile);
$APPLICATION->RestartBuffer();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

<style type="text/css">
    <?= file_get_contents(__DIR__.'/style.css'); ?>
</style>

<div class="container">
    <div class="copy-container center-xy">
        <p>
            404, page not found.
        </p>
    </div>
</div>

<?php die(); ?>