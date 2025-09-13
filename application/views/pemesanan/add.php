<h2>Tambah Pemesanan</h2>
<form method="post">
	id_tiket: <input type="text" name="id_tiket" required><br>
	id_penumpang: <input type="text" name="id_penumpang" required><br>
	id_gerbong: <input type="text" name="id_gerbong" required><br>
	jml_penumpang: <input type="number" name="jml_penumpang" required><br>
	total_harga: <input type="number" name="total_harga" required><br>

	<!-- Pilihan metode pembayaran langsung -->
	Metode Pembayaran:
	<select name="metode_pembayaran" required>
		<option value="Transfer">Transfer</option>
		<option value="QRIS">QRIS</option>
		<option value="Cash">Cash</option>
	</select><br>

	<button type="submit">Bayar & Simpan</button>
</form>
