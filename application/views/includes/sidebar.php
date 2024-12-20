<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('assets/adminlte/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>
            <?= $this->session->userdata('login') ?>
        </p>
      </div>
    </div>
    <?php $this->load->view('components/sidebar_menu'); ?>
  </section>
</aside>