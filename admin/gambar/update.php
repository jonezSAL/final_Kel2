<?php
session_start();
require_once '../helper/connection.php';

$ID_Gambar = $_POST['ID_Gambar'];
$ID_Detail = $_POST['ID_Detail'];
$Nama_File = $_FILES['Nama_File']['name'];

// Cek apakah ada file gambar yang diunggah
if ($_FILES['Nama_File']['error'] === UPLOAD_ERR_OK) {
  $ekstensi_diperbolehkan = array("jpg", "jpeg", "png");
  $ekstensi = strtolower(pathinfo($Nama_File, PATHINFO_EXTENSION));
  $file_tmp = $_FILES["Nama_File"]['tmp_name'];
  $nama_gambar_baru = rand(1, 9999) . "." . $ekstensi;
  $tujuan_upload = "../../img/gambar/" . $nama_gambar_baru;

  // Pengecekan ekstensi file
  if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
    // Pindahkan file ke direktori tujuan
    if (move_uploaded_file($file_tmp, $tujuan_upload)) {
      // Update dengan foto baru
      $query = mysqli_query($connection, "UPDATE gambar SET ID_Gambar='$ID_Gambar', ID_Detail='$ID_Detail', Nama_File='$nama_gambar_baru' WHERE ID_Gambar='$ID_Gambar'");
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
    $query = mysqli_query($connection, "UPDATE gambar SET ID_Gambar='$ID_Gambar', ID_Detail='$ID_Detail' WHERE ID_Gambar='$ID_Gambar'");
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