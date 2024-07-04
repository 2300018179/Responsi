<?php

function readQueueData() {
    $file = 'antrian.txt';
    $antrianData = [];

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $currentItem = [];
        foreach ($lines as $line) {
            if (empty(trim($line))) {
                if (!empty($currentItem)) {
                    $antrianData[] = $currentItem;
                    $currentItem = [];
                }
            } else {
                preg_match('/Email:\s*(.*)/', $line, $matches);
                if (!empty($matches)) {
                    $currentItem['email'] = $matches[1];
                }
                preg_match('/Nama:\s*(.*)/', $line, $matches);
                if (!empty($matches)) {
                    $currentItem['nama'] = $matches[1];
                }
                preg_match('/Tanggal Antrian:\s*(.*)/', $line, $matches);
                if (!empty($matches)) {
                    $currentItem['tanggal'] = $matches[1];
                }
                preg_match('/Jam Antrian:\s*(.*)/', $line, $matches);
                if (!empty($matches)) {
                    $currentItem['jam'] = $matches[1];
                }
            }
        }
        if (!empty($currentItem)) {
            $antrianData[] = $currentItem;
        }
    }

    return $antrianData;
}

$dataAntrian = readQueueData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Antrian - Barbershop By ACDRLAW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="layanan.html">Layanan Kami</a></li>
                <li><a href="product.html">Product</a></li>
                <li><a href="form-antrian.html">Form Antrian</a></li>
                <li><a href="manager-antrian.php">Daftar Antrian</a></li>
                <li><a href="galeri.html">Jenis Potongan Rambut</a></li>
                <li><a href="lokasi.html">Lokasi</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="antrian">
            <h2 align="center">Daftar Antrian</h2>
            <?php if (empty($dataAntrian)): ?>
                <p>Tidak ada antrian saat ini.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Tanggal Antrian</th>
                            <th>Jam Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataAntrian as $antrian): ?>
                            <tr>
                                <td><?php echo $antrian['email']; ?></td>
                                <td><?php echo $antrian['nama']; ?></td>
                                <td><?php echo $antrian['tanggal']; ?></td>
                                <td><?php echo $antrian['jam']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
