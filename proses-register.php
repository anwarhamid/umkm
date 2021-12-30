<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmY_') . $foto;
// Set path folder tempat menyimpan fotonya
$path = "images/" . $fotobaru;
// Proses upload
if (move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO admin(nama, username, password, foto) 
        VALUES(:nama,:username,:password,:foto)");
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':username', $username);
    $sql->bindParam(':password', $password);
    $sql->bindParam(':foto', $fotobaru);
    $sql->execute(); // Eksekusi query insert
    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        setcookie(
            "message",
            "Selamat, akun anda berhasil terdaftar silahkan login!",
            time() + 10
        );
        header("location: login.php"); // Redirect ke halaman index.php
    } else {
        // Jika Gagal, Lakukan :
        setcookie("message", "Maaf, Data tidak dapat tersimpan", time() + 10);
        header("location: register.php");
    }
} else {
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
