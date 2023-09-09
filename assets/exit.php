<?php
unset($_SESSION['first-login']);
session_unset();
session_reset();
session_destroy();
header("location: ../index.php");
?>
