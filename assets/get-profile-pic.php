<?php
  include_once '../assets/connect.php';
  function getProfilePicName()
  {
    if (isset($_COOKIE['logedIn'])) {
      $logifo = $_COOKIE['logedIn'];
      global $pdo;
      $sqll = "SELECT * FROM users WHERE username=? OR email=?";
      $resualt = $pdo->prepare($sqll);
      $resualt->bindValue(1, $logifo);
      $resualt->bindValue(2, $logifo);
      $resualt->execute();
      $row = $resualt->fetch();
      return $row;
    }
  }

?>