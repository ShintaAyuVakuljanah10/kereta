<h2>Tiket Anda</h2>
<p>ID Pemesanan: <?php echo $item->id_pemesanan; ?></p>
<p>Total: <?php echo $item->total_harga; ?></p>
<p>Status: <?php echo $item->status; ?></p>
<img src="<?php echo base_url($item->qr_code); ?>" alt="QR Code">
