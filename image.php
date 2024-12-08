<?php 
// Создание изображения 100*30
$im = imagecreate(100, 30);
// Желтый фон, синий текст
$bg = imagecolorallocate($im, 255, 255, 0);
$textcolor = imagecolorallocate($im, 0, 0, 255);
// Надпись в левом верхнем углу
imagestring($im, 5, 20, 10, 'Hello', $textcolor);
// Вывод изображения в стандартный выходной поток - в браузер
header('Content-type: image/png');
imagepng($im);
//освобождение памяти, занятой картинкой
imagedestroy($im);