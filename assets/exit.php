<?php
setcookie("logedIn", $usname, time() + (300), "/");
session_unset();
session_reset();
session_destroy();
header("location: ../index.php");
?>
