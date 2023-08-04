<?php
// check header X-Forwarded-Access-Token.
if (isset($_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'])) { 
    $token=$_SERVER['HTTP_X_FORWARDED_ACCESS_TOKEN'];
    $token_data= json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
    echo "Welcome to Demo application";
    echo "<br>";
    echo "Your email: " . $token_data->email;

    echo "<br>";
    echo "=================================================================== <br>";
    // call to another API with the same token.

    $url = getenv('API_URL');
    // if url is null 
    if ($url == null) {
      $url = "https://a0a51ad4-1acd-4ff5-9185-db759f540c40-dev.e1-us-east-azure.choreoapis.dev/yluh/expressbackend/product-catalog-803/1.0.0/products";
    }
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer ' . $token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    echo "Response from another API: " . $response;
  }
?>