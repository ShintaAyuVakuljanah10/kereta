<h2>Pemesanan Tiket</h2>
<form method="post" action="<?= site_url('pemesanan/add'); ?>">
	<!-- <input type="hidden" name="id_tiket" value="<?= $tiket['id_tiket'] ?>"> -->


	Asal:
	<select name="asal" id="asal" required>
		<option value="">-- Pilih Asal --</option>
		<?php foreach($asal as $a): ?>
		<option value="<?= $a->titik_awal ?>"><?= $a->titik_awal ?></option>
		<?php endforeach; ?>
	</select>
	<br>

	Tujuan:
	<select name="tujuan" id="tujuan" required>
		<option value="">-- Pilih Tujuan --</option>
		<?php foreach($tujuan as $t): ?>
		<option value="<?= $t->titik_akhir ?>"><?= $t->titik_akhir ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>

	Pilih Kereta:
	<select name="id_kereta" id="kereta" required>
		<option value="">-- Pilih Kereta --</option>
		<?php foreach($tiket as $t): ?>
		<option value="<?= $t->id_kereta ?>" data-harga="<?= $t->harga ?>">
			<?= $t->nama ?> - Rp<?= number_format($t->harga,0,',','.') ?>
		</option>
		<?php endforeach; ?>
	</select>
	<br><br>

	Gerbong:
	<select name="id_gerbong" required>
		<option value="">-- Pilih Gerbong --</option>
		<?php foreach($gerbong as $g): ?>
		<option value="<?= $g->id_gerbong ?>"><?= $g->no_gerbong ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>

	<!-- Jumlah Penumpang -->
	Jumlah Penumpang:
	<input type="number" name="jml_penumpang" id="jml_penumpang" min="1" required>
	<br><br>

	<!-- Tempat muncul form data penumpang -->
	<div id="form_penumpang"></div>

	<!-- Total Harga -->
	<p>Total Harga: <span id="total_harga">0</span></p>
	<input type="hidden" name="total_harga" id="total_harga_input">

	<!-- Metode Pembayaran -->
	Metode Pembayaran:
	<select name="metode_pembayaran" required>
		<option value="Transfer">Transfer</option>
		<option value="QRIS">QRIS</option>
		<option value="Cash">Cash</option>
	</select><br><br>

	<button type="submit">Bayar & Simpan</button>
</form>

<script>
	let hargaTiket = 0;

	document.getElementById('kereta').addEventListener('change', function () {
		hargaTiket = parseInt(this.options[this.selectedIndex].getAttribute('data-harga')) || 0;
		hitungTotal();
	});

	document.getElementById('jml_penumpang').addEventListener('input', function () {
		let jumlah = parseInt(this.value) || 0;
		let container = document.getElementById('form_penumpang');
		container.innerHTML = '';

		for (let i = 1; i <= jumlah; i++) {
			container.innerHTML += `
                <fieldset style="margin-bottom:10px; border:1px solid #ccc; padding:10px;">
                    <legend>Penumpang ${i}</legend>
                    NIK: <input type="text" name="penumpang[${i}][nik]" required><br>
                    Nama: <input type="text" name="penumpang[${i}][nama]" required><br>
                    No_hp: <input type="number" name="penumpang[${i}][no_hp]" required><br>
                </fieldset>
            `;
		}
		hitungTotal();
	});

	function hitungTotal() {
		let jumlah = parseInt(document.getElementById('jml_penumpang').value) || 0;
		let total = hargaTiket * jumlah;
		document.getElementById('total_harga').innerText = "Rp" + total.toLocaleString();
		document.getElementById('total_harga_input').value = total;
	}

</script>
