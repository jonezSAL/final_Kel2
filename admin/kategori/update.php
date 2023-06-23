<?php
session_start();
require_once '../helper/connection.php';

$ID_Kategori = $_POST['ID_Kategori'];
$Nama_Kategori = $_POST['Nama_Kategori'];

$kategori_destinasi = mysqli_query($connection, "UPDATE `kategori_destinasi` SET Nama_Kategori = '$Nama_Kategori' WHERE ID_Kategori = '$ID_Kategori'");
if ($kategori_destinasi) {
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