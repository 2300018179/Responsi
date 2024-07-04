<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    $data = "Email: $email\nNama: $nama\nTanggal Antrian: $tanggal\nJam Antrian: $jam\n\n";

    $file = 'antrian.txt';

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo '<script>alert("Antrian berhasil disubmit!"); window.location.href = "form-antrian.html";</script>';
    } else {
        echo '<script>alert("Gagal menyimpan antrian."); window.location.href = "form-antrian.html";</script>';
    }
} else {
    echo '<script>alert("Akses tidak sah!"); window.location.href = "form-antrian.html";</script>';
}
?>
