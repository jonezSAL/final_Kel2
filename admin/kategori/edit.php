<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Kategori = $_GET['ID_Kategori'];
$query = mysqli_query($connection, "SELECT * FROM kategori_destinasi WHERE ID_Kategori='$ID_Kategori'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Kategori Destinasi</h1>
    <a href="./index.php" class="btn btn-warning">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="ID_Kategori" value="<?= $row['ID_Kategori'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" type="number" name="ID_Kategori" size="20" required value="<?= $row['ID_Kategori'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Kategori</td>
                  <td><input class="form-control" type="text" name="Nama_Kategori" size="20" required value="<?= $row['Nama_Kategori'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>