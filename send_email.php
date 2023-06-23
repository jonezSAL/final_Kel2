<?php
require 'vendor/autoload.php'; // Menggunakan autoloader dari Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start(); // Tambahkan session_start() di awal script

if (isset($_SESSION['booking_data'])) {
    // Ambil data pemesanan dari session
    $booking_data = $_SESSION['booking_data'];
    $ID_Admin = $booking_data['ID_Admin'];
    $ID_Destinasi = $booking_data['ID_Destinasi'];
    $Nama_Pemesan = $booking_data['Nama_Pemesan'];
    $Tanggal_Pemesanan = $booking_data['Tanggal_Pemesanan'];
    $Harga = $booking_data['Harga'];
    $Jumlah_Tiket = $booking_data['Jumlah_Tiket'];
    $Total_Harga = $booking_data['Total_Harga'];
    $Email = $booking_data['Email'];

    // Konfigurasi email
    $mail = new PHPMailer(true); // Gunakan "true" untuk menampilkan kesalahan jika terjadi
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'joneslumbantoruan9@gmail.com'; // Ganti dengan alamat email Anda
        $mail->Password = 'Tiar_tiur27'; // Ganti dengan password email Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('joneslumbantoruan9@gmail.com', 'FAST TRAVEL'); // Ganti dengan alamat email dan nama Anda
        $mail->addAddress($Email); // Alamat email penerima
        $mail->isHTML(true);
        
        // Konten email
        $mail->Subject = 'Konfirmasi Pemesanan';
        $mail->Body = "Terima kasih atas pemesanan tiket Anda. Berikut detail pemesanan:<br><br>"
            . "ID Admin: $ID_Admin<br>"
            . "ID Destinasi: $ID_Destinasi<br>"
            . "Nama Pemesan: $Nama_Pemesan<br>"
            . "Tanggal Pemesanan: $Tanggal_Pemesanan<br>"
            . "Harga: $Harga<br>"
            . "Jumlah Tiket: $Jumlah_Tiket<br>"
            . "Total Harga: $Total_Harga<br><br>"
            . "Silakan melakukan pembayaran sesuai dengan instruksi yang diberikan. Terima kasih.";

        // Kirim email
        $mail->send();
        echo 'Email berhasil dikirim.';
    } catch (Exception $e) {
        echo 'Email gagal dikirim. Kesalahan: ', $mail->ErrorInfo;
    }
} else {
    echo 'Data pemesanan tidak tersedia.';
}
?>