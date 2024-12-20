<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('components/user_header'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Utilisateur
         <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Utilisateur</a></li>
         <li><a href="#">Ajoute</a></li>
         <!-- <li class="active">Data tables</li> -->
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <!-- <div class="box-header">
                  <a class="box-title" href="updateUser">
                  <button class="btn btn-block btn-primary">Modifier</button>
                  </a>
               </div> -->
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="col">
                     <!-- general form elements disabled -->
                     <div class="box box-warning">
                        <div class="box-header">
                           <h3 class="box-title"> Modifier un nouvel utilisateur</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                              <div style="color: red">
                                 <?php if (validation_errors()): ?>  
                                    <p><?php echo validation_errors(); ?></p>
                                 <?php elseif ($this->session->flashdata('error')): ?>
                                    <p><?php echo $this->session->flashdata('error'); ?></p>
                                 <?php endif; ?>
                              </div>
                              <div style="color: green">
                                 <?php if ($this->session->flashdata('success')): ?>
                                    <p><?php echo $this->session->flashdata('success'); ?></p>
                                 <?php endif; ?>
                              </div>
                              <?php echo form_open('adminDashboard/updateUser/' . $user->id); ?>
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Nom</label>
                                  <input type="text" class="form-control" value="<?= set_value('nom', $user->nom); ?>" name="nom" placeholder="nom">
                                </div>
                                <div class="form-group">
                                  <label>Prenom</label>
                                  <input type="text" class="form-control" value="<?= set_value('prenom', $user->prenom); ?>" name="prenom" placeholder="prenom">
                                </div>
                                <div class="form-group">
                                  <label>Login</label>
                                  <input type="text" class="form-control" name="login" value="<?= set_value('login', $user->login); ?>" placeholder="login">
                                </div>
                                <div class="form-group">
                                  <label>Mot de passe</label>
                                  <input type="password" class="form-control" name="mot_de_passe" placeholder="mot de passe">
                                </div>
                                <div class="form-group">
                                  <label>Role</label>
                                  <select class="form-control" name="role">
                                    <option hidden selected><?= set_value('role', $user->role); ?></option>
                                    <option>User</option>
                                    <option>Admin</option>
                                  </select>
                                </div>
                                <!-- submit btn -->
                                 <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Modifier</button>
                                 </div>
                              <?php echo form_close(); ?>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('includes/footer'); ?>