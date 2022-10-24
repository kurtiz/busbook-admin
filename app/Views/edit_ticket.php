<?= $this->extend("layouts/base"); ?>
<!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Ticket | BusBook cPanel</title>
    <meta property="og:image" content="<?= base_url(); ?>/public/src/img/brand-white.png"/>
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
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/select2/dist/css/select2.min.css">
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
                                    <h5>Edit Ticket</h5>
                                    <span>Edit a Ticket</span>
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
                                                                   href="<?= base_url(); ?>/tickets">Tickets</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Ticket</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><h3>Edit Ticket</h3></div>
                            <div class="card-body">
                                <form method="post"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="destination">Destination</label>
                                        <?php if (is_array($destinations)): ?>
                                            <select id="destination"  required name="destination"
                                                    class="form-control select2">
                                                <option value="">select destination</option>
                                                <?php foreach ($destinations as $destination): ?>
                                                    <option
                                                        <?= ($ticket->destination_id == $destination['destination_id']) ? "selected" : "" ?>
                                                            value="<?= $destination['destination_id'] ?>">
                                                        <?= $destination['destination'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else: ?>
                                            <select id="destination"  name="destination"
                                                    class="form-control select2">
                                                <option value="">select destination</option>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="driver">Driver</label>
                                        <?php if (is_array($drivers)): ?>
                                            <select id="driver" required  name="driver"
                                                    class="form-control select2">
                                                <option value="">select driver</option>
                                                <?php foreach ($drivers as $driver): ?>
                                                    <option
                                                        <?= ($ticket->driver_id == $driver['driver_id']) ? "selected" : "" ?>
                                                            value="<?= $driver['driver_id'] ?>">
                                                        <?= $driver['driver_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else: ?>
                                            <select id="driver"  name="driver"
                                                    class="form-control select2">
                                                <option value="">select driver</option>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="bus">Bus</label>
                                        <?php if (is_array($buses)): ?>
                                            <select id="bus" required  name="bus"
                                                    class="form-control select2">
                                                <option value="">select bus</option>
                                                <?php foreach ($buses as $bus): ?>
                                                    <option <?= ($ticket->bus_id == $bus['bus_id']) ? "selected" : "" ?>
                                                            value="<?= $bus['bus_id'] ?>">
                                                        <?= $bus['bus_model'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else: ?>
                                            <select id="driver" name="driver"
                                                     class="form-control select2">
                                                <option value="">select driver</option>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Departure Time</label>
                                        <input type="time"  class="form-control" required id="time"
                                               name="time" value="<?= $ticket->departure_time ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Departure Date</label>
                                        <input type="date" required  class="form-control form-control-uppercase"
                                               name="date" id="date" value="<?= $ticket->departure_date ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ticket_cost">Ticket Cost (¢)</label>
                                        <input type="number" required  class="form-control form-control-uppercase"
                                               name="ticket_cost" id="ticket_cost" value="<?= $ticket->ticket_cost ?>"
                                               min="0" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file"  name="image" id="imgupload"
                                               accept=".png, .jpg, jpeg, .gif, .webp, .bmp" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text"  class="form-control file-upload-info" disabled
                                                   id="imagename" placeholder="Upload Image"
                                                   value="<?= $ticket->ticket_image ?>">
                                            <span class="input-group-append">
                                                        <button  class="file-upload-browse btn btn-primary" id="upbtn"
                                                                type="button">Select</button>
                                                    </span>
                                        </div>
                                    </div>
                                    <button type="reset" id="discardDriver" class="btn btn-danger mr-2">Discard</button>
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="min-height: 400px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-2">

                                        <?php if (!isset($ticket->ticket_image)): ?>
                                            <img id="blah" class="img-fluid rounded"
                                                 src="<?= base_url() ?>/public/img/uploads/products/product-default-image.png"
                                                 alt="">
                                        <?php else: ?>
                                            <img id="blah" class="img-fluid rounded"
                                                 src="<?=$ticket->ticket_image?>"
                                                 alt="">
                                        <?php endif; ?>
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
</div>
<script src="<?= base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/moment/moment.js"></script>
<script src="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.js"></script>
<script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script>

    $("#user-form").on("submit", function () {
        loading_overlay(1)
    })

    $(document).ready(function () {
        let selectELements = ["#destination", "#driver", "#bus"]
        for (let i = 0; i < selectELements.length; i++) {
            $(selectELements[i]).select2();
        }
    });

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

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgupload").change(function () {
        readURL(this);
    });

    $("#upbtn").click(function () {
        $("#imgupload").click();

        $("#imgupload").change(function (e) {
            var x = e.target.files[0].name;
            $("#imagename").val(x);
        });
    });


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
                    location.href = "<?=base_url()?>/tickets/view/<?=$ticket->ticket_id?>"
                }, 1200)

            }
        });
    })

</script>
</body>

</html>
<?= $this->endSection(); ?>
