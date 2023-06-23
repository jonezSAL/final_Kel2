<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Pemesanan</h1>
    <a href="./index.php" class="btn btn-warning">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Nama Admin</td>
                <td>
                  <select class="form-control" name="ID_Admin" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $array_admin = mysqli_query($connection, "SELECT*FROM admin");
                      while ($admin = mysqli_fetch_array($array_admin)) {
                        echo '<option value="' . $admin['ID_Admin'] . '">' .  $admin['ID_Admin'] . ' - ' . $admin['usser'] . '</option>';
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nama Destinasi</td>
                <td>
                  <select class="form-control" name="ID_Destinasi" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $array_destinasi = mysqli_query($connection, "SELECT*FROM destinasi");
                      while ($destinasi = mysqli_fetch_array($array_destinasi)) {
                        echo '<option value="' . $destinasi['ID_Destinasi'] . '">' .  $destinasi['ID_Destinasi'] . ' - ' . $destinasi['Nama_Destinasi'] . '</option>';
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nama Pemesan</td>
                <td><input class="form-control" type="text" name="Nama_Pemesan"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input class="form-control" type="text" name="Email"></td>
              </tr>
              <tr>
                <td>Tgl Pesan</td>
                <td><input class="form-control" type="date" name="Tanggal_Pemesanan"></td>
              </tr>
              <tr>
                <td>Jumlah Tiket</td>
                <td><input class="form-control" type="number" name="Jumlah_Tiket"></td>
              </tr>
              <tr>
                <td>Total Harga</td>
                <td><input class="form-control" type="number" name="Total_Harga"></td>
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