<?php
    //устанавливаем куки
    $counter = isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 0;
    $counter++;

    //обновляем куки
    setcookie("counter", $counter, time() + 200);

    // загружаем рисунок с диска
    $im = imageCreateFromGif("1_earth.gif");
    // устанавливаем шрифт - красный.
    $color = imageColorAllocate($im, 255, 0, 0);
    // выводим строку поверх изображения
    imageString($im, 3, 200, 5, $counter, $color);
    // сообщаем о том, что далее следует рисунок GIF
    header("Content-type: image/gif");
    //отправляем в браузер
    imagePng($im);
    //освобождаем память
    imageDestroy($im);