<?php

require_once 'config.php';

if (isset($_SESSION['token'])) {
    header("Location: welcome.php");
  } else {
    echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
  }

?>