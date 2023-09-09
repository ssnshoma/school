<?php
  $utf = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ERRMODE_WARNING
  );
  $pdo = new PDO('mysql:host=localhost;dbname=vswtsdio_1402s1403', 'vswtsdio_hossein', '8v6lZR0S@d3x*Z', $utf);
  $conn = mysqli_connect("localhost", 'vswtsdio_hossein', '8v6lZR0S@d3x*Z', "");
  mysqli_select_db($conn, 'vswtsdio_1402s1403');
  session_start();
  date_default_timezone_set("Asia/Tehran");
  include_once 'functions.php';
?>