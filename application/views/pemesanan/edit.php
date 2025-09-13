<h2>Edit Pemesanan</h2>
<form method="post">
    id_tiket: <input type="text" name="id_tiket" value="<?php echo $item->id_tiket; ?>"><br>
    id_penumpang: <input type="text" name="id_penumpang" value="<?php echo $item->id_penumpang; ?>"><br>
    id_gerbong: <input type="text" name="id_gerbong" value="<?php echo $item->id_gerbong; ?>"><br>
    jml_penumpang: <input type="text" name="jml_penumpang" value="<?php echo $item->jml_penumpang; ?>"><br>
    total_harga: <input type="text" name="total_harga" value="<?php echo $item->total_harga; ?>"><br>
    status: <input type="text" name="status" value="<?php echo $item->status; ?>"><br>

    <button type="submit">Update</button>
</form>
