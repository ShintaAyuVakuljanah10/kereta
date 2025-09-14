<h2>Transaksi Pembayaran</h2>
<form method="post" action="<?= site_url('pemesanan/bayar') ?>">
    <input type="hidden" name="id_pemesanan" value="<?= $pemesanan->id_pemesanan ?>">

    <p><b>ID Tiket:</b> <?= $pemesanan->id_tiket ?></p>
    <p><b>Tujuan:</b> <?= $pemesanan->id_tiket ?></p>
    <p><b>Total Harga:</b> Rp <?= number_format($pemesanan->total_harga) ?></p>

    <h4>Pilih Metode Pembayaran:</h4>
    <label><input type="radio" name="metode" value="DANA"> DANA</label>
    <label><input type="radio" name="metode" value="BRI"> BRI</label>
    <label><input type="radio" name="metode" value="BNI"> BNI</label>
    <label><input type="radio" name="metode" value="Mandiri"> Mandiri</label>
    <label><input type="radio" name="metode" value="GoPay"> GoPay</label>

    <br><br>
    <button type="submit">Konfirmasi Bayar</button>
</form>