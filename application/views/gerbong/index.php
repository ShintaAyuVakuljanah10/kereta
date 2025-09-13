<h2>Data Gerbong</h2>
<a href="<?php echo base_url('gerbong/add'); ?>">Tambah Gerbong</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>id_kereta</th><th>kapasitas</th><th>no_gerbong</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_gerbong; ?></td><td><?php echo $i->id_kereta; ?></td><td><?php echo $i->kapasitas; ?></td><td><?php echo $i->no_gerbong; ?></td>
        <td>
            <a href="<?php echo site_url('gerbong/edit/'.$i->id_gerbong); ?>">Edit</a> |
            <a href="<?php echo site_url('gerbong/delete/'.$i->id_gerbong); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
