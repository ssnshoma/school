<?php
$utf=array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
  PDO::ERRMODE_WARNING
);
$pdo= new PDO('mysql:host=localhost;dbname=1402s1403','root','',$utf);
session_start();
?>