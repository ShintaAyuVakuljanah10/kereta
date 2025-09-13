<h2>Edit Kereta</h2>
<form method="post">
    nama: <input type="text" name="nama" value="<?php echo $item->nama; ?>"><br>
    jam_keberangkatan: <input type="text" name="jam_keberangkatan" value="<?php echo $item->jam_keberangkatan; ?>"><br>
    jam_tiba: <input type="text" name="jam_tiba" value="<?php echo $item->jam_tiba; ?>"><br>
    titik_awal: <input type="text" name="titik_awal" value="<?php echo $item->titik_awal; ?>"><br>
    titik_akhir: <input type="text" name="titik_akhir" value="<?php echo $item->titik_akhir; ?>"><br>

    <button type="submit">Update</button>
</form>
