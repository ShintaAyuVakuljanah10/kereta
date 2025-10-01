<h2><?= $title ?></h2>
<div>
    <a href="<?php echo site_url('tiket'); ?>">tiket</a>
    <a href="<?php echo site_url('user'); ?>">user</a>
    <a href="<?php echo site_url('pemesanan'); ?>">pemesanan</a>
    <a href="<?php echo site_url('penumpang'); ?>">penumpang</a>
    <a href="<?php echo site_url('kereta'); ?>">kereta</a>
    <a href="<?php echo site_url('gerbong'); ?>">gerbong</a>
</div>
<br>

<form method="get">
    <label>Mulai</label>
    <input type="date" name="start_date" value="<?= $filters['start_date'] ?? '' ?>">
    <label>Sampai</label>
    <input type="date" name="end_date" value="<?= $filters['end_date'] ?? '' ?>">
    <label>Status</label>
    <select name="status">
        <option value="">-- Semua --</option>
        <option value="pending" <?= isset($filters['status']) && $filters['status']=='pending'?'selected':''; ?>>Pending</option>
        <option value="lunas" <?= isset($filters['status']) && $filters['status']=='lunas'?'selected':''; ?>>Lunas</option>
    </select>
    <button type="submit">Filter</button>
</form>

<a href="<?= site_url('laporan/export_pdf?'.http_build_query($filters)) ?>">Export PDF</a>
<a href="<?= site_url('laporan/export_excel?'.http_build_query($filters)) ?>">Export Excel</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Kode Tiket</th>
        <th>Penumpang</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Status</th>
        <th>Metode</th>
    </tr>
    <?php foreach($items as $row): ?>
    <tr>
        <td><?= $row->id_pemesanan ?></td>
        <td><?= $row->tanggal_pemesanan ?></td>
        <td><?= $row->kode_tiket ?></td>
        <td><?= $row->nama_penumpang ?></td>
        <td><?= $row->jml_penumpang ?></td>
        <td><?= number_format($row->total_harga,0,',','.') ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->metode_pembayaran ?></td>
    </tr>
    <?php endforeach; ?>
</table>
