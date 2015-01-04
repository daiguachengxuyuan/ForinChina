<?php
class ValidateCode{
 //random factor
 private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';
 private $code; //verify code
 private $codelen = 4;//code line
 private $width = 130;//width
 private $height = 50;//height
 private $img;//img resource handler
 private $font;//font
 private $fontsize = 20;//font size
 private $fontcolor;//font color

 //construct
 public function __construct(){
   $this->font = dirname(__FILE__).'/font/Elephant.ttf';
 }

 //create random code
 private function createCode(){
   $_len = strlen($this->charset)-1;
   for($i=0;$i<$this->codelen;$i++){
     $this->code .= $this->charset[mt_rand(0,$_len)];
   }
 }

 //create background
 private function createBg(){
   $this->img = imagecreatetruecolor($this->width,$this->height);
   $color = imagecolorallocate($this->img,mt_rand(157,255),mt_rand(157,255),mt_rand(157,255));
   imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
 }

 //create font
 private function createFont(){
  $_x = $this->width/$this->codelen;
  for($i=0;$i<$this->codelen;$i++){
    $this->fontcolor = imagecolorallocate($this->img,mt_rand(157,255),mt_rand(157,255),mt_rand(157,255)); 
    imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height/1.4,$this->fontcolor,$this->font,$this->code[$i]);
   }
  }

 //create line and snow
 private function createLine(){
   //line
   for($i=0;$i<6;$i++){
     $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
     imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
  }
  //snow
  for($i=0;$i<100;$i++){
     $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
     imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
  }
}
 //output
 private function outPut(){
  header('Content-type:image/png');
  imagepng($this->img);
  imagedestroy($this->img);
 }

 //create validate
 public function doimg(){
  $this->createBg();
  $this->createCode();
  $this->createLine();
  $this->createFont();
  $this->outPut();
 }

 //get code
 public function getCode(){
   return strtolower($this->code);
 }
}
