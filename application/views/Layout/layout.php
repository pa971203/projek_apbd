<!-- Dashboard -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?= $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/Dashboard/') ?>css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/Dashboard/') ?>css/helper.css" rel="stylesheet">
    <link href="<?= base_url('assets/Dashboard/') ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/CodeSeven/build/toastr.css') ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <?php $this->load->view('Layout/TopHeader') ?>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php $this->load->view('Layout/Sidebar'); ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?= $title ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <?php $this->load->view('Pages/' . $pages) ?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php $this->load->view('Layout/Footer') ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets/Dashboard/') ?>js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/Dashboard/') ?>js/custom.min.js"></script>

    <script src="<?= base_url('assets/CodeSeven/build/toastr.min.js') ?>"></script>

    <?php !empty($script) ? $this->load->view('Pages/' . $script) : '' ?>


</body>

</html>