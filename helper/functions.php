<?php
// Hàm chọn chuỗi chữ cái, số ngẫu nhiên 
function createToken($length = 40){
    $token = '';
    $initString = '0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    for($i = 1; $i <= $length; $i++){
        $position = rand(0, strlen($initString)-1);
        $token .= $initString[$position];

    }
    return $token;
}
// Hàm cắt ảnh
// $filenameImage: đường dẫn hình ban đầu
// $filenameThumb: đường dẫn chứa hình sau khi cắt
// $ext: đuôi mở rộng của file hình ban đầu
// $thumb_width: chiều rộng hình sau khi cắt
// $thumb_height: chiều cao hình sau khi cắt
function CreateThumbImage($filenameImage, $filenameThumb, $ext, $thumb_width, $thumb_height)
    {
  if($ext == "jpeg" || $ext == "jpg")
  {
   $image = imagecreatefromjpeg($filenameImage);
  }
  if($ext == "png")
  {
   $image = imagecreatefrompng($filenameImage);
  }
  $filename = $filenameThumb;

  // $thumb_width = 300;
  // $thumb_height = 300;

  $width = imagesx($image);
  $height = imagesy($image);

  $original_aspect = $width / $height;
  $thumb_aspect = $thumb_width / $thumb_height;

  if ( $original_aspect >= $thumb_aspect )
  {
     // If image is wider than thumbnail (in aspect ratio sense)
     $new_height = $thumb_height;
     $new_width = $width / ($height / $thumb_height);
  }
  else
  {
     // If the thumbnail is wider than the image
     $new_width = $thumb_width;
     $new_height = $height / ($width / $thumb_width);
  }

  $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

  switch ($ext) {
      case 'png':
          // integer representation of the color black (rgb: 0,0,0)
          $background = imagecolorallocate($thumb , 0, 0, 0);
          // removing the black from the placeholder
          imagecolortransparent($thumb, $background);

          // turning off alpha blending (to ensure alpha channel information
          // is preserved, rather than removed (blending with the rest of the
          // image in the form of black))
          imagealphablending($thumb, false);

          // turning on alpha channel information saving (to ensure the full range
          // of transparency is preserved)
          imagesavealpha($thumb, true);
          break;

      default:
          break;
  }

  // Resize and crop
  imagecopyresampled($thumb,
                     $image,
                     0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                     0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                     0, 0,
                     $new_width, $new_height,
                     $width, $height);
  switch ($ext) {
   case 'jpg':
   case 'jpeg':
   {
    imagejpeg($thumb, $filename, 100);break;
   }
   case 'png':
   {
    imagepng($thumb,$filename,1);break;
   }
   default:
   {
    imagejpeg($thumb, $filename, 100);
   }
  }
 }

?>