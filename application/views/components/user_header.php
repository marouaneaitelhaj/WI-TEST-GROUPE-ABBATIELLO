<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<header class="main-header">
	<!-- Logo -->
	<a href="#" class="logo" style="background-color: white;color: #D32F2F;"><b>Salvatore</b>RH</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url('assets/adminlte/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image"/>
						<span class="hidden-xs">
              <?= $this->session->userdata('login') ?>
            </span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?= base_url('assets/adminlte/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
							<p>
              <?= $this->session->userdata('full_name') ?>
								<small><?= $this->session->userdata('role') ?></small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-right">
								<a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
