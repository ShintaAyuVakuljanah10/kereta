<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .box { width: 350px; margin: 100px auto; padding: 20px; background: #fff;
               border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,.2); }
        .box h2 { text-align: center; margin-bottom: 20px; }
        .box input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; }
        .btn { background: #3498db; color: #fff; border: none; padding: 10px; border-radius: 5px; cursor: pointer; width: 100%; }
        .btn:hover { background: #2980b9; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
        <?php if($this->session->flashdata('error')): ?>
            <div class="error"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('auth/login') ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
