<?php
use Intervention\Image\ImageManager;

require __DIR__ . '/vendor/autoload.php';

// create image manager with desired driver
$manager = new ImageManager(
    new Intervention\Image\Drivers\Gd\Driver()
);

// open an image file
$image = $manager->read('images/eu.jpg');

// resize image instance
$image->resize(height: 200);

// encode edited image (removido o place pois watermark.png não existe)
$encoded = $image->toPng();

// save encoded image
$encoded->save('images/example.png');