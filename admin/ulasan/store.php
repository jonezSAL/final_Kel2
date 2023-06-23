<?php
session_start();
require_once '../helper/connection.php';

$ID_Ulasan = $_POST['ID_Ulasan'];
$ID_Detail = $_POST['ID_Detail'];
$Nama_User = $_POST['Nama_User'];
$Ulasan = $_POST['Ulasan'];
$Rating = $_POST['Rating'];

$ulasan = mysqli_query($connection, "insert into ulasan (ID_Ulasan, ID_Detail, Nama_User, Ulasan, Rating) 
value('$ID_Ulasan', '$ID_Detail', '$Nama_User', '$Ulasan', '$Rating')");

if ($ulasan) {
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