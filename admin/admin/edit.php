<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$ID_Admin = $_GET['ID_Admin'];
$query = mysqli_query($connection, "SELECT * FROM admin WHERE ID_Admin='$ID_Admin'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Admin</h1>
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
              <input type="hidden" name="ID_Admin" value="<?= $row['ID_Admin'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Admin</td>
                  <td><input class="form-control" type="number" name="ID_Admin" size="20" required value="<?= $row['ID_Admin'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><input class="form-control" type="text" name="usser" size="20" required value="<?= $row['usser'] ?>"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td>
                    <input class="form-control" type="password" id="password" size="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Password harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" 
                    required value="<?= $row['password'] ?>">
                  </td>
                </tr>
                <tr>
                  <td>Konfirmasi Password</td>
                  <td>
                    <input class="form-control" type="password" id="textconfirm" name="password"
                    required value="<?= $row['password'] ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" id="btnSubmit" type="submit" name="proses" value="Ubah">
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