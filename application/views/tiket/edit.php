<h2>Edit Tiket</h2>
<form method="post">
    id_kereta: <input type="text" name="id_kereta" value="<?php echo $item->id_kereta; ?>"><br>
    harga: <input type="text" name="harga" value="<?php echo $item->harga; ?>"><br>
    tanggal: <input type="text" name="tanggal" value="<?php echo $item->tanggal; ?>"><br>

    <button type="submit">Update</button>
</form>
