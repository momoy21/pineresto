<?php
    session_start();

    header('Content-Type: image/png');
    $font = 5;
    $width = 120;
    $height = 40;
    $image = imagecreate($width, $height);
    $background = imagecolorallocate($image, 225, 225, 225);
    $textcolor = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, $font, 30, 10, $_SESSION['captcha'], $textcolor);
    imagepng($image);
    imagedestroy($image);
?>
