<?php
session_start();
require_once '../helper/connection.php';

$ID_Ulasan = $_POST['ID_Ulasan'];
$ID_Detail = $_POST['ID_Detail'];
$Nama_User = $_POST['Nama_User'];
$Ulasan = $_POST['Ulasan'];
$Rating = $_POST['Rating'];

$ulasan = mysqli_query($connection, "UPDATE `ulasan` SET ID_Ulasan = '$ID_Ulasan', 
ID_Detail = '$ID_Detail' Nama_User = '$Nama_User' Ulasan = '$Ulasan' Rating = '$Rating' WHERE ID_Ulasan = '$ID_Ulasan'");
if ($ulasan) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
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