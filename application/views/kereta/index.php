<h2>Data Kereta</h2>
<a href="<?php echo site_url('kereta/add'); ?>">Tambah Kereta</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>nama</th><th>jam_keberangkatan</th><th>jam_tiba</th><th>titik_awal</th><th>titik_akhir</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_kereta; ?></td><td><?php echo $i->nama; ?></td><td><?php echo $i->jam_keberangkatan; ?></td><td><?php echo $i->jam_tiba; ?></td><td><?php echo $i->titik_awal; ?></td><td><?php echo $i->titik_akhir; ?></td>
        <td>
            <a href="<?php echo site_url('kereta/edit/'.$i->id_kereta); ?>">Edit</a> |
            <a href="<?php echo site_url('kereta/delete/'.$i->id_kereta); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
