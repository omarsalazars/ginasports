<?php session_start();
require_once "recaptchalib.php";

// your secret key
$secret = "6LdFrYIUAAAAAJuWk9KsbGf6EbB-1y2-rvSGvRjq";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

require 'controller/signup.controller.php';
?>