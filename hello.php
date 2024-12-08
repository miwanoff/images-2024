<?php
// Строка:
$string = "Hello!";
// Загрузка рисунка фона
$im = imageCreateFromPNG("./images/Mars_-_August_30_2021_-_Flickr_-_Kevin_M._Gill.png");
// Создание в палитре нового цвета — черного.
$color = imageColorAllocate($im, 255, 0, 0);
// Размер шрифта
$size = 5;
// Сдвиг надписи
$offset = strlen($string) / 2 * $size;
// Вычисление x для расположения текста по ширине
$x = (imageSX($im) - strlen($string)) / 2 - $offset;
$y = 125;
// Вывод строки поверх загруженного изображения.
imageString($im, $size, $x, $y, $string, $color);
// Вывод картинки в стандартный выходной поток - в браузер
header("Content-type: image/png");
imagePng($im); // освобождение памяти, занятой картинкой
imageDestroy($im);