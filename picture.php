<?php
// Создание изображения 200 x 200
$canvas = imagecreatetruecolor(400, 400);

// Создание цветов
$pink = imagecolorallocate($canvas, 255, 105, 180);
$white = imagecolorallocate($canvas, 255, 255, 255);
$green = imagecolorallocate($canvas, 132, 135, 28);

// Рисование разноцветных прямоугольников
imagerectangle($canvas, 50, 50, 150, 150, $pink);
imagerectangle($canvas, 45, 60, 120, 100, $white);
imagerectangle($canvas, 100, 120, 75, 160, $green);

// Рисование многоугольника
imagepolygon($canvas, [0, 0,
    100, 200,
    300, 200, 10, 20
], $white);

// Вывод и освобождение памяти
header('Content-Type: image/jpeg');
imagejpeg($canvas);
imagedestroy($canvas);