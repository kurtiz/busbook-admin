<?= $this->extend("layouts/base"); ?>
<!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Driver | BusBook cPanel</title>
    <meta property="og:image" content="<?= base_url(); ?>/public/src/img/brand-white.png"/>
    <meta name="description" content="Add new clients or customers to your stores database">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php base_url(); ?>public/favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#404E67"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>public/favicon.ico">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?= base_url(); ?>/public/favicon.ico" type="image/x-icon"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/dist/css/theme.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
    <script src="<?= base_url(); ?>/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
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
                                <i class="ik ik-inbox bg-blue"></i>
                                <div class="d-inline">
                                    <h5>Edit Driver</h5>
                                    <span>Edit Driver Details</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a loading="true" href="<?= base_url(); ?>"><i class="ik ik-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a loading="true"
                                                                   href="<?= base_url(); ?>/drivers">Drivers</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Driver</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Edit Driver</h3></div>
                            <div class="card-body">
                                <form action="" method="post">
                                <div class="form-group">
                                    <label for="driver_name">Driver Name</label>
                                    <input type="text" class="form-control" value="<?= $driver->driver_name ?>"
                                           required id="driver_name" name="driver_name" placeholder="eg. Mensah Kay">
                                </div>
                                <div class="form-group">
                                    <label for="driver_contact">Driver Contact</label>
                                    <input type="number" class="form-control" value="<?= $driver->driver_contact ?>"
                                           required id="driver_contact" name="driver_contact" placeholder="eg. 0244856578">
                                </div>
                                <div class="form-group">
                                    <label for="driver_email">Driver Email</label>
                                    <input type="email" required value="<?= $driver->driver_email ?>"
                                           class="form-control" name="driver_email" id="driver_email"
                                           placeholder="eg. GT 457-19">
                                </div>
                                <button type="reset" id="discardDriver" class="btn btn-danger mr-2">Discard</button>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include("widgets/footer"); ?>
    </div>
</div>
<script src="<?= base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.js"></script>
<script src="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/moment/moment.js"></script>
<script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script>

    $("#user-form").on("submit", function () {
        loading_overlay(1)
    })

    <?php
    if (!empty(session()->getTempdata('name'))):
    ?>
    $.toast({
        text: 'Welcome <?=session()->getTempdata('name')?>',
        showHideTransition: 'fade',
        icon: 'success',
        position: "top-right",
        bgColor: '#2dce89',
        textColor: 'white'
    })
    <?php
    endif;
    ?>

    <?php
    if (!empty(session()->getTempdata('success'))):
    ?>
    $.toast({
        text: '<?=session()->getTempdata('success')?>',
        showHideTransition: 'fade',
        icon: 'success',
        position: "top-right",
        bgColor: '#2dce89',
        textColor: 'white'
    })

    <?php
    elseif(!empty(session()->getTempdata('error'))):
    ?>
    $.toast({
        text: '<?=session()->getTempdata('error')?>',
        showHideTransition: 'fade',
        icon: 'error',
        position: "top-right",
        bgColor: '#f5365c',
        textColor: 'white'
    })

    <?php
    endif;
    ?>

    $("#discardDriver").on("click", function(){
        Swal.fire({
            title: 'Are you sure you want to discard changes?',
            text: name,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Discard`,
            denyButtonText: `Continue Editing`,
            confirmButtonColor: "#f5365c",
            denyButtonColor: "#007bff",
        }).then((result) => {
            if (result.isConfirmed) { //  when confirm button (yes) is clicked
                Swal.fire('Changes Discarded', '', 'info')
                setTimeout(() => {
                    location.href = "<?=base_url()?>/drivers/view/<?=$driver->driver_id?>"
                }, 1200)

            }
        });
    })

</script>
</body>

</html>
<?= $this->endSection(); ?>
