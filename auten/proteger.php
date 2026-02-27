<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: /projeto-futebol/auten/login.php");
exit();
}
?>