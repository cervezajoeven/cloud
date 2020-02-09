<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Dashboard </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo library_link(); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                </ul>

                

            <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-purple">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link navbar-light">
                    <img src="<?php echo library_link(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Rezan Loan</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/s960x960/46123698_2188660037820100_1730235001192054784_o.jpg?_nc_cat=104&_nc_ohc=Njw8stA5mBYAX8W-7yW&_nc_ht=scontent.fmnl3-1.fna&_nc_tp=1002&oh=bbffb5b229ed73c1ac288594e7d35abf&oe=5E8EC473" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Edda Bacarro</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview <?php echo (in_array('transactions',$this->navigation))?'menu-open':''; ?>">
                                <a href="#" class="nav-link <?php echo (in_array('transactions',$this->navigation))?'active':''; ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Transactions
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('collection'); ?>" class="nav-link <?php echo (in_array('collection',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-money-bill nav-icon"></i>
                                            <p>Collection</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('loan'); ?>" class="nav-link <?php echo (in_array('loan',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-credit-card nav-icon"></i>
                                            <p>Loan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview <?php echo (in_array('manage',$this->navigation))?'menu-open':''; ?>">
                                <a href="#" class="nav-link <?php echo (in_array('manage',$this->navigation))?'active':''; ?>">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Manage
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('borrower'); ?>" class="nav-link <?php echo (in_array('borrowers',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-hand-holding-heart nav-icon"></i>
                                            <p>Borrowers</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('capital'); ?>" class="nav-link <?php echo (in_array('capitals',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-wallet nav-icon"></i>
                                            <p>Capitals</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('loaner'); ?>" class="nav-link <?php echo (in_array('loaners',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-hands nav-icon"></i>
                                            <p>Loaners</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo (in_array('report',$this->navigation))?'menu-open':''; ?>">
                                <a href="#" class="nav-link <?php echo (in_array('report',$this->navigation))?'active':''; ?>">
                                    <i class="nav-icon fas fa-scroll"></i>
                                    <p>
                                        Reports
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('report'); ?>" class="nav-link <?php echo (in_array('date_reports',$this->navigation))?'active':''; ?>">
                                            <i class="fas fa-calendar nav-icon"></i>
                                            <p>Date Reports</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="pages/widgets.html" class="nav-link <?php echo (in_array('settings',$this->navigation))?'active':''; ?>">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Settings
                                    </p>
                                </a>
                            </li>
                            
                            
                           
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Payment</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->