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
         Employee
         <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>
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
                  <a class="box-title" href="createEmployee">
                  <button class="btn btn-block btn-primary">Ajouter</button>
                  </a>
               </div> -->
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="col">
                     <!-- general form elements disabled -->
                     <div class="box box-warning">
                        <div class="box-header">
                           <h3 class="box-title"> Ajouter un nouvel Employee</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <form role="form" action="<?= site_url('employeesDashboard/do_createEmployee'); ?>" method="post">
                              <!-- text input -->
                              <div class="form-group">
                                 <label>Nom</label>
                                 <input type="text" class="form-control" name="nom" placeholder="nom">
                              </div>
                              <div class="form-group">
                                 <label>Prenom</label>
                                 <input type="text" class="form-control" name="prenom" placeholder="prenom">
                              </div>
                              <div class="form-group">
                                 <label>Mail</label>
                                 <input type="email" class="form-control" name="mail" placeholder="Mail">
                              </div>
                              <div class="form-group">
                                 <label>adresse</label>
                                 <input type="text" class="form-control" name="adresse" placeholder="adresse">
                              </div>
                              <div class="form-group">
                                 <label>Telephone</label>
                                 <input type="text" class="form-control" name="telephone" placeholder="Telephone">
                              </div>
                              <div class="form-group">
                                 <label>Poste</label>
                                 <select class="form-control" name="poste">
                                    <option value="Gérant">Gérant</option>
                                    <option value="Livreur">Livreur</option>
                                    <option value="Cuisinier">Cuisinier</option>
                                 </select>
                              </div>
                              <!-- submite btn -->
                                <div class="form-group">
                                 <button type="submit" class="btn btn-primary">Ajouter</button>
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