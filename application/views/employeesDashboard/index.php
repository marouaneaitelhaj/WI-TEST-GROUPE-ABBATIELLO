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
          </div>
          <div class="box-header">
            <div class="input-group input-group-sm" style="width: 500px;">
              <input type="text" name="search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="cursor: pointer;" data-column="id" data-order="asc">id</th>
                  <th style="cursor: pointer;" data-column="nom" data-order="asc">nom</th>
                  <th style="cursor: pointer;" data-column="prenom" data-order="asc">prenom</th>
                  <th style="cursor: pointer;" data-column="mail" data-order="asc">mail</th>
                  <th style="cursor: pointer;" data-column="adresse" data-order="asc">adresse</th>
                  <th style="cursor: pointer;" data-column="telephone" data-order="asc">telephone</th>
                  <th style="cursor: pointer;" data-column="poste" data-order="asc">poste</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($employees as $key=>$employe): ?>
                <tr>
                  <td><?php echo $employe->id; ?></td>
                  <td><?php echo $employe->nom; ?></td>
                  <td><?php echo $employe->prenom; ?></td>
                  <td><?php echo $employe->mail; ?></td>
                  <td><?php echo $employe->adresse; ?></td>
                  <td><?php echo $employe->telephone; ?></td>
                  <td><?php echo $employe->poste; ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">Action</button>
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="updateEmployee/<?php echo $employe->id; ?>">Modifier</a></li>
                        <li><a href="" class="delete-user" data-id="<?php echo $employe->id; ?>">supprimer</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
<script>
  $(document).ready(function() {
    function fetchData(search = '', sort_by = '', sort_order = '') {
      $.ajax({
        url: "http://localhost:8000/index.php/employeesDashboard/searchEmployees",
        method: "GET",
        data: { search: search, sort_by: sort_by, sort_order: sort_order },
        success: function(data) {
          var employees = JSON.parse(data);
          var tbody = '';
          var thead = '';
  
          // Build table header
          thead += '<tr>';
          thead += '<th style="cursor: pointer;" data-column="id" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">id</th>';
          thead += '<th style="cursor: pointer;" data-column="nom" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">nom</th>';
          thead += '<th style="cursor: pointer;" data-column="prenom" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">prenom</th>';
          thead += '<th style="cursor: pointer;" data-column="mail" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">mail</th>';
          thead += '<th style="cursor: pointer;" data-column="adresse" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">adresse</th>';
          thead += '<th style="cursor: pointer;" data-column="telephone" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">telephone</th>';
          thead += '<th style="cursor: pointer;" data-column="poste" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">poste</th>';
          thead += '<th>action</th>';
          thead += '</tr>';
          
          $('thead').html(thead);
          
          // Generate tbody content
          employees.employees.forEach(function(employee) {
            tbody += '<tr>';
            tbody += '<td>' + employee.id + '</td>';
            tbody += '<td>' + employee.nom + '</td>';
            tbody += '<td>' + employee.prenom + '</td>';
            tbody += '<td>' + employee.mail + '</td>';
            tbody += '<td>' + employee.adresse + '</td>';
            tbody += '<td>' + employee.telephone + '</td>';
            tbody += '<td>' + employee.poste + '</td>';
            tbody += '<td>';
            tbody += '<div class="btn-group">';
            tbody += '<button type="button" class="btn btn-success">Action</button>';
            tbody += '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">';
            tbody += '<span class="caret"></span>';
            tbody += '<span class="sr-only">Toggle Dropdown</span>';
            tbody += '</button>';
            tbody += '<ul class="dropdown-menu" role="menu">';
            tbody += '<li><a href="updateEmployee/' + employee.id + '">Modifier</a></li>';
            tbody += '<li><a href="" class="delete-user" data-id="'+employee.id+'">Supprimer</a></li>';
            tbody += '</ul>';
            tbody += '</div>';
            tbody += '</td>';
            tbody += '</tr>';
          });
  
          $('tbody').html(tbody);
        }
      });
    }
  
    // Search with debounce
    $('input[name="search"]').on('input', function() {
      clearTimeout($.data(this, 'timer'));
      var search = $(this).val();
      $(this).data('timer', setTimeout(function() {
        fetchData(search);
      }, 1000));
    });
  
    // Column sorting
    $('table').on('click', 'th', function() {
      var sort_by = $(this).data('column');
      var sort_order = $(this).data('order');
      var search = $('input[name="search"]').val();
      fetchData(search, sort_by, sort_order);
    });
    $('table').on('click', '.delete-user', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'http://localhost:8000/index.php/employeesDashboard/deleteEmployee/' + id,
          method: 'DELETE',
          success: function(response) {
            Swal.fire(
              'Deleted!',
              'Employee has been deleted.',
              'success'
            );
            fetchData();
          },
          error: function(xhr, status, error) {
            Swal.fire(
              'Error!',
              'An error occurred while deleting the employee.',
              'error'
            );
          }
        });
      }
    });
  });
  });
</script>
<!-- /.content-wrapper -->
<?php $this->load->view('includes/footer'); ?>