<?php
  $utf = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ERRMODE_WARNING
  );
  $pdo = new PDO('mysql:host=localhost;dbname=1402s1403', 'root', '', $utf);
  $conn = mysqli_connect("localhost", "root", "", "");
  mysqli_select_db($conn, '1402s1403');

  session_start();

?>


