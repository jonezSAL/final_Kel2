<?php
session_start();
require_once '../helper/connection.php';

$ID_Destinasi = $_POST['ID_Destinasi'];
$ID_Kategori = $_POST['ID_Kategori'];
$Nama_Destinasi = $_POST['Nama_Destinasi'];
$Foto =  $_FILES['Foto']['name'];
$Deskripsi = $_POST['Deskripsi'];
$Harga = $_POST['Harga'];
$Lokasi = $_POST['Lokasi'];

if ($Foto == "") {
  $query = mysqli_query($connection, "INSERT INTO destinasi (ID_Destinasi, Nama_Destinasi, ID_Kategori, Deskripsi, Harga, Lokasi) 
    VALUES ('$ID_Destinasi', '$Nama_Destinasi', '$ID_Kategori', '$Deskripsi', '$Harga', '$Lokasi')");
} else {
  $ekstensi_diperbolehkan = array("jpg", "jpeg", "png");
  $ekstensi = strtolower(end(explode(".", $Foto)));
  $file_tmp = $_FILES["Foto"]['tmp_name'];
  $nama_gambar_baru = rand(1, 999) . "." . $ekstensi;
  $tujuan_upload = "../../img/destinasi/" . $nama_gambar_baru;

  // Pengecekan apakah gambar sudah ada di direktori
  if (!file_exists($tujuan_upload)) {
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
      move_uploaded_file($file_tmp, $tujuan_upload);

      $query = mysqli_query($connection, "INSERT INTO destinasi (ID_Destinasi, Nama_Destinasi, ID_Kategori, Foto, Deskripsi, Harga, Lokasi) 
        VALUES ('$ID_Destinasi', '$Nama_Destinasi', '$ID_Kategori', '$nama_gambar_baru', '$Deskripsi', '$Harga', '$Lokasi')");
    } else {
      $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Ekstensi file tidak diperbolehkan. Hanya file dengan ekstensi JPG, JPEG, dan PNG yang diperbolehkan.'
      ];
      header('Location: ./index.php');
      exit();
    }
  } else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => 'Gambar sudah ada di direktori tujuan.'
    ];
    header('Location: ./index.php');
    exit();
  }
}

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
  exit();
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
  exit();
}
?>