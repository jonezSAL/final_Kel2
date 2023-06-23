<?php
session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception; 

  require './admin/helper/connection.php';
  require './PHPMailer/src/PHPMailer.php';
  require './PHPMailer/src/Exception.php';
  require './PHPMailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ID_Admin = $_POST['ID_Admin'];
  $ID_Destinasi = $_POST['ID_Destinasi'];
  $Nama_Pemesan = $_POST['Nama_Pemesan'];
  $Email = $_POST['Email'];
  $Tanggal_Pemesanan = $_POST['Tanggal_Pemesanan'];
  $Jumlah_Tiket = $_POST['Jumlah_Tiket'];

  // Query untuk mendapatkan harga per tiket destinasi yang dipilih
  $query_destinasi = mysqli_query($connection, "SELECT Harga FROM destinasi WHERE ID_Destinasi = '$ID_Destinasi'");
  $destinasi = mysqli_fetch_array($query_destinasi);
  $Harga = $destinasi['Harga'];

  $Total_Harga = $Jumlah_Tiket * $Harga;

  // Simpan data pemesanan dalam array session
  $_SESSION['booking_data'] = [
    'ID_Admin' => $ID_Admin,
    'ID_Destinasi' => $ID_Destinasi,
    'Nama_Pemesan' => $Nama_Pemesan,
    'Email' => $Email,
    'Tanggal_Pemesanan' => $Tanggal_Pemesanan,
    'Harga' => $Harga,
    'Jumlah_Tiket' => $Jumlah_Tiket,
    'Total_Harga' => $Total_Harga
  ];

  $query = mysqli_query($connection, "INSERT INTO pemesanan (ID_Admin, ID_Destinasi, Nama_Pemesan, Email, Tanggal_Pemesanan, Jumlah_Tiket, Total_Harga) 
  VALUES ('$ID_Admin', '$ID_Destinasi', '$Nama_Pemesan', '$Email', '$Tanggal_Pemesanan', '$Jumlah_Tiket', '$Total_Harga')");

function getConnection() {
  $host = 'localhost'; // Ganti dengan nama host database Anda
  $username = 'root'; // Ganti dengan nama pengguna database Anda
  $password = ''; // Ganti dengan kata sandi database Anda
  $database = 'final'; // Ganti dengan nama database Anda

  // Menghubungkan ke database menggunakan ekstensi MySQLi
  $connection = new mysqli($host, $username, $password, $database);

  // Periksa apakah ada kesalahan dalam koneksi
  if ($connection->connect_error) {
      die('Koneksi database gagal: ' . $connection->connect_error);
  }

  return $connection;
}

  function getNamaDestinasi($ID_Destinasi) {
    $connection = getConnection();

    // Query untuk mengambil nama destinasi berdasarkan ID destinasi
    $query = "SELECT Nama_Destinasi FROM destinasi WHERE ID_Destinasi = $ID_Destinasi";

    // Eksekusi query
    $result = $connection->query($query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Ambil baris hasil query
        $row = $result->fetch_assoc();

        // Periksa apakah ada hasil yang ditemukan
        if ($row) {
            return $row['Nama_Destinasi'];
        }
    }

    // Jika tidak ada data yang ditemukan, kembalikan nilai null atau lakukan tindakan yang sesuai
    return null;
}

function getNamaAdmin($ID_Admin) {
    $connection = getConnection();

    // Query untuk mengambil nama admin berdasarkan ID_Admin dengan menggunakan tabel 'pemesanan' sebagai jembatan
    $query = "SELECT admin.usser FROM admin
              INNER JOIN pemesanan ON admin.ID_Admin = pemesanan.ID_Admin
              INNER JOIN destinasi ON pemesanan.ID_Destinasi = destinasi.ID_Destinasi
              WHERE admin.ID_Admin = $ID_Admin";

    // Eksekusi query
    $result = $connection->query($query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Ambil baris hasil query
        $row = $result->fetch_assoc();

        // Periksa apakah ada hasil yang ditemukan
        if ($row) {
            return $row['usser'];
        }
    }

    // Jika tidak ada data yang ditemukan, kembalikan nilai null atau lakukan tindakan yang sesuai
    return null;
}

// Periksa apakah data pemesanan ada dalam session
if (isset($_SESSION['booking_data'])) {
    // Ambil data pemesanan dari session
    $booking_data = $_SESSION['booking_data'];
    $ID_Admin = $booking_data['ID_Admin'];
    $ID_Destinasi = $booking_data['ID_Destinasi'];
    $Nama_Pemesan = $booking_data['Nama_Pemesan'];
    $Email = $booking_data['Email'];
    $Tanggal_Pemesanan = $booking_data['Tanggal_Pemesanan'];
    $Harga = $booking_data['Harga'];
    $Jumlah_Tiket = $booking_data['Jumlah_Tiket'];
    $Total_Harga = $booking_data['Total_Harga'];

    // Mendapatkan nama destinasi berdasarkan ID_Destinasi
    $Nama_Destinasi = getNamaDestinasi($ID_Destinasi);

    // Mendapatkan nama admin berdasarkan ID_Admin
    $Nama_Admin = getNamaAdmin($ID_Admin);
  }

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';  // Ganti dengan host SMTP Anda
  $mail->Port = 587;  // Ganti dengan port SMTP Anda
  $mail->SMTPAuth = true;
  $mail->Username = 'alfaikhwan@gmail.com';  // Ganti dengan username SMTP Anda
  $mail->Password = 'phxtrkstpkpkyxyk';  // Ganti dengan password SMTP Anda
  $mail->setFrom('FastTravelGroup@Travel.com', 'FastTravel');  // Ganti dengan alamat email dan nama pengirim
  $mail->addAddress($Email, $Nama_Pemesan);  // Menggunakan alamat email pengguna sebagai penerima
  $mail->Subject = 'Booking Confirmation';


  // Mengubah tanggal saat ini menjadi objek DateTime
  $bookingDate = new DateTime($Tanggal_Pemesanan);

  // Format tanggal pemesanan sesuai keinginan
  $formattedBookingDate = $bookingDate->format('d-m-Y');

  // Mengubah harga menjadi format IDR
  $formattedHarga = 'Rp ' . number_format($Harga, 0, ',', '.');

  // Mengubah total harga menjadi format IDR
  $formattedTotalHarga = 'Rp ' . number_format($Total_Harga, 0, ',', '.');

  $mail->Body = "<html>
  <body>
      <h1>Hello $Nama_Pemesan,</h1>
      <p>Thank you for your booking!</p>
      <p>Here are your booking details :</p>
      <ul>
          <li>Nama Admin : $Nama_Admin</li>
          <li>Nama Destinasi : $Nama_Destinasi</li>
          <li>Nama Pemesan : $Nama_Pemesan</li>
          <li>Email : $Email</li>
          <li>Tanggal Pemesanan : $formattedBookingDate</li>
          <li>Harga : $formattedHarga</li>
          <li>Jumlah Tiket : $Jumlah_Tiket</li>
          <li>Total Harga : $formattedTotalHarga</li>
      </ul>
  </body>
  </html>";
  $mail->isHTML(true);

  
  if ($mail->send()) {
    echo 'Booking confirmation email has been sent successfully.';
  } else {
      echo 'Failed to send booking confirmation email. Error: ' . $mail->ErrorInfo;
  }

  if ($query) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menambah data'
    ];
    header('Location: ./booking_bukti.php');
  } else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => mysqli_error($connection)
    ];
    header('Location: ./booking_bukti.php');
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['destinasi'])) {
  $destinasi = $_GET['destinasi'];
  $query = mysqli_query($connection, "SELECT Harga FROM destinasi WHERE ID_Destinasi = '$destinasi'");
  $result = mysqli_fetch_assoc($query);
  echo $result['Harga'];
}