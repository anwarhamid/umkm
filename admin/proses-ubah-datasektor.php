<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data ID yang dikirim oleh modal_edit_delete_dkrt.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
// Proses ubah data ke Database
$sql = $pdo->prepare("UPDATE sektor SET nama=:nama, keterangan=:keterangan WHERE id_sektor=:id");
$sql->bindParam(':nama', $nama);
$sql->bindParam(':keterangan', $keterangan);
$sql->bindParam(':id', $id);
$execute = $sql->execute(); // Eksekusi / Jalankan query
if ($execute) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: data-sektor.php"); // Redirect ke halaman index.php
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='data_kriteria'>Kembali Ke Form</a>";
}
