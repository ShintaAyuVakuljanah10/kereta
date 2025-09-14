<h2>Tiket Pemesanan</h2>

<p><b>ID Pemesanan:</b> <?= $pemesanan->id_pemesanan; ?></p>
<p><b>ID Tiket:</b> <?= $pemesanan->id_tiket; ?></p>
<p><b>Jumlah Penumpang:</b> <?= $pemesanan->jml_penumpang; ?></p>
<p><b>Total Harga:</b> Rp<?= number_format($pemesanan->total_harga, 0, ',', '.'); ?></p>
<p><b>Metode Pembayaran:</b> <?= $pemesanan->metode_pembayaran; ?></p>
<p><b>Status:</b> <?= $pemesanan->status; ?></p>

<hr>
<h3>Kode Tiket Anda:</h3>
<div style="font-size:24px; font-weight:bold; color:green;">
    <?= $pemesanan->kode_tiket; ?>
</div>
