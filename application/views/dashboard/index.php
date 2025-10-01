<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f6fa; margin: 0; padding: 0; }
        header { background: #2d89ef; color: white; padding: 15px; text-align: center; }
        .container { max-width: 1100px; margin: 20px auto; padding: 20px; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .card { background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center; }
        .card h3 { margin: 0; font-size: 16px; color: #555; }
        .card p { font-size: 28px; font-weight: bold; margin: 10px 0 0; color: #2d89ef; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; color: #2d89ef; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1><?= $title ?></h1>
        <p>Selamat datang, Admin 👋</p>
    </header>

    <div class="container">
        <nav>
            <a href="<?= site_url('dashboard') ?>">Dashboard</a>
            <a href="<?= site_url('tiket') ?>">Tiket</a>
            <a href="<?= site_url('user') ?>">User</a>
            <a href="<?= site_url('pemesanan') ?>">Pemesanan</a>
            <a href="<?= site_url('penumpang') ?>">Penumpang</a>
            <a href="<?= site_url('kereta') ?>">Kereta</a>
            <a href="<?= site_url('gerbong') ?>">Gerbong</a>
        </nav>

        <h2>Statistik Data</h2>
        <div class="cards">
            <div class="card">
                <h3>Total Tiket</h3>
                <p><?= $total_tiket ?></p>
            </div>
            <div class="card">
                <h3>Total User</h3>
                <p><?= $total_user ?></p>
            </div>
            <div class="card">
                <h3>Total Pemesanan</h3>
                <p><?= $total_pemesanan ?></p>
            </div>
            <div class="card">
                <h3>Total Penumpang</h3>
                <p><?= $total_penumpang ?></p>
            </div>
            <div class="card">
                <h3>Total Kereta</h3>
                <p><?= $total_kereta ?></p>
            </div>
            <div class="card">
                <h3>Total Gerbong</h3>
                <p><?= $total_gerbong ?></p>
            </div>
            <div class="card">
                <h3>Pemesanan Pending</h3>
                <p><?= $pemesanan_pending ?></p>
            </div>
            <div class="card">
                <h3>Pemesanan Lunas</h3>
                <p><?= $pemesanan_lunas ?></p>
            </div>
        </div>
    </div>
</body>
</html>
