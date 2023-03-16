<?php

namespace app\main;

// class Main
// {
//   public static function main()
//   {
//     $image = new Image(3000, 5000);
//     $font = "./fonts/ClimateCrisis-Regular-VariableFont_YEAR.ttf";
//     $name  = "Nargiza Kirgizova";
//     $sum1 = "1 900 000";
//     $sum2 = "2 200 000";
//     $image1 = "./mycat.png";
//     $image2 = "./newImg.png";
//     $kub1 = "22";
//     $kub2 = "32";
//     $kubImgPath = "./kb.png";

//     $myImg =  $image
//       ->bgcolor(145, 145, 219)
//       ->text("Yutgan elchi ismi", $font, 600, 500, 120, $image->color(45, 129, 171))
//       ->text($name, $font, 300, 800, 140, $image->color(39, 11, 138))
//       ->text($kub1, $font, 400, 4150, 100, $image->color(39, 11, 138))
//       ->text($kub2, $font, 2300, 4150, 100, $image->color(39, 11, 138))
//       ->makeRect(1000, 300, 100, 3000, 0, 0, $sum1, $font)
//       ->makeRect(1000, 300, 1900, 3000, 0, 0, $sum2, $font)
//       ->putImage($image1, 200, 1700, 0, 0, 800, 800, 100)
//       ->putImage($image2, 2000, 1700, 0, 0, 800, 800, 100)
//       ->putImage($kubImgPath, 200, 4000, 0, 0, 200, 200, 100)
//       ->putImage($kubImgPath, 2600, 4000, 0, 0, 200, 200, 100)
//       ->save("./newImage.png");

//     $image->destroy();
//     header("Content-Type: image/png");
//     $share_url = 'https://t.me/share/url?url=' . rawurlencode($myImg) . '&text=' . rawurlencode("Text");
//     $btn = "<a href=\"{$share_url}\">Share</a>" . "\n" . "<a target=\"_blank\" href=\"$myImg\" download=\"$myImg\">Download</a>";
//     return $btn;
//   }
// }
