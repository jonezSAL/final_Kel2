<?php
session_start();
require_once '../helper/connection.php';

$ID_Kategori = $_GET['ID_Kategori'];

$result = mysqli_query($connection, "DELETE FROM kategori_destinasi WHERE ID_Kategori='$ID_Kategori'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
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