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
                           <form role="form" action="<?= site_url('utilisateurDashboard/do_updateUser/'); ?><?= $user[0]->id; ?>" method="post">
                              <!-- text input -->
                              <div class="form-group">
                                 <label>Nom</label>
                                 <input type="text" class="form-control" value="<?= $user[0]->nom; ?>" name="nom" placeholder="nom">
                              </div>
                              <div class="form-group">
                                 <label>Prenom</label>
                                 <input type="text" class="form-control" value="<?= $user[0]->prenom; ?>" name="prenom" placeholder="prenom">
                              </div>
                              <div class="form-group">
                                 <label>Login</label>
                                 <input type="text" class="form-control" name="login" value="<?= $user[0]->login; ?>" placeholder="login">
                              </div>
                              <div class="form-group">
                                 <label>Mot de passe</label>
                                 <input type="password" class="form-control" name="mot_de_passe" placeholder="mot de passe">
                              </div>
                              <div class="form-group">
                                 <label>Role</label>
                                 <select class="form-control" name="role" value="<?= $user[0]->role; ?>">
                                    <option hidden selected><?= $user[0]->role; ?></option>
                                    <option>User</option>
                                    <option>Admin</option>
                                 </select>
                              </div>
                              <!-- submite btn -->
                                <div class="form-group">
                                 <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                           </form>
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