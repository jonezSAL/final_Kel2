<?php
session_start();

// Fungsi untuk mendapatkan koneksi ke database
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
?>

<?php
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
?>

<html>

<head>
    <title>Fast Travel</title>
    <style>
        body {
            background-image: url('http://anekatempatwisata.com/wp-content/uploads/2015/07/Gunung-Bromo-Jawa-Timur.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: 120px;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #FEA116;
            font-size: 25px;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 17px;
            margin-bottom: 30px;
            text-align: center;
        }

        .button {
            display: inline-block;
            background-color: #FEA116;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #b76d00;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .row span {
            font-weight: bold;
        }

        table {
            margin-top: 10px;
        }

        td:first-child {
            padding-right: 10px;
        }

        .button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Terima kasih telah melakukan booking!</h1>
        <p>Bukti pemesanan telah dikirim ke Email anda</p>
        <p>Berikut adalah bukti booking dari pemesanan yang telah Anda lakukan.</p>

        <table style="justify-content: center;">
            <tr>
                <td><strong>Nama Admin</strong></td>
                <td> : <?php echo $Nama_Admin; ?></td>
            </tr>
            <tr>
                <td><strong>Destinasi</strong></td>
                <td> : <?php echo $Nama_Destinasi; ?></td>
            </tr>
            <tr>
                <td><strong>Nama Pemesan</strong></td>
                <td> : <?php echo $Nama_Pemesan; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td> : <?php echo $Email; ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Pemesanan</strong></td>
                <td> : <?php echo date('d-m-Y', strtotime($Tanggal_Pemesanan)); ?></td>
            </tr>
            <tr>
                <td><strong>Harga</strong></td>
                <td> : Rp. <?php echo number_format($Harga, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><strong>Jumlah Tiket</strong></td>
                <td> : <?php echo $Jumlah_Tiket; ?></td>
            </tr>
            <tr>
                <td><strong>Total Harga</strong></td>
                <td> : Rp. <?php echo number_format($Total_Harga, 0, ',', '.'); ?></td>
            </tr>
        </table>
        <a href="index.php" class="button mt-5">Kembali</a>
    </div>
</body>

</html>

<?php
} else {
    // Redirect ke halaman booking jika tidak ada data yang tersimpan dalam session
    header('Location: index.php');
    exit();
}
?>
