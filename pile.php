<?php
// Диаграмма будет представлена для значений следующего массива:
$values = ["23", "32", "35", "57", "12",
    "3", "36", "54", "32", "15",
    "43", "24", "30"];
// Количество столбцов диаграммы:
$columns = count($values);
// Задаем щирину и высоту всего изображения
$width = 300;
$height = 200;
// Задаем пространство между колонками:
$padding = 2;
// Получаем ширину одной колонки:
$column_width = $width / $columns;
// Создаем переменные
$im = imagecreate($width, $height);
$gray = imagecolorallocate($im, 0xcc, 0xcc, 0xcc);
$gray_lite = imagecolorallocate($im, 0xee, 0xee, 0xee);
$gray_dark = imagecolorallocate($im, 0x7f, 0x7f, 0x7f);
$white = imagecolorallocate($im, 0xff, 0xff, 0xff);
// Заполняем фон картинки
imagefilledrectangle($im, 0, 0, $width, $height, $white);
$maxv = 0;
// Вычисляем максимум
for ($i = 0; $i < $columns; $i++) {
    $maxv = max($values[$i], $maxv);
}

// Рисуем каждую колонку
for ($i = 0; $i < $columns; $i++) {
    $column_height = ($height / 100) * (($values[$i] / $maxv) * 100);
    $x1 = round($i * $column_width);
    $y1 = round($height - $column_height);
    $x2 = round((($i + 1) * $column_width) - $padding);
    $y2 = round($height);
    imagefilledrectangle($im, $x1, $y1, $x2, $y2, $gray);
    //для 3D эффекта
    imageline($im, $x1, $y1, $x1, $y2, $gray_lite);
    imageline($im, $x1, $y2, $x2, $y2, $gray_lite);
    imageline($im, $x2, $y1, $x2, $y2, $gray_dark);
}
// Посылаем информацию заголовку, можно заменить на JPEG или GIF
header("Content-type: image/png");
imagepng($im);