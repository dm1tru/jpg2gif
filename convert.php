<?php

ini_set("display_errors","on");

$GIF = new Imagick();
$GIF->setFormat("GIF");

$dir = __DIR__ . '/images/';

$files = scandir($dir);

foreach ($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }

    $frame = new Imagick();
    $frame->readImage($dir . $file);
    $frame->setImageDelay(100);
    $GIF->addImage($frame);
}

header('Content-Type: image/gif');
echo $GIF->getImagesBlob();


