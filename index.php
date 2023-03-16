<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$image = new \app\main\Image(3000, 5000);
$font = "./main/fonts/ClimateCrisis-Regular-VariableFont_YEAR.ttf";
$name  = "Nargiza Kirgizova";
$sum1 = "1 900 000";
$sum2 = "2 200 000";
$image1 = "https://jang.novatio.uz/images/users/close_smena/1678897629.jpeg";
$image2 = "./newImg.png";
$kub1 = "22";
$kub2 = "32";
$kubImgPath = "./kb.png";
// header("Content-Type: image/png");
$p = "/main/img" . date("Y-m-d-h-m-s") . ".png";
$path = "." . $p;
$myImg =  $image
  ->bgcolor(145, 145, 219)
  ->text("Yutgan elchi ismi", $font, 600, 500, 120, $image->color(45, 129, 171))
  ->text($name, $font, 300, 800, 140, $image->color(39, 11, 138))
  ->text($kub1, $font, 450, 4150, 100, $image->color(39, 11, 138))
  ->text($kub2, $font, 2250, 4150, 100, $image->color(39, 11, 138))
  ->makeRect(1000, 300, 100, 3000, 0, 0, $sum1, $font)
  ->makeRect(1000, 300, 1900, 3000, 0, 0, $sum2, $font)
  ->putImage($image1, 200, 1700, 0, 0, 800, 800, 100)
  ->putImage($image2, 2000, 1700, 0, 0, 800, 800, 100)
  ->putImg($kubImgPath, 200, 4000, 0, 0, 200, 200, 100)
  ->putImg($kubImgPath, 2600, 4000, 0, 0, 200, 200, 100)
  // ->print();
  ->save($path);

$image->destroy();
$tg = __DIR__ . $p;
echo $tg;
$share_url = 'https://t.me/share/url?url=' . rawurlencode($myImg) . '&text=' . rawurlencode("Text");
$btn = "<a href=\"{$share_url}\">Share</a>" .
  "\n" . "<a target=\"_blank\" href=\"$myImg\" download=\"$myImg\">Download</a>" .
  "\n" .
  "<a  href=\"https://t.me/share/url?url=$tg\" target=\"_blank\" title=\"Telegram\">
  <span>Telegram</span>
</a>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <button></button>
</head>

<body>
  <?php echo $btn ?>
</body>

</html>