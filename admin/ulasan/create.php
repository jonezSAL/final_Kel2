<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Admin</h1>
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
                <td>Destinasi</td>
                <td>
                  <select class="form-control" name="ID_Detail" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $array_detail = mysqli_query($connection, "SELECT ID_Detail, destinasi.Nama_Destinasi FROM detail_destinasi inner join 
                      destinasi on detail_destinasi.ID_Destinasi = destinasi.ID_Destinasi ORDER BY ID_Detail");
                      while ($detail = mysqli_fetch_array($array_detail)) {
                        echo '<option value="' . $detail['ID_Detail'] . '">' .  $detail['ID_Detail'] . ' - ' . $detail['Nama_Destinasi'] . '</option>';
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nama User</td>
                <td><input class="form-control" type="text" name="Nama_User" required></td>
              </tr>
              <tr>
                <td>Ulasan</td>
                <td><input class="form-control" type="text" name="Ulasan" required></td>
              </tr>
              <tr>
                <td>Rating</td>
                <td><input class="form-control" type="number" min="0" max="5" name="Rating" required></td>
              </tr>
                <td>
                  <input class="btn btn-primary" id="btnSubmit" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $("#btnSubmit").click(function () {
      var password = $("#password").val();
      var confirmPassword = $("#textconfirm").val();
      if (password != confirmPassword) {
        alert("Passwords Tidak Sama.");
          return false;
      }
        return true;
    });
  });
</script>

<?php
require_once '../layout/_bottom.php';
?>

