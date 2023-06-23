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
                <td>Username</td>
                <td><input class="form-control" type="text" name="usser" required></td>
              </tr>
              <tr>
                <td for="password">Password</td>
                <td>
                  <input class="form-control" type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                  title="Password harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" required>
                </td>
              </tr>
              <tr>
                <td>Konfirmasi Password</td>
                <td>
                  <input class="form-control" type="password" id="textconfirm" name="password" required>
                </td>
              </tr>
              <tr>
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
        alert("Password Tidak Sama.");
          return false;
      }
        return true;
    });
  });
</script>

<?php
require_once '../layout/_bottom.php';
?>

