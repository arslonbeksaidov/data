<?php
session_start();
require_once '../../app/Post.php';
$AllPost = new Post();
$results = $AllPost->getAllGallery();
$resultsGaleryCategory = $AllPost->getAllGalleryCategory();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | DataTables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../../index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>

        </ul>


        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li id="grey" onmouseover="grey()" onmouseout="white()" class="nav-item dropdown show">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <i class="far fa-user"></i>
                    <span class="badge badge-danger navbar-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/admin/dist/img/user1-128x128.jpg" alt="User Avatar"
                                 class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= $_SESSION['fio'] ?>
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm"><?= date('i', time() - $_SESSION['time']) . ' minutdan beri aktivsiz' ?></p>

                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                    <a href="/admin/app/LogOut.php" class="dropdown-item dropdown-footer">Tizimdan chiqish</a>
                </div>
            </li>

        </ul>

        <!-- Right navbar links -->

    </nav>

    <script>
        function grey() {
            document.getElementById('grey').style.backgroundColor = 'grey';
        }

        function white() {
            document.getElementById('grey').style.backgroundColor = 'white';
        }
    </script>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 4</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Yangiliklar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kategoriyalar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Xabarlar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Faydalanuvchilar
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kategoriya</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                    Yaratish
                                </button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rasm</th>

                                    <th>Info</th>

                                    <th>Kategoriya</th>
                                    <th width="25%">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($results as $value):

                                    $i = 1 ?>

                                    <tr>
                                        <td><?= $i++ ?></td>

                                        <td><img width="100px" height="100px" src="/admin/gallery_photo/<?=$value['image']?>" alt="">
                                        <td>
                                            <?= $value['info'] ?>

                                        </td>
                                        <td>
                                            <?php $AllPost->findGalleryItem($value['id'])  ?>
                                        </td>
                                        <td>
                                            <a href="/admin/resours/post/updatePost.php?update_id=<?= $value['id'] ?> " type="button"
                                               class="btn btn-success">Yangilash</a>

                                            <a href="/admin/app/Post.php?<?='delete_gallery_id='. $value['id'] ?> " type="button"
                                               class="btn btn-danger">O'chirish</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;

                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Rasm</th>

                                    <th>Info</th>

                                    <th>Kategoriya</th>
                                    <th width="25%">Actions</th>


                                </tr>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gallereya yaratish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form autocomplete="on" role="form" enctype="multipart/form-data"  method="post" action="/admin/app/Post.php" id="post-form">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="info" class="form-control" id="post"
                                           placeholder="Malumot">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="imageGallery" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select name="category" class="custom-select">
                                       <?php foreach ($resultsGaleryCategory as $item): ?>
                                        <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_gallery" value="add_gallery" form="post-form" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>