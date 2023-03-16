<?php

namespace app\main;

class Image
{
  public $img;

  public function __construct(int $width, int $height)
  {
    $this->img = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream");
  }

  public function color(int $r, int $g, int $b)
  {
    return imagecolorallocate($this->img, $r, $g, $b);
  }

  public function bgcolor(int $r, int $g, int $b)
  {
    imagecolorallocate($this->img, $r, $g, $b);
    return $this;
  }

  public function makeShape(
    int $center_x,
    int $center_y,
    int $width,
    int $height,
    int $start_angle,
    int $end_angle,
    int $color
  ) {
    imagearc($this->img, $center_x, $center_y, $width, $height, $start_angle, $end_angle, $color);
    return $this;
  }

  public function text(
    string $text,
    string $font,
    int $x,
    int $y,
    int $size,
    int $color
  ) {
    imagettftext($this->img, $size, 0, $x, $y, $color, $font, $text);
    return $this;
  }

  public function makeRect($w, $h, int $dst_x, int $dst_y, int $src_x, int $src_y, string $summa, string $font)
  {
    $image = imagecreate($w, $h);
    imagecolorallocate($image, 40, 32, 179);
    $color = imagecolorallocate($image, 255, 255, 255);
    imagealphablending($image, true);
    imagettftext($image, 70, 0, 150, 180, $color, $font, $summa);
    imagecopymerge($this->img, $image, $dst_x, $dst_y, $src_x, $src_y, $w, $h, 100);
    return $this;
  }
  public function putImg($path, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height, int $pct)
  {
    $image_s = imagecreatefromstring(file_get_contents($path));
    $size = min(imagesx($image_s), imagesy($image_s));
    $image_s = imagecrop($image_s, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
    $img_width = imagesx($image_s);
    $img_height = imagesy($image_s);
    $image = imagecreatetruecolor($src_width, $src_height);
    $transparent = imagecolorallocate($this->img, 0, 0, 255);
    imagecolortransparent($image, $transparent);
    imagealphablending($image, true);
    imagecopyresampled($image, $image_s, 0, 0, 0, 0, $src_width, $src_height, $img_width, $img_height);
    imagecopymerge($this->img, $image, $dst_x, $dst_y, $src_x, $src_y, $src_width, $src_height, 100);
    return $this;
  }
  public function putImage($path, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height, int $pct)
  {
    $image_s = imagecreatefromstring(file_get_contents($path));
    $size = min(imagesx($image_s), imagesy($image_s));
    $image_s = imagecrop($image_s, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);

    $img_width = imagesx($image_s);
    $img_height = imagesy($image_s);

    $image = imagecreatetruecolor($src_width, $src_height);
    imagealphablending($image, true);
    imagecopyresampled($image, $image_s, 0, 0, 0, 0, $src_width, $src_height, $img_width, $img_height);

    $mask = imagecreatetruecolor($src_width, $src_height);
    $transparent = imagecolorallocate($mask, 0, 0, 255);
    imagecolortransparent($mask, $transparent);

    imagefilledellipse($mask, $src_width / 2, $src_height / 2, $src_width, $src_height, $transparent);
    $red = imagecolorallocate($mask, 0, 0, 0);
    imagecopymerge($image, $mask, 0, 0, 0, 0, $src_width, $src_height, 100);
    imagecolortransparent($image, $red);
    imagefill($image, 0, 0, $red);

    imagecopymerge($this->img, $image, $dst_x, $dst_y, $src_x, $src_y, $src_width, $src_height, 100);
    return $this;
  }


  public function print()
  {
    imagepng($this->img);
    return $this;
  }

  public function save($filePath)
  {
    imagepng($this->img, $filePath);
    return $filePath;
  }

  public function destroy()
  {
    imagedestroy($this->img);
  }
}
