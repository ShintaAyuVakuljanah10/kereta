<h2>Data Pemesanan</h2>
<a href="<?php echo site_url('pemesanan/add'); ?>">Tambah Pemesanan</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>id_tiket</th><th>id_penumpang</th><th>id_gerbong</th><th>jml_penumpang</th><th>total_harga</th><th>status</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_pemesanan; ?></td><td><?php echo $i->id_tiket; ?></td><td><?php echo $i->id_penumpang; ?></td><td><?php echo $i->id_gerbong; ?></td><td><?php echo $i->jml_penumpang; ?></td><td><?php echo $i->total_harga; ?></td><td><?php echo $i->status; ?></td>
        <td>
            <a href="<?php echo site_url('pemesanan/edit/'.$i->id_pemesanan); ?>">Edit</a> |
            <a href="<?php echo site_url('pemesanan/delete/'.$i->id_pemesanan); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
