<?php

if(isset($_POST['g-recaptcha-response'])) { 

   $captcha = $_POST['g-recaptcha-response'];
   $ip = $_SERVER['REMOTE_ADDR'];
   $key = '6LeTZroeAAAAAO_wlytY2YBgsF8KEef9pxY7H2YH';
   $url = 'https://www.google.com/recaptcha/api/siteverify';

   $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
   $data = json_decode($recaptcha_response);

   if(isset($data->success) &&  $data->success === true) {
   }
   else {
      die('Your account has been logged as a spammer, you cannot continue!');
   }
 }
 ?>