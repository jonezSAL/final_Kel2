<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM pemesanan INNER JOIN destinasi ON pemesanan.ID_Destinasi=destinasi.ID_Destinasi
INNER JOIN admin ON pemesanan.ID_Admin=admin.ID_Admin");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Pemesanan</h1>
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
                  <th>Nama Admin</th>
                  <th>Nama Destinasi</th>
                  <th>Nama Pemesan</th>
                  <th>Email</th>
                  <th>Tgl Pesan</th>
                  <th>Jumlah Tiket</th>
                  <th>Total Harga</th>
                  <th style="width: 50px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr class="text-center">
                    <td><?= $data['ID_Pemesanan'] ?></td>
                    <td><?= $data['usser'] ?></td>
                    <td><?= $data['Nama_Destinasi'] ?></td>
                    <td><?= $data['Nama_Pemesan'] ?></td>
                    <td><?= $data['Email'] ?></td>
                    <td><?= date('d-m-Y', strtotime($data['Tanggal_Pemesanan'])) ?></td>
                    <td><?= $data['Jumlah_Tiket'] ?></td>
                    <td>Rp. <?= number_format($data['Total_Harga'], 0, ',', '.') ?></td>
                    <td>
                    <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?ID_Pemesanan=<?= $data['ID_Pemesanan'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
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