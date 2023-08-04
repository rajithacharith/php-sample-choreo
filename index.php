<?php

require_once 'config.php';

// check header X-Forwarded-Access-Token.
if (isset($_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'])) { 
  $token=$_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'];
  $token_data= json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
  echo "Hello " . $token_data->email;
}

$headers = getallheaders();

echo "<br>";
echo "=================================================================== <br>";
foreach ($headers as $key => $value)
   {
      if($key == "Authorization") {
        echo "Id Token: " . explode(" ",$value)[1];
        echo "<BR>";
      }
   }

?>
<br>
<a href="welcome.php">To Welcome page.....</a>