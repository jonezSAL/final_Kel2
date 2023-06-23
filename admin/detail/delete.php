<?php
session_start();
require_once '../helper/connection.php';

$ID_Detail = $_GET['ID_Detail'];

$result = mysqli_query($connection, "DELETE FROM detail_destinasi WHERE ID_Detail='$ID_Detail'");

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