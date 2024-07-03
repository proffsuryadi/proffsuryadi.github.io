<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $mail = new PHPMailer(true);

    try {
        // Konfigurasi server SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'suryadisikocak@gmail.com'; // Ganti dengan alamat Gmail Anda
        $mail->Password = 'yourpassword'; // Ganti dengan password Gmail Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Pengirim dan penerima
        $mail->setFrom($email, $name);
        $mail->addAddress('suryadisikocak@gmail.com'); // Ganti dengan alamat email tujuan

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'Pesan dari Formulir Kontak';
        $mail->Body    = "Nama: $name<br>Email: $email<br>Pesan:<br>$pesan";
        $mail->AltBody = "Nama: $name\nEmail: $email\nPesan:\n$pesan";

        $mail->send();
        echo 'Email berhasil dikirim!';
    } catch (Exception $e) {
        echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Metode pengiriman tidak valid.';
}
?>
