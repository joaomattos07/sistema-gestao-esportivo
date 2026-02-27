<?php
session_start();
session_destroy();
header("Location: /projeto-futebol/auten/login.php");
exit();
?>