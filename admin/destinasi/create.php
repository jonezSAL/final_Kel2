<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$destinasi = mysqli_query($connection, "SELECT * FROM destinasi");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Destinasi</h1>
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
                <td>Kategori</td>
                <td>
                  <select class="form-control" name="ID_Kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $array_kategori = mysqli_query($connection, "SELECT*FROM kategori_destinasi");
                      while ($kategori = mysqli_fetch_array($array_kategori)) {
                        echo '<option value="' . $kategori['ID_Kategori'] . '">' .  $kategori['ID_Kategori'] . ' - ' . $kategori['Nama_Kategori'] . '</option>';
                      }
                      ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nama Destinasi</td>
                <td>
                  <input class="form-control" type="text" name="Nama_Destinasi" required>
                </td>
              </tr>
              <tr>
                <td>Foto</td>
                <td><input class="form-control" type="file" name="Foto" accept="image/png, image/jpg, image/jpeg" required></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="Deskripsi" required></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="Harga" required></td>
              </tr>
              <tr>
                <td>Lokasi</td>
                <td><input class="form-control" type="text" name="Lokasi" required></td>
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