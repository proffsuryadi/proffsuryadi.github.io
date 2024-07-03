<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $to = "suryadisikocak@gmail.com";
    $subject = "Pesan dari Formulir Kontak";
    $body = "Nama: $name\nEmail: $email\nPesan:\n$pesan";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Email berhasil dikirim!";
    } else {
        echo "Email gagal dikirim.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>
