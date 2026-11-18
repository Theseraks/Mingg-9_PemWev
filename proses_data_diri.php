<?php
// Ambil data dari form dengan metode POST
$nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
$tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
$hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];

// Fungsi untuk mengubah format tanggal ke bahasa Indonesia
function formatTanggalIndonesia($tanggal) {
    $bulanIndonesia = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $pecah = explode('-', $tanggal);
    $tahun = $pecah[0];
    $bulan = (int)$pecah[1];
    $hari = (int)$pecah[2];

    return $hari . ' ' . $bulanIndonesia[$bulan] . ' ' . $tahun;
}

// Format tanggal lahir
$tanggal_format = formatTanggalIndonesia($tanggal_lahir);

// Gabungkan hobi
if (count($hobi) > 0) {
    $hobi_text = implode(', ', $hobi);
} else {
    $hobi_text = 'Tidak ada hobi yang dipilih';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Diri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .data-item {
            margin-bottom: 15px;
        }
        .data-item span.label {
            font-weight: bold;
            color: #555;
        }
        .data-item span.value {
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Data Diri</h2>

        <div class="data-item">
            <span class="label">Nama Lengkap:</span>
            <span class="value"><?php echo $nama; ?></span>
        </div>

        <div class="data-item">
            <span class="label">Tanggal Lahir:</span>
            <span class="value"><?php echo $tanggal_format; ?></span>
        </div>

        <div class="data-item">
            <span class="label">Hobi:</span>
            <span class="value"><?php echo $hobi_text; ?></span>
        </div>

        <a href="form_data_diri.html">Kembali ke Form</a>
    </div>
</body>
</html>
