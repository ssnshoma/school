<?php
  include_once '../assets/connect.php';
  function getProfilePicName()
  {
    if (isset($_SESSION['log-info'])) {
      $logifo = $_SESSION['log-info'];
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