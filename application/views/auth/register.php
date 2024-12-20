<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link href="<?= base_url('assets/adminlte/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url('assets/adminlte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url('assets/adminlte/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Salvatore</b>RH</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <!-- Flash Error Message -->
        <div style="color: red">
          <?php if (validation_errors()): ?>  
            <p><?php echo validation_errors(); ?></p>
          <?php elseif ($this->session->flashdata('error')): ?>
              <p><?php echo $this->session->flashdata('error'); ?></p>
          <?php endif; ?>
        </div>
        <!-- Form -->
        <?php echo form_open('auth/register'); ?>
          <!-- Login -->
          <div class="form-group has-feedback">
            <input type="text" name="login" id="login" class="form-control" placeholder="Login" required value="<?= set_value('login'); ?>" oninput="this.value = this.value.replace(/[^a-zA-Z0-9_]/g, '').toLowerCase();" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <!-- Password -->
          <div class="form-group has-feedback">
            <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <!-- Nom -->
          <div class="form-group has-feedback">
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required value="<?= set_value('nom'); ?>" />
            <span class="glyphicon glyphicon-tag form-control-feedback"></span>
          </div>

          <!-- Prenom -->
          <div class="form-group has-feedback">
            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" required value="<?= set_value('prenom'); ?>" />
            <span class="glyphicon glyphicon-tag form-control-feedback"></span>
          </div>

          <!-- Submit Button -->
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
          </div>
        <?php echo form_close(); ?>
        
        <a href="<?= site_url('auth/login'); ?>" class="text-center">I already have a account</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url('assets/adminlte/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/adminlte/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/adminlte/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
