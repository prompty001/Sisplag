<?php
$username = 'root';
$password= NULL;

try {
    $conn = new PDO('mysql:host=localhost;dbname=sisplag', $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>