<h3>Total Bayar: Rp <?= number_format($pemesanan->total_harga,0,',','.') ?></h3>

<form action="<?= site_url('pemesanan/bayar') ?>" method="post">
    <input type="hidden" name="id_pemesanan" value="<?= $pemesanan->id_pemesanan ?>">
    
    <label>Pilih Metode Pembayaran</label>
    <select name="metode" required>
        <option value="transfer">Transfer Bank</option>
        <option value="qris">QRIS</option>
        <option value="cash">Cash</option>
    </select>
    
    <button type="submit">Bayar & Dapatkan Tiket</button>
</form>
