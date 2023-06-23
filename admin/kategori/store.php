<?php
session_start();
require_once '../helper/connection.php';

$ID_Kategori = $_POST['ID_Kategori'];
$Nama_Kategori = $_POST['Nama_Kategori'];

$kategori_destinasi = mysqli_query($connection, "insert into kategori_destinasi(ID_Kategori, Nama_Kategori) value('$ID_Kategori', '$Nama_Kategori')");
if ($kategori_destinasi) {
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