<?php
session_start();
require_once '../helper/connection.php';

$ID_Detail = $_POST['ID_Detail'];
$ID_Destinasi = $_POST['ID_Destinasi'];
$Deskripsi = $_POST['Deskripsi'];
$Fasilitas = $_POST['Fasilitas'];

$query = mysqli_query($connection, "UPDATE detail_destinasi SET ID_Destinasi = '$ID_Destinasi', Deskripsi = '$Deskripsi', Fasilitas = '$Fasilitas' 
WHERE ID_Detail = '$ID_Detail'");
if ($query) {
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