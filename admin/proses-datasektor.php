<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO sektor(id_sektor, nama, keterangan) 
        VALUES(:id_sektor,:nama,:keterangan)");
$sql->bindParam(':id_sektor', $id);
$sql->bindParam(':nama', $nama);
$sql->bindParam(':keterangan', $keterangan);
$sql->execute(); // Eksekusi query insert
if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: data-sektor.php"); // Redirect ke halaman index.php
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
