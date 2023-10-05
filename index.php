<?php
require_once './config/functions.php';
$getData = @$_GET;
$baseFolder = './pages/';
if (isset($getData['action'])) {
    if ($getData['action'] == 'logout') {
        if (file_exists($baseFolder . $getData['action'] . '.php')) {
            require_once $baseFolder . $getData['action'] . '.php';
        }
    }
}




?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <?php require_once './partials/styles.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once './partials/nav.php' ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php require_once './partials/left-side.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
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
                    <div class="row">
                        <?php
                        if (isset($getData['page']) and isset($getData['action']) == 'all') {
                            $path = $getData['page'];
                            $file = $getData['action'];
                            if(file_exists($baseFolder.$path.'/'.$file.'.php')){
                                require_once $baseFolder.$path.'/'.$file.'.php';
                            }
                        }
                        ?>

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
       
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php require_once './partials/scripts.php'; ?>
</body>

</html>