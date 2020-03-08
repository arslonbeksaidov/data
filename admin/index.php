<?php
require_once 'app/MyAutoloader.php';
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//session_start();
//if ($_SESSION['role']!=1){
//    header("location: ../admin/resours/errorLogin.php");
//}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php require '../admin/resours/layout/head.php'?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 <?php require 'resours/layout/fixed-topnav.php' ?>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 4</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/admin/resours/post/post.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Yangiliklar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/category/category.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kategoriyalar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/xabarlar/hammaXabarlar.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Xabarlar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/foydalanuvchilar/User.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Faydalanuvchilar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/team/team.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Jamoa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/gallery/gallery.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resours/course/course.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Yangi kurs qo'shish
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adminstrator</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <?php

          $number = new Statistics();

          ?>
          <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Yangiliklar</span>
                          <span class="info-box-number"><?= $number->countTableRow('post')?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Kategoriyalar</span>
                          <span class="info-box-number"><?= $number->countTableRow('category') ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Foydalanuvchilar</span>
                          <span class="info-box-number"> <?= $number->countTableRow('UserOne') ?> </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Xabarlar</span>
                          <span class="info-box-number"><?=$number->countTableRow('message')?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php require '../admin/resours/layout/fixed-footer.php'?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php require '../admin/resours/layout/js.php' ?>
</body>
</html>
