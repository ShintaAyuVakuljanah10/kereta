<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .tiket-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 8px 0;
            font-size: 14px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .kode-tiket {
            font-size: 24px;
            font-weight: bold;
            color: green;
            text-align: center;
            margin-top: 20px;
        }

        .pembayaran-pending {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="tiket-container">
    <h2>Tiket Pemesanan</h2>

    <p><span class="label">ID Pemesanan:</span> <?= $pemesanan->id_pemesanan; ?></p>
    <p><span class="label">ID Tiket:</span> <?= $pemesanan->id_tiket; ?></p>
    <p><span class="label">Jumlah Penumpang:</span> <?= $pemesanan->jml_penumpang; ?></p>
    <p><span class="label">Total Harga:</span> Rp<?= number_format($pemesanan->total_harga, 0, ',', '.'); ?></p>
    <p><span class="label">Metode Pembayaran:</span> <?= $pemesanan->metode_pembayaran; ?></p>
    <p><span class="label">Status:</span> <?= $pemesanan->status; ?></p>

    <hr>

    <?php if ($pemesanan->status === 'lunas'): ?>
        <h3>Kode Tiket Anda</h3>
        <div class="kode-tiket">
            <?= $pemesanan->kode_tiket; ?>
        </div>
    <?php else: ?>
        <div class="pembayaran-pending">
            Silakan lakukan pembayaran terlebih dahulu untuk mendapatkan kode tiket.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
