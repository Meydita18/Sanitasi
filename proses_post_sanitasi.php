<?php
// Fungsi sanitasi 
function bersihkan($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

$nim           = bersihkan($_POST['nim']);
$nama          = bersihkan($_POST['nama']);
$umur          = bersihkan($_POST['umur']);
$tempat_lahir  = bersihkan($_POST['tempat_lahir'] ?? '');
$tanggal_lahir = bersihkan($_POST['tanggal_lahir'] ?? '');
$no_hp         = bersihkan($_POST['no_hp'] ?? '');
$alamat        = bersihkan($_POST['alamat'] ?? '');
$email         = bersihkan($_POST['email'] ?? '');
$kota          = bersihkan($_POST['kota'] ?? '');

// Sanitasi Radio & Checkbox [cite: 17, 18]
$jk     = isset($_POST['jk']) ? bersihkan($_POST['jk']) : "-";
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "-";

$hobi_list = [];
if (!empty($_POST['hobi'])) {
    foreach ($_POST['hobi'] as $h) {
        $hobi_list[] = bersihkan($h);
    }
}
$hobi_output = implode(", ", $hobi_list);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Data POST</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background-color: #f4f7f6; }
        .result-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        b { color: #555; }
    </style>
</head>
<body>
    <div class="result-card">
        <h2>Hasil Input Data Mahasiswa (Metode POST)</h2>
        <p><b>NIM:</b> <?= $nim ?></p>
        <p><b>Nama:</b> <?= $nama ?></p>
        <p><b>Umur:</b> <?= $umur ?></p>
        <p><b>Kota:</b> 
            <?php 
            if ($kota == "Semarang") echo "Semarang";
            elseif ($kota == "Solo") echo "Solo";
            else echo "Kota Lainnya"; 
            ?>
        </p>
        <p><b>Jenis Kelamin:</b> <?= $jk ?></p>
        <p><b>Hobi:</b> <?= $hobi_output ?></p>
        <p><b>Email:</b> <?= $email ?></p>
    </div>
</body>
</html>