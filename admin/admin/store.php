<?php
session_start();
require_once '../helper/connection.php';

$ID_Admin = $_POST['ID_Admin'];
$usser = $_POST['usser'];
$password = $_POST['password'];

$admin = mysqli_query($connection, "insert into admin(ID_Admin, usser, password) value('$ID_Admin', '$usser', '$password')");
if ($admin) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
  }
?>