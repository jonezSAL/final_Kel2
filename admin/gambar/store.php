<?php
session_start();
require_once '../helper/connection.php';

$ID_Gambar = $_POST['ID_Gambar'];
$ID_Detail = $_POST['ID_Detail'];
$Nama_File = $_FILES['Nama_File']['name'];

if($Nama_File == ""){
  $query = mysqli_query($connection, "INSERT INTO gambar (ID_Gambar, ID_Detail) 
    VALUES ('$ID_Gambar', '$ID_Detail')");
}else{
  $ekstensi_diperbolehkan = array("jpg", "jpeg", "png");
  $ekstensi = strtolower(end(explode(".", $Nama_File)));
  $file_tmp = $_FILES["Nama_File"]['tmp_name'];
  $nama_gambar_baru = rand(1, 9999) . "." . $ekstensi;
  $tujuan_upload = "../../img/gambar/" . $nama_gambar_baru;

  // Pengecekan apakah gambar sudah ada di direktori
  if (!file_exists($tujuan_upload)) {
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
      move_uploaded_file($file_tmp, $tujuan_upload);

      $query = mysqli_query($connection, "INSERT INTO gambar (ID_Gambar, ID_Detail, Nama_File) 
        VALUES ('$ID_Gambar', '$ID_Detail', '$nama_gambar_baru')");
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