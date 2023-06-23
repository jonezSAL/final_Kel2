<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Gambar = $_GET['ID_Gambar'];
$query = mysqli_query($connection, "SELECT * FROM gambar WHERE ID_Gambar='$ID_Gambar'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Gambar Destinasi</h1>
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
              <input type="hidden" name="ID_Gambar" value="<?= $row['ID_Gambar'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Gambar</td>
                  <td><input class="form-control" required value="<?= $row['ID_Gambar'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Destinasi</td>
                  <td>
                    <select class="form-control" name="ID_Detail" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $array_detail = mysqli_query($connection, "SELECT ID_Detail, destinasi.Nama_Destinasi FROM detail_destinasi inner join destinasi on detail_destinasi.ID_Destinasi=destinasi.ID_Destinasi");
                          while ($detail = mysqli_fetch_array($array_detail)) {
                            $selected = ($detail['ID_Detail'] == $row['ID_Detail']) ? 'selected' : '';
                            echo '<option value="' . $detail['ID_Detail'] . '" ' . $selected . '>' . $detail['ID_Detail'] . ' - ' . $detail['Nama_Destinasi'] . '</option>';
                          }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Gambar</td>
                  <td class="text-left">
                    <?php if (!empty($row['Nama_File'])) { ?>
                      <img src="../../img/gambar/<?php echo $row['Nama_File'] ?>" class="mb-3" style="width: 250px; height: auto;">
                    <?php } ?>
                    <input class="form-control" type="file" name="Nama_File" accept="image/png, image/jpg, image/jpeg">
                    <?php if (empty($_FILES['Nama_File']['name']) && !empty($row['Nama_File'])) { ?>
                      <input type="hidden" name="Nama_File" value="<?= $row['Nama_File'] ?>">
                    <?php } ?>
                  </td>
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