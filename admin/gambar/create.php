<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$gambar = mysqli_query($connection, "SELECT * FROM gambar");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Gambar Destinasi</h1>
    <a href="./index.php" class="btn btn-warning">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Nama Destinasi</td>
                <td>
                  <select class="form-control" name="ID_Detail" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $array_detail = mysqli_query($connection, "SELECT ID_Detail, destinasi.Nama_Destinasi FROM detail_destinasi inner join 
                      destinasi on detail_destinasi.ID_Destinasi = destinasi.ID_Destinasi");
                      while ($detail = mysqli_fetch_array($array_detail)) {
                        echo '<option value="' . $detail['ID_Detail'] . '">' .  $detail['ID_Detail'] . ' - ' . $detail['Nama_Destinasi'] . '</option>';
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Gambar</td>
                <td><input class="form-control" type="file" name="Nama_File"  accept="image/png, image/jpg, image/jpeg" required></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>