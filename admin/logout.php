<?php
session_start();
unset($_SESSION['admin']);
$_SESSION['admin'] = null;
header('Location: ../index.php');
?>