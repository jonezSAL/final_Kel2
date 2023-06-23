<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Detail = $_GET['ID_Detail'];
$query = mysqli_query($connection, "SELECT * FROM detail_destinasi WHERE ID_Detail='$ID_Detail'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Detail Destinasi</h1>
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
              <input type="hidden" name="ID_Detail" value="<?= $row['ID_Detail'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" required value="<?= $row['ID_Detail'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Destinasi</td>
                  <td>
                    <select class="form-control" name="ID_Destinasi" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $query_destinasi = mysqli_query($connection, "SELECT * FROM destinasi");
                          while ($row_destinasi = mysqli_fetch_array($query_destinasi)) {
                            $selected = ($row_destinasi['ID_Destinasi'] == $row['ID_Destinasi']) ? 'selected' : '';
                            echo '<option value="' . $row_destinasi['ID_Destinasi'] . '" ' . $selected . '>' . $row_destinasi['ID_Destinasi'] . ' - ' . $row_destinasi['Nama_Destinasi'] . '</option>';
                          }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td><input class="form-control" type="text" name="Deskripsi" required value="<?= $row['Deskripsi'] ?>"></td>
                </tr>

                <tr>
                  <td>Fasilitas</td>
                  <td><input class="form-control" type="text" name="Fasilitas" required value="<?= $row['Fasilitas'] ?>"></td>
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