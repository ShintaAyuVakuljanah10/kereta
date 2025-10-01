<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pemesanan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Laporan Pemesanan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Kode Tiket</th>
                <th>Penumpang Utama</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Metode Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($items)): ?>
                <?php foreach ($items as $r): ?>
                <tr>
                    <td><?= $r->id_pemesanan ?></td>
                    <td><?= $r->tanggal_pemesanan ?></td>
                    <td><?= $r->kode_tiket ?></td>
                    <td><?= $r->nama_penumpang ?? '-' ?></td>
                    <td><?= $r->jml_penumpang ?></td>
                    <td><?= number_format($r->total_harga, 0, ',', '.') ?></td>
                    <td><?= $r->status ?></td>
                    <td><?= $r->metode_pembayaran ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align:center">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
