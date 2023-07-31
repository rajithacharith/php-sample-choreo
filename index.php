<?php

require_once 'config.php';

// check header X-Forwarded-Access-Token.
if (isset($_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'])) { 
  $token=$_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'];
  $token_data= json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
  echo "Hello " . $token_data->email;
}

?>