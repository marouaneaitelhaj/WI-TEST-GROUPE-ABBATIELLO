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
            <a class="box-title" href="createUser">
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
                    <th data-column="id" data-order="asc">id</th>
                    <th data-column="nom" data-order="asc">nom</th>
                    <th data-column="prenom" data-order="asc">prenom</th>
                    <th data-column="login" data-order="asc">login</th>
                    <th data-column="role" data-order="asc">role</th>
                    <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($utilisateurs as $key=>$user): ?>
                <tr>
                  <td><?php echo $user->id; ?></td>
                  <td><?php echo $user->nom; ?></td>
                  <td><?php echo $user->prenom; ?></td>
                  <td><?php echo $user->login; ?></td>
                  <td><?php echo $user->role; ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">Action</button>
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="updateUser/<?php echo $user->id; ?>">Modifier</a></li>
                        <li><a href="deleteUser/<?php echo $user->id; ?>">supprimer</a></li>
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
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {
  function fetchData(search = '', sort_by = '', sort_order = '') {
    $.ajax({
      url: "http://localhost:8000/index.php/utilisateurDashboard/searchUsers",
      method: "GET",
      data: { search: search, sort_by: sort_by, sort_order: sort_order },
      success: function(data) {
        var users = JSON.parse(data);
        var tbody = '';
        var thead = '';

        // Build the table header dynamically
        thead += '<tr>';
        thead += '<th data-column="id" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">id</th>';
        thead += '<th data-column="nom" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">nom</th>';
        thead += '<th data-column="prenom" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">prenom</th>';
        thead += '<th data-column="login" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">login</th>';
        thead += '<th data-column="role" data-order="' + (sort_order === 'asc' ? 'desc' : 'asc') + '">role</th>';
        thead += '<th>action</th>';
        thead += '</tr>';
        
        // Update the thead
        $('thead').html(thead);

        // Generate the tbody based on users data
        users.utilisateurs.forEach(function(user) {
          tbody += '<tr>';
          tbody += '<td>' + user.id + '</td>';
          tbody += '<td>' + user.nom + '</td>';
          tbody += '<td>' + user.prenom + '</td>';
          tbody += '<td>' + user.login + '</td>';
          tbody += '<td>' + user.role + '</td>';
          tbody += '<td>';
          tbody += '<div class="btn-group">';
          tbody += '<button type="button" class="btn btn-success">Action</button>';
          tbody += '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">';
          tbody += '<span class="caret"></span>';
          tbody += '<span class="sr-only">Toggle Dropdown</span>';
          tbody += '</button>';
          tbody += '<ul class="dropdown-menu" role="menu">';
          tbody += '<li><a href="updateUser/' + user.id + '">Modifier</a></li>';
          tbody += '<li><a href="deleteUser/' + user.id + '">Supprimer</a></li>';
          tbody += '</ul>';
          tbody += '</div>';
          tbody += '</td>';
          tbody += '</tr>';
        });

        // Update the tbody
        $('tbody').html(tbody);
      }
    });
  }

  // Search functionality with debounce
  $('input[name="search"]').on('input', function() {
    clearTimeout($.data(this, 'timer'));
    var search = $(this).val();
    $(this).data('timer', setTimeout(function() {
      fetchData(search);
    }, 1000));
  });

  // Sorting functionality with event delegation
  $('table').on('click', 'th', function() {
    var sort_by = $(this).data('column');
    var sort_order = $(this).data('order');
    var search = $('input[name="search"]').val();
    fetchData(search, sort_by, sort_order);
  });
});
</script>
<?php $this->load->view('includes/footer'); ?>