<?php
session_start(); // Start session nya

include "koneksi.php"; // Load file koneksi.php

$username = $_POST['username']; // Ambil value username yang dikirim dari form
$password = $_POST['password']; // Ambil value password yang dikirim dari form
// Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
$sql = $pdo->prepare("SELECT * FROM admin WHERE username=:a");
$sql->bindParam(':a', $username);
$sql->execute(); // Eksekusi querynya

$data = $sql->fetch(); // Ambil datanya dari hasil query tadi
// Cek apakah variabel $data ada datanya atau tidak
if (password_verify($password, $data['password'])) {
    if (!empty($data)) { // Jika tidak sama dengan empty (kosong)
        $_SESSION['username'] = $data['username']; // Set session untuk username (simpan username di session)
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['gambar'] = $data['foto'];

        setcookie("message", "delete", time() - 1); // Kita delete cookie message

        header("location: index.php"); // Kita redirect ke halaman welcome.php
    } else { // Jika $data nya kosong
        // Buat sebuah cookie untuk menampung data pesan kesalahan
        setcookie("message", "Maaf, Username salah", time() + 10);

        header("location: login.php"); // Redirect kembali ke halaman index.php
    }
} else {
    setcookie("message", "Maaf, Password salah", time() + 10);

    header("location: login.php"); // Redirect kembali ke halaman index.php
}
