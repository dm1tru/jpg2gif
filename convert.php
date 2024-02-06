<?php

$GIF = new Imagick();
$GIF->setFormat("GIF");

$dir = __DIR__ . '/images/';

$files = scandir($dir);

foreach ($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }

    echo "ADD $file \n<br>";

    $frame = new Imagick();
    $frame->readImage($dir . $file);
    $frame->setImageDelay(100);
    $GIF->addImage($frame);
}

echo "CONVERT...\n<br>";

//header("Content - Type: image / gif");
$str = $GIF->getImagesBlob();
file_put_contents(__DIR__ . "/out/file.gif", $str);


echo "<a href='out/file.gif'>Download</a>";

