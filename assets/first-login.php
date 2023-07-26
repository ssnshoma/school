<?php
if (isset($_SESSION['logedin'])){
}else{
  echo " <script> window.location.href='auth-login-basic.php';</script> ";
$_SESSION['first-login']="لطفا ابتدا وارد شوید";
}
?>