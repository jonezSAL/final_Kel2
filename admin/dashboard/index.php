<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$admin = mysqli_query($connection, "SELECT COUNT(*) FROM admin");
$kategori_destinasi = mysqli_query($connection, "SELECT COUNT(*) FROM kategori_destinasi");
$destinasi = mysqli_query($connection, "SELECT COUNT(*) FROM destinasi");
$detail_destinasi = mysqli_query($connection, "SELECT COUNT(*) FROM detail_destinasi");
$gambar = mysqli_query($connection, "SELECT COUNT(*) FROM gambar");
$pemesanan = mysqli_query($connection, "SELECT COUNT(*) FROM pemesanan");
$ulasan = mysqli_query($connection, "SELECT COUNT(*) FROM ulasan");

$total_admin = mysqli_fetch_array($admin)[0];
$total_kategori_destinasi = mysqli_fetch_array($kategori_destinasi)[0];
$total_destinasi = mysqli_fetch_array($destinasi)[0];
$total_detail_destinasi = mysqli_fetch_array($detail_destinasi)[0];
$total_gambar = mysqli_fetch_array($gambar)[0];
$total_pemesanan = mysqli_fetch_array($pemesanan)[0];
$total_ulasan = mysqli_fetch_array($ulasan)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <a href="../admin/index.php">
              <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              <?= $total_admin ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <a href="../kategori/index.php">
              <i class="far fa-folder"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kategori Destinasi</h4>
            </div>
            <div class="card-body">
              <?= $total_kategori_destinasi?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <a href="../destinasi/index.php">
              <i class="far fa-folder-open"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Destinasi</h4>
            </div>
            <div class="card-body">
              <?= $total_destinasi ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-info">
            <a href="../detail/index.php">
              <i class="far fa-folder-open"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Detail Destinasi</h4>
            </div>
            <div class="card-body">
              <?= $total_detail_destinasi ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <a href="../gambar/index.php">
              <i class="far fa-images"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Gambar</h4>
            </div>
            <div class="card-body">
              <?= $total_gambar ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-dark">
            <a href="../pemesanan/index.php">
              <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pemesanan</h4>
            </div>
            <div class="card-body">
              <?= $total_pemesanan ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-statistic-1">
          <div class="card-icon bg-dark">
            <a href="../ulasan/index.php">
              <i class="fas fa-edit"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Ulasan</h4>
            </div>
            <div class="card-body">
              <?= $total_ulasan ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>