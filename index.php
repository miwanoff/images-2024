<?php 
//Выбираем случайное изображение любого формата.
//Функция glob() ищет все пути, совпадающие с шаблоном
$fnames = glob("images/*.{gif,jpg,png}", GLOB_BRACE);//GLOB_BRACE раскрывает {a,b,c} для совпадения с 'a', 'b' или 'c'. 
$fname = $fnames[mt_rand (0, count($fnames)-1)];
//Определяем формат изображения
$size = getimagesize($fname);
//Выводим изображение
header("Content-type: {$size['mime']}");
echo file_get_contents($fname);