<h2>Transaksi Pembayaran</h2>

<p><strong>ID Pemesanan:</strong> <?= $pemesanan->id_pemesanan; ?></p>
<p><strong>Status:</strong> <?= $pemesanan->status; ?></p>

<?php if ($pemesanan->status !== 'lunas'): ?>
    <form method="post" action="<?= site_url('pemesanan/bayar'); ?>">
        <input type="hidden" name="id_pemesanan" value="<?= $pemesanan->id_pemesanan; ?>">

        <label>Metode Pembayaran:</label>
        <select name="metode" required>
            <option value="Transfer">Transfer</option>
            <option value="QRIS">QRIS</option>
            <option value="Cash">Cash</option>
        </select>
        <br><br>
        <button type="submit">Bayar Sekarang</button>
    </form>
<?php else: ?>
    <p style="color: green;">Pembayaran sudah dilakukan. <a href="<?= site_url('pemesanan/tiket/'.$pemesanan->id_pemesanan); ?>">Lihat Tiket</a></p>
<?php endif; ?>
