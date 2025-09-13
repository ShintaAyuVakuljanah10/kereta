<h2>Data Penumpang</h2>
<a href="<?php echo site_url('tiket'); ?>">tiket</a>
<a href="<?php echo site_url('user'); ?>">user</a>
<a href="<?php echo site_url('pemesanan'); ?>">pemesanan</a>
<a href="<?php echo site_url('kereta'); ?>">kereta</a>
<a href="<?php echo site_url('gerbong'); ?>">gerbong</a><br>
<a href="<?php echo site_url('penumpang/add'); ?>">Tambah Penumpang</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>id_user</th><th>nik</th><th>nama</th><th>no_hp</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_penumpang; ?></td><td><?php echo $i->id_user; ?></td><td><?php echo $i->nik; ?></td><td><?php echo $i->nama; ?></td><td><?php echo $i->no_hp; ?></td>
        <td>
            <a href="<?php echo site_url('penumpang/edit/'.$i->id_penumpang); ?>">Edit</a> |
            <a href="<?php echo site_url('penumpang/delete/'.$i->id_penumpang); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
