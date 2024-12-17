<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form action="<?php echo site_url('auth/do_register'); ?>" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>

        <label for="mot_de_passe">Password</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>

        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
