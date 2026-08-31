<?php   

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";

$wilayah = [
    "Pekanbaru",
    "Duri",
    "Dumai",
    "Kerinci / Pelalawan",
    "Siak",
    "Minas",
    "Kandis",
    "Bangkinang / Kampar",
    "Rengat / Indragiri Hulu",
    "Tembilahan / Indragiri Hilir",
    "Kuantan Singingi (Kuansing)",
    "Rohul (Rokan Hulu)",
    "Rohil (Rokan Hilir)",
    "Bengkalis"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Naposo Batak Riau</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>
    <div class="bg-shape shape3"></div>

    <div class="container">
        <div class="hero">
            <span class="badge">Naposo Batak Se-Riau</span>
            <h1>BATAK</h1>
            <p>Daftar Anggota Naposo Batak Riau per wilayah. Silakan isi nama pada wilayah masing-masing.</p>
        </div>

        <div class="cards-grid">
            <?php foreach($wilayah as $w): ?>
                <?php
                $wilayah_aman = mysqli_real_escape_string($conn, $w);
                $data = mysqli_query($conn, "SELECT * FROM anggota WHERE wilayah='$wilayah_aman' ORDER BY id ASC");
                $jumlah = mysqli_num_rows($data);
                ?>

                <div class="card">
                    <div class="card-head">
                        <div class="title-wrap">
                            <span class="pin">📍</span>
                            <h3>Wilayah <?= htmlspecialchars($w); ?></h3>
                        </div>
                        <span class="count"><?= $jumlah; ?> anggota</span>
                    </div>

                    <?php if($jumlah > 0): ?>
                        <ol class="member-list">
                            <?php while($row = mysqli_fetch_assoc($data)): ?>
                                <li><?= htmlspecialchars($row['nama']); ?></li>
                            <?php endwhile; ?>
                        </ol>
                    <?php else: ?>
                        <p class="empty-text">Belum ada anggota di wilayah ini.</p>
                    <?php endif; ?>

                    <form class="member-form" action="tambah.php" method="POST">
                        <input type="hidden" name="wilayah" value="<?= htmlspecialchars($w); ?>">

                        <input 
                            type="text" 
                            name="nama" 
                            placeholder="Masukkan nama anggota"
                            required
                        >

                        <button type="submit">Tambah</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="footer-note">
            Dibuat untuk komunitas Naposo Batak Riau
        </div>
    </div>

</body>
</html>