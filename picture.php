<?php
// Создание изображения 200 x 200
$canvas = imagecreatetruecolor(400, 400);

// Создание цветов
$pink = imagecolorallocate($canvas, 255, 105, 180);
$white = imagecolorallocate($canvas, 255, 255, 255);
$green = imagecolorallocate($canvas, 132, 135, 28);
$red = imagecolorallocate($canvas, 255, 0, 0);
$blue = imagecolorallocate($canvas, 0, 0, 255);

//imagefilledrectangle($canvas, 0, 0, 400, 400, $white);
imagesetthickness($canvas, 3);
// Рисование разноцветных прямоугольников
imagerectangle($canvas, 50, 50, 150, 150, $pink);
imagerectangle($canvas, 45, 60, 120, 100, $white);
imagerectangle($canvas, 100, 120, 75, 160, $green);

// Рисование многоугольника
imagepolygon($canvas, [0, 0,
    100, 200,
    300, 200, 10, 20,
], $white);
imagesetthickness($canvas, 1);
// рисуем голову
imagearc($canvas, 100, 100, 200, 200, 0, 360, $white);

// рот
imagearc($canvas, 100, 100, 150, 150, 25, 155, $red);

// глаза
imagearc($canvas, 60, 75, 50, 50, 0, 360, $green);
imagearc($canvas, 140, 75, 50, 50, 0, 360, $blue);

// Вывод и освобождение памяти
header('Content-Type: image/jpeg');
imagejpeg($canvas);
imagedestroy($canvas);