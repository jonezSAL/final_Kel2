<?php
session_start();
require_once '../helper/connection.php';

$ID_Destinasi = $_POST['ID_Destinasi'];
$ID_Kategori = $_POST['ID_Kategori'];
$Nama_Destinasi = $_POST['Nama_Destinasi'];
$Foto = $_FILES['Foto']['name'];
$Deskripsi = $_POST['Deskripsi'];
$Harga = $_POST['Harga'];
$Lokasi = $_POST['Lokasi'];

// Cek apakah ada file gambar yang diunggah
if ($_FILES['Foto']['error'] === UPLOAD_ERR_OK) {
  $ekstensi_diperbolehkan = array("jpg", "jpeg", "png");
  $ekstensi = strtolower(pathinfo($Foto, PATHINFO_EXTENSION));
  $file_tmp = $_FILES["Foto"]['tmp_name'];
  $nama_gambar_baru = rand(1, 999) . "." . $ekstensi;
  $tujuan_upload = "../../img/destinasi/" . $nama_gambar_baru;

  // Pengecekan ekstensi file
  if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
    // Pindahkan file ke direktori tujuan
    if (move_uploaded_file($file_tmp, $tujuan_upload)) {
      // Update dengan foto baru
      $query = mysqli_query($connection, "UPDATE destinasi SET Nama_Destinasi='$Nama_Destinasi', ID_Kategori='$ID_Kategori', Foto='$nama_gambar_baru', Deskripsi='$Deskripsi', Harga='$Harga', Lokasi='$Lokasi' WHERE ID_Destinasi='$ID_Destinasi'");
    } else {
      $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Gagal mengunggah file gambar.'
      ];
      header('Location: ./index.php');
      exit();
    }
  } else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => 'Ekstensi file tidak diperbolehkan. Hanya file dengan ekstensi JPG, JPEG, dan PNG yang diperbolehkan.'
    ];
    header('Location: ./index.php');
    exit();
  }
  } else {
    // Update tanpa foto baru
    $query = mysqli_query($connection, "UPDATE destinasi SET Nama_Destinasi='$Nama_Destinasi', ID_Kategori='$ID_Kategori', Deskripsi='$Deskripsi', Harga='$Harga', Lokasi='$Lokasi' WHERE ID_Destinasi='$ID_Destinasi'");
  }

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengedit data'
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