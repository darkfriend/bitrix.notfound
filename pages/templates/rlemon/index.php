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
<style type="text/css">
    <?= file_get_contents(__DIR__.'/style.css'); ?>
</style>

<canvas id="canvas" hidden></canvas>
<div class="center">
    <h1>404</h1>
    <p>PAGE NOT FOUND.</p>
</div>

<script>
    var canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        height = canvas.height = 256,
        width = canvas.width = height,
        bcontext = 'getCSSCanvasContext' in document ? document.getCSSCanvasContext('2d', 'noise', width, height) : context;
    noise();

    function noise() {
        requestAnimationFrame(noise);
        var idata = context.getImageData(0, 0, width, height);
        for (var i = 0; i < idata.data.length; i += 4) {
            idata.data[i] = idata.data[i + 1] = idata.data[i + 2] = Math.floor(Math.random() * 255);
            idata.data[i + 3] = 255;
        }
        bcontext.putImageData(idata, 0, 0);
    }
</script>

<?php die(); ?>