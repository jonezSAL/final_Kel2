<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Pemesanan = $_GET['ID_Pemesanan'];
$query = mysqli_query($connection, "SELECT * FROM pemesanan WHERE ID_Pemesanan='$ID_Pemesanan'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Pemesanan</h1>
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
            <input type="hidden" name="ID_Pemesanan" value="<?= $row['ID_Pemesanan'] ?>">
            <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Pemesanan</td>
                  <td><input class="form-control" required value="<?= $row['ID_Pemesanan'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Admin</td>
                  <td>
                    <select class="form-control" name="ID_Admin" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $array_admin = mysqli_query($connection, "SELECT * FROM admin");
                          while ($admin = mysqli_fetch_array($array_admin)) {
                            $selected = ($admin['ID_Admin'] == $row['ID_Admin']) ? 'selected' : '';
                            echo '<option value="' . $admin['ID_Admin'] . '" ' . $selected . '>' . $admin['ID_Admin'] . ' - ' . $admin['usser'] . '</option>';
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
                        $array_destinasi = mysqli_query($connection, "SELECT * FROM destinasi");
                          while ($destinasi= mysqli_fetch_array($array_destinasi)) {
                            $selected = ($destinasi['ID_Destinasi'] == $row['ID_Destinasi']) ? 'selected' : '';
                            echo '<option value="' . $destinasi['ID_Destinasi'] . '" ' . $selected . '>' . $destinasi['ID_Destinasi'] . ' - ' . $destinasi['Nama_Destinasi'] . '</option>';
                          }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nama Pemesan</td>
                  <td><input class="form-control" type="text" name="Nama_Pemesan" required value="<?= $row['Nama_Pemesan'] ?>"></td>
                </tr>
                <tr>
                  <td>Tgl Pesan</td>
                  <td><input class="form-control" type="date" name="Tanggal_Pemesanan" required value="<?= $row['Tanggal_Pemesanan'] ?>"></td>
                </tr>
                <tr>
                  <td>Jumlah Tiket</td>
                  <td><input class="form-control" type="number" name="Jumlah_Tiket" required value="<?= $row['Jumlah_Tiket'] ?>"></td>
                </tr>
                <tr>
                  <td>Total Harga</td>
                  <td><input class="form-control" type="number" name="Total_Harga" required value="<?= $row['Total_Harga'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  </td>
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