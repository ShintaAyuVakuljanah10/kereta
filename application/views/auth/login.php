<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 300px;
            margin: 100px auto; /* Ini yang membuat form berada di tengah */
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
        }

        p {
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align:center;">Login</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="error"><?= $this->session->flashdata('error') ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/login') ?>">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="<?= site_url('auth/register') ?>">Daftar</a></p>
</div>

</body>
</html>
