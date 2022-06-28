<?php
// (A) OPEN IMAGE
$img = imagecreatefromjpeg("../dist/img/i-card.jpg");

// (B) WRITE TEXT
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$font  = __DIR__ . "/../dist/font/Roboto-Light.ttf";
// $center_location = "pathsalatihujhjghjghg";
if (isset($_GET['photo'])) {
  $name = $_GET['name'];
  $roll = $_GET['roll'];
  $course = $_GET['course'];
  $course_code = $_GET['c_code'];
  $form_date = $_GET['form_date'];
  $to_date = $_GET['to_date'];
  $center_location = $_GET['center_location'];
  $code = $_GET['code'];
  $blood_gr = $_GET['blood_gr'];
  $emergency_name = $_GET['emergency_name'];
  $emergency_relation = $_GET['emergency_relation'];
  $emergency_contact_no = $_GET['emergency_contact_no'];
  $center_address = $_GET['center_address'];
  $photo = $_GET['photo'];
  $sign = $_GET['sign'];
$photo1 = imagecreatefromjpeg("../dist/img/student/".$photo."");
$width11  = imagesx($photo1);
$photowidth = 1059-($width11/2);
$height11 = imagesy($photo1);
$photoheight = 465-($height11/2);
imagealphablending($img, false);
imagesavealpha($photo1, true);
imagecopymerge($img, $photo1, $photowidth,$photoheight,0,0, $width11, $height11, 100);

$sign1 = imagecreatefromjpeg("../dist/img/student/".$sign."");
$width1  = imagesx($sign1);
$signwidth = 1050-($width1/2);
$height1 = imagesy($sign1);
$signheight = 660-($height1/2);
imagealphablending($img, false);
imagesavealpha($sign1, true);
imagecopymerge($img, $sign1, $signwidth,$signheight,0,0, $width1, $height1, 100);

$dimensions = imagettfbbox(34, 0, $font, $center_location);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = 1044 - $textWidth;


$text_a = explode(' ', $center_address);
$text_new = '';
foreach($text_a as $word){
    //Create a new text, add the word, and calculate the parameters of the text
    $box = imagettfbbox(24, 0, $font, $text_new.' '.$word);
    //if the line fits to the specified width, then add the word with a space, if not then add word with new line
    if($box[2] > 800){
        $text_new .= "\n".$word;
    } else {
        $text_new .= " ".$word;
    }
  }
//trip spaces
$text_new = trim($text_new);

 

// imagettftext($img, 34, 0, $x, 110, $white, $font, $center_location);
imagettftext($img, 24, 0, 320, 381, $black, $font, $name);
imagettftext($img, 24, 0, 320, 439, $black, $font, $roll);
imagettftext($img, 24, 0, 320, 495, $black, $font, $course);
imagettftext($img, 24, 0, 720, 495, $black, $font, $course_code);
imagettftext($img, 24, 0, 320, 556, $black, $font, $form_date);
imagettftext($img, 24, 0, 680, 556, $black, $font, $to_date);
imagettftext($img, 24, 0, 320, 614, $black, $font, $center_location);
imagettftext($img, 24, 0, 720, 612, $black, $font, $code);
imagettftext($img, 24, 0, 1780, 113, $black, $font, $blood_gr);
// imagettftext($img, 24, 0, 1780, 115, $black, $font, $emergency_name);
imagettftext($img, 24, 0, 1780, 227, $black, $font, $emergency_relation);
imagettftext($img, 24, 0, 1780, 173, $black, $font, $emergency_contact_no);
// imagettftext($img, 24, 0, 1145, 488, $black, $font, $text_new);
}
// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);

// OR SAVE TO A FILE
// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
// imagejpeg($img, "test.jpg", 100);
?>