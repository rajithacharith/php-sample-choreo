<?php

require_once 'config.php';

// check header X-Forwarded-Access-Token.
if (isset($_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'])) { 
  echo "X-Forwarded-Access-Token: " . $_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'];
  $token=$_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'];
  print_r(json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1])))));
}

?>