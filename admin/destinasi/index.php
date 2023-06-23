<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM  destinasi inner join kategori_destinasi on 
destinasi.ID_Kategori=kategori_destinasi.ID_Kategori");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Destinasi</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th style="width: 30px">ID</th>
                  <th style="width: 100px">Nama Kategori</th>
                  <th>Nama Destinasi</th>
                  <th style="width: 350px" >Foto</th>
                  <th style="width: 250px">Deskripsi</th>
                  <th style="width: 100px">Harga</th>
                  <th style="width: 50px">Lokasi</th>
                  <th style="width: 50px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr class="text-center">
                    <td><?= $data['ID_Destinasi'] ?></td>
                    <td><?= $data['Nama_Kategori'] ?></td>
                    <td><?= $data['Nama_Destinasi'] ?></td>
                    <td><img src="../../img/destinasi/<?php echo $data['Foto'] ?>" style="width: 200px; height: auto;"></td>
                    <td class="text-justify"><?= $data['Deskripsi'] ?></td>
                    <td>Rp. <?= number_format($data['Harga'], 0, ',', '.') ?></td>
                    <td><?= $data['Lokasi'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?ID_Destinasi=<?= $data['ID_Destinasi'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?ID_Destinasi=<?= $data['ID_Destinasi'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                  endwhile;
                  ?>       
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>