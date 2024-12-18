<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Utilisateur</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="users"><i class="fa fa-circle-o"></i> Afficher tous les utilisateurs</a></li>
      <li><a href="createUser"><i class="fa fa-circle-o"></i> Ajouter un nouvel utilisateur</a></li>
    </ul>
  </li>
  <li class="active treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Employés</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Afficher tous les Employés</a></li>
      <li><a href="index2.html"><i class="fa fa-circle-o"></i> Ajouter un nouvel Employé</a></li>
    </ul>
  </li>
  <!-- Add other menu items here -->
</ul>