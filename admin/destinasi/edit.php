<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Destinasi = $_GET['ID_Destinasi'];
$query = mysqli_query($connection, "SELECT * FROM destinasi WHERE ID_Destinasi='$ID_Destinasi'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Destinasi</h1>
    <a href="./index.php" class="btn btn-warning">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post" enctype="multipart/form-data">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="ID_Destinasi" value="<?= $row['ID_Destinasi'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Destinasi</td>
                  <td><input class="form-control" required value="<?= $row['ID_Destinasi'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>
                    <select class="form-control" name="ID_Kategori" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $query_kategori = mysqli_query($connection, "SELECT * FROM kategori_destinasi");
                        while ($row_kategori = mysqli_fetch_array($query_kategori)) {
                          $selected = ($row_kategori['ID_Kategori'] == $row['ID_Kategori']) ? 'selected' : '';
                          echo '<option value="' . $row_kategori['ID_Kategori'] . '" ' . $selected . '>' . $row_kategori['ID_Kategori'] . ' - ' . $row_kategori['Nama_Kategori'] . '</option>';
                        }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nama Destinasi</td>
                  <td><input class="form-control" type="text" name="Nama_Destinasi" required value="<?= $row['Nama_Destinasi'] ?>"></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td class="text-left">
                    <?php if (!empty($row['Foto'])) { ?>
                      <img src="../../img/destinasi/<?php echo $row['Foto'] ?>" class="mb-3" style="width: 250px; height: auto;">
                    <?php } ?>
                    <input class="form-control" type="file" name="Foto"  accept="image/png, image/jpg, image/jpeg">
                    <?php if (empty($_FILES['Foto']['name']) && !empty($row['Nama_File'])) { ?>
                      <input type="hidden" name="Foto" value="<?= $row['Foto'] ?>">
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td><input class="form-control" type="text" name="Deskripsi" required value="<?= $row['Deskripsi'] ?>"></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td><input class="form-control" type="number" name="Harga" required value="<?= $row['Harga'] ?>"></td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td><input class="form-control" type="text" name="Lokasi" required value="<?= $row['Lokasi'] ?>"></td>
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