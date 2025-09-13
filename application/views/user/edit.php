<h2>Edit User</h2>
<form method="post">
    username: <input type="text" name="username" value="<?php echo $item->username; ?>"><br>
    password: <input type="text" name="password" value="<?php echo $item->password; ?>"><br>
    role: <input type="text" name="role" value="<?php echo $item->role; ?>"><br>
    no_hp: <input type="text" name="no_hp" value="<?php echo $item->no_hp; ?>"><br>

    <button type="submit">Update</button>
</form>
