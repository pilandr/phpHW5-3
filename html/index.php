<?php
require '../vendor/autoload.php';

/// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
use \Intervention\Image\Constraint;
use Intervention\Image\AbstractFont;


// and you are ready to go ...
$img = Image::make('php.jpg')->resize(200, null, function (Constraint $constraint) {
    $constraint->aspectRatio();
});

$img->text("watermark", $img->getWidth() - 50, $img->getHeight() - 10, function (AbstractFont $abstractFont) {
    $abstractFont->size(18);
    $abstractFont->color('#000000');
});

$img->save('test.jpg');

echo $img->response('jpg');