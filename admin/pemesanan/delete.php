<?php
session_start();
require_once '../helper/connection.php';

$ID_Pemesanan = $_GET['ID_Pemesanan'];

$result = mysqli_query($connection, "DELETE FROM pemesanan WHERE ID_Pemesanan='$ID_Pemesanan'");

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