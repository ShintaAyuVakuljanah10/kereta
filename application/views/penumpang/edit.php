<h2>Edit Penumpang</h2>
<form method="post">
    id_user: <input type="text" name="id_user" value="<?php echo $item->id_user; ?>"><br>
    nik: <input type="text" name="nik" value="<?php echo $item->nik; ?>"><br>
    nama: <input type="text" name="nama" value="<?php echo $item->nama; ?>"><br>
    no_hp: <input type="text" name="no_hp" value="<?php echo $item->no_hp; ?>"><br>

    <button type="submit">Update</button>
</form>
