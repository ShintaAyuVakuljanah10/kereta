<h2>Data User</h2>
<a href="<?php echo site_url('tiket'); ?>">tiket</a>
<a href="<?php echo site_url('penumpang'); ?>">penumpang</a>
<a href="<?php echo site_url('pemesanan'); ?>">pemesanan</a>
<a href="<?php echo site_url('kereta'); ?>">kereta</a>
<a href="<?php echo site_url('gerbong'); ?>">gerbong</a><br>
<a href="<?php echo site_url('user/add'); ?>">Tambah User</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>username</th><th>password</th><th>role</th><th>no_hp</th><th>Aksi</th>
    </tr>
    <?php foreach($items as $i): ?>
    <tr>
        <td><?php echo $i->id_user; ?></td><td><?php echo $i->username; ?></td><td><?php echo $i->password; ?></td><td><?php echo $i->role; ?></td><td><?php echo $i->no_hp; ?></td>
        <td>
            <a href="<?php echo site_url('user/edit/'.$i->id_user); ?>">Edit</a> |
            <a href="<?php echo site_url('user/delete/'.$i->id_user); ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
