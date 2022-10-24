<?= $this->extend("layouts/base"); ?>
<!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Bus | BusBook cPanel</title>
    <meta property="og:image" content="<?= base_url(); ?>/public/src/img/brand-white.png" />
    <meta name="description" content="Add new clients or customers to your stores database">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon"href="<?php base_url(); ?>public/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#404E67"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>public/favicon.ico">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?=base_url(); ?>/public/favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/dist/css/theme.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
    <script src="<?=base_url(); ?>/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
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
                                    <h5>Add Bus</h5>
                                    <span>Add a Bus</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a loading="true" href="<?= base_url(); ?>"><i class="ik ik-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a loading="true" href="<?= base_url(); ?>/buses">Buses</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Bus</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Add Bus</h3></div>
                            <div class="card-body">
                                <?=form_open_multipart(base_url()."/buses/add",['id'=>"bus-form", 'class'=>"forms-sample"])?>
                                <div class="form-group">
                                    <label for="bus_model">Bus Model</label>
                                    <input type="text" class="form-control" required id="bus_model" name="bus_model" placeholder="eg. Marcopolo Bus">
                                </div>
                                <div class="form-group">
                                    <label for="bus_capacity">Capacity</label>
                                    <input type="number" class="form-control" required id="bus_capacity" name="bus_capacity" placeholder="eg. 45">
                                </div>
                                <div class="form-group">
                                    <label for="bus_number">Bus Number</label>
                                    <input type="text" required class="form-control form-control-uppercase" name="bus_number" id="bus_number" placeholder="eg. GT 457-19">
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include("widgets/footer"); ?>
    </div>
</div>
<script src="<?=base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"></script>
<script src="<?=base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?=base_url(); ?>/public/dist/js/theme.min.js"></script>
<script src="<?=base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?=base_url(); ?>/public/plugins/moment/moment.js"></script>
<script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script>

    $("#user-form").on("submit", function(){
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

</script>
</body>

</html>
<?= $this->endSection(); ?>
