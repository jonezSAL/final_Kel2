<?php
// Mendapatkan data dari permintaan POST
$Nama_User = $_POST['Nama_User'];
$Ulasan = $_POST['Ulasan'];
$Rating = $_POST['Rating'];
$IDdestinasi = $_POST['ID_Destinasi'];

// Menghubungkan ke database (Anda perlu mengganti detail koneksi sesuai dengan pengaturan server Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Menyimpan data ke dalam tabel "ulasan"
$sql = "INSERT INTO ulasan (Nama_User, Ulasan, Rating, ID_Detail) 
        SELECT '$Nama_User', '$Ulasan', '$Rating', detail_destinasi.ID_Detail 
        FROM destinasi 
        INNER JOIN detail_destinasi ON destinasi.ID_Destinasi = detail_destinasi.ID_Destinasi 
        WHERE destinasi.ID_Destinasi = '$IDdestinasi'";

if ($conn->query($sql) === TRUE) {
    header("Location: detail_destinasi.php?ID_Destinasi=$IDdestinasi");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
