<h2>Data Tiket</h2>
<a href="<?php echo site_url('tiket/add'); ?>">Tambah Tiket</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>id_kereta</th><th>harga</th><th>tanggal</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_tiket; ?></td><td><?php echo $i->id_kereta; ?></td><td><?php echo $i->harga; ?></td><td><?php echo $i->tanggal; ?></td>
        <td>
            <a href="<?php echo site_url('tiket/edit/'.$i->id_tiket); ?>">Edit</a> |
            <a href="<?php echo site_url('tiket/delete/'.$i->id_tiket); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
