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
            <li><a href="#">List</a></li>
            <!-- <li class="active">Data tables</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
			  <div class="box-header">
                  <a class="box-title" href="createEmployee">
					<button class="btn btn-block btn-primary">Ajouter</button>
				  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>mail</th>
                        <th>adresse</th>
                        <th>telephone</th>
                        <th>poste</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($employees as $key=>$user): ?>
                      <tr>
                        <td><?php echo $user->id; ?></td>
						<td><?php echo $user->nom; ?></td>
						<td><?php echo $user->prenom; ?></td>
						<td><?php echo $user->mail; ?></td>
						<td><?php echo $user->adresse; ?></td>
						<td><?php echo $user->telephone; ?></td>
						<td><?php echo $user->poste; ?></td>
						<td>
						<div class="btn-group">
	<button type="button" class="btn btn-success">Action</button>
	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a href="updateEmployee/<?php echo $user->id; ?>">Modifier</a></li>
		<li><a href="deleteEmployee/<?php echo $user->id; ?>">supprimer</a></li>
	</ul>
</div>

						</td>
                      </tr>
					<?php endforeach; ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('includes/footer'); ?>