<?php
  if (!isset($_COOKIE['logedIn'])) {
  echo " <script> window.location.href='../index.php';</script> ";
  $_SESSION['first-login'] = "لطفا وارد شوید";
}