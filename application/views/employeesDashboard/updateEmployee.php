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
         <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
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
                           <h3 class="box-title"> Modifier  employee</h3>
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
                              <div style="color: green">
                                 <?php if ($this->session->flashdata('success')): ?>
                                    <p><?php echo $this->session->flashdata('success'); ?></p>
                                 <?php endif; ?>
                              </div>
                              <?php echo form_open('employeesDashboard/updateEmployee/' . $employee->id); ?>
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Nom</label>
                                  <input type="text" class="form-control" value="<?= set_value('nom', $employee->nom); ?>" name="nom" placeholder="nom">
                                </div>
                                <div class="form-group">
                                  <label>Prenom</label>
                                  <input type="text" class="form-control" value="<?= set_value('prenom', $employee->prenom); ?>" name="prenom" placeholder="prenom">
                                </div>
                                <div class="form-group">
                                  <label>Mail</label>
                                  <input type="email" class="form-control" name="mail" value="<?= set_value('mail', $employee->mail); ?>" placeholder="mail">
                                </div>
                                <div class="form-group">
                                  <label>adresse</label>
                                  <input type="text" class="form-control" name="adresse" value="<?= set_value('adresse', $employee->adresse); ?>" placeholder="adresse">
                                </div>
                                <div class="form-group">
                                  <label>telephone</label>
                                  <input type="text" class="form-control" name="telephone" value="<?= set_value('telephone', $employee->telephone); ?>" placeholder="+1 234 567 8901">
                                </div>
                                <div class="form-group">
                                  <label>poste</label>
                                  <select class="form-control" name="poste">
                                    <option hidden selected><?= set_value('poste', $employee->poste); ?></option>
                                    <option value="Gérant">Gérant</option>
                                    <option value="Livreur">Livreur</option>
                                    <option value="Cuisinier">Cuisinier</option>
                                  </select>
                                </div>
                                <!-- submite btn -->
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