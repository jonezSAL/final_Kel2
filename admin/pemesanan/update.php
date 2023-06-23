<?php
session_start();
require_once '../helper/connection.php';

$ID_Pemesanan = $_POST['ID_Pemesanan'];
$ID_Admin = $_POST['ID_Admin'];
$ID_Destinasi = $_POST['ID_Destinasi'];
$Nama_Pemesan = $_POST['Nama_Pemesan'];
$Email = $_POST['Email'];
$Tanggal_Pemesanan = $_POST['Tanggal_Pemesanan'];
$Jumlah_Tiket = $_POST['Jumlah_Tiket'];
$Total_Harga = $_POST['Total_Harga'];


$query = mysqli_query($connection, "UPDATE pemesanan SET ID_Admin = '$ID_Admin', ID_Destinasi = '$ID_Destinasi', Nama_Pemesan = '$Nama_Pemesan',
Email = '$Email', Tanggal_Pemesanan = '$Tanggal_Pemesanan', Jumlah_Tiket = '$Jumlah_Tiket', Total_Harga = '$Total_Harga' WHERE ID_Pemesanan = '$ID_Pemesanan'");


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