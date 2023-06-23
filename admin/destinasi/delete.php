<?php
session_start();
require_once '../helper/connection.php';

$ID_Destinasi = $_GET['ID_Destinasi'];

$result = mysqli_query($connection, "DELETE FROM destinasi WHERE ID_Destinasi='$ID_Destinasi'");

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