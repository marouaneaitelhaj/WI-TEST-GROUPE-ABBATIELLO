<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form action="<?php echo site_url('auth/do_login'); ?>" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>

        <label for="mot_de_passe">Password</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>

        <button type="submit">Login</button>
    </form>

    <a href="<?php echo site_url('auth/register'); ?>">Register</a>
</body>
</html>
