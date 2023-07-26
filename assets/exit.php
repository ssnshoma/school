<?php
session_unset();
session_reset();
session_destroy();
header("location: ../html/auth-login-basic.php");
?>
