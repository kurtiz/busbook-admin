<?= $this->extend("layouts/base"); ?>
    <!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
    <!doctype html>
    <html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profile | BusBook</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?= base_url() ?>/public/favicon.ico" type="image/x-icon"/>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="manifest" href="<?= base_url(); ?>/public/manifest.json">
        <link rel="apple-touch-icon" href="<?php base_url(); ?>public/favicon.ico" type="image/x-icon"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#404E67"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Hello World">
        <meta name="msapplication-TileImage" content="<?php base_url(); ?>public/favicon.ico">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet"
              href="<?= base_url(); ?>/public/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/dist/css/theme.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/responsive.bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/responsive.dataTables.css">
        <script src="<?= base_url(); ?>/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">


    </head>

    <body>
    <div id="overlay">
        <div class='lds-ripple'>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper">

        <!-- // NOTE THE TOP BAR IS SUPPOSED TO BE HERE  -->
        <?= $this->include("widgets/topbar"); ?>

        <div class="page-wrap">

            <!-- NOTE THE LEFT-SIDE BAR IS SUPPOSED TO HERE -->
            <?= $this->include("widgets/left-sidebar"); ?>

            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="ik ik-file-text bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Profile</h5>
                                        <span>View Your Profile Info and Insights</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a id="domain" loading="true" href="<?= base_url() ?>"><i
                                                        class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Profile</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>/public/img/uploads/users/default-user-image.png"
                                             class="rounded-circle" width="150"/>
                                        <h4 id="card_name" class="card-title mt-10"><?= $userdata->admin_name ?></h4>
                                        <div class="row text-center justify-content-md-center">
                                            <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                            class="fas fa-money-bill-alt"></i> <font
                                                            class="font-medium">254</font></a></div>
                                            <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                            class="ik ik-shopping-cart"></i> <font class="font-medium">54</font></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-0">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="card">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                           href="#last-month" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill"
                                           href="#previous-month" role="tab" aria-controls="pills-setting"
                                           aria-selected="false">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="last-month" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-6"><strong>Full Name</strong>
                                                    <br>
                                                    <p id="card-name"
                                                       class="text-muted"><?= $userdata->admin_name ?></p>
                                                </div>
                                                <div class="col-md-12 col-6"><strong>Mobile</strong>
                                                    <br>
                                                    <p id="card-mobile" class="text-muted">
                                                        <?php
                                                        if (empty($userdata->admin_contact)) {
                                                            echo "Not Set";
                                                        } else {
                                                            echo $userdata->admin_contact;
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-6"><strong>Email</strong>
                                                    <br>
                                                    <p id="card-email" class="text-muted">
                                                        <?php
                                                        if (empty($userdata->admin_email)) {
                                                            echo "Not Set";
                                                        } else {
                                                            echo $userdata->admin_email;
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="previous-month" role="tabpanel"
                                         aria-labelledby="pills-setting-tab">
                                        <div class="card-body">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="example-name">Full Name</label>
                                                    <input type="text" disabled placeholder="Johnathan Doe"
                                                           class="form-control" value="<?= $userdata->admin_name ?>"
                                                           name="fullname" id="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" disabled placeholder="johnathan@admin.com"
                                                           class="form-control" value="<?= $userdata->admin_email ?>"
                                                           name="email" id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile">Phone Number</label>
                                                    <input type="text" disabled placeholder="244 856 7890" id="mobile"
                                                           value="<?= $userdata->admin_contact ?>" name="example-phone"
                                                           class="form-control">
                                                </div>
                                                <button id="editBtn" class="btn btn-success" type="button">Edit</button>
                                                <button id="updateBtn" class="btn btn-success" style="display: none"
                                                        type="button">Update Profile
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->include("widgets/footer"); ?>
        </div>

        <script src="<?= base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/jquery.repeater/jquery.repeater.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="<?= base_url(); ?>/public/js/profile.js"></script>
    </body>
    </html>
<?= $this->endSection(); ?>