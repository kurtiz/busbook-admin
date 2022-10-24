<?= $this->extend("layouts/base"); ?>
<!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Buses | BusBook cPanel</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="<?= base_url(); ?>/public/manifest.json">
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
    <link rel="stylesheet"
          href="<?= base_url(); ?>/public/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/dist/css/theme.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/responsive.bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/responsive.dataTables.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/select.dataTables.min.css">
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
<div class="wrapper ">

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
                                <i class="ik ik-grid bg-blue"></i>
                                <div class="d-inline">
                                    <h5>Buses</h5>
                                    <span>All buses in your inventory</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a id="domain" loading="true" href="<?= base_url(); ?>"><i
                                                    class="ik ik-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a loading="true" href="<?= base_url(); ?>/buses">Buses</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card table-card">
                            <div class="card-header d-block">
                                <h3>Buses</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 table-responsive">
                                    <table id="bus_data_table" class="bus_table nowrap table">
                                        <?php if (is_array($buses)): ?>
                                            <thead>
                                            <tr>
                                                <th>Bus Model</th>
                                                <th>Bus Capacity</th>
                                                <th>Bus Number</th>
                                                <th class="nosort">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($buses as $row): ?>
                                            <tr id="bus<?= $row['bus_id'] ?>">
                                                <td id="name<?= $row['bus_id'] ?>"><?= $row['bus_model'] ?></td>
                                                <td><?= $row['bus_capacity'] ?></td>
                                                <td><?= $row['bus_number'] ?></td>
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="<?= base_url(); ?>/buses/view/<?= $row['bus_id'] ?>"><i
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="View" onclick="loading_overlay(1)"
                                                                    class="ik ik-eye text-blue"></i></a>
                                                        <a href="javascript:edit('<?= $row['bus_id'] ?>')"><i
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit"
                                                                    class="ik ik-edit-2 text-green"></i></a>
                                                        <a href="javascript:delete_bus('<?= $row['bus_id'] ?>')"><i
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete"
                                                                    class="ik ik-trash-2 text-red"></i></a>
                                                    </div>
                                                </td>
                                                </tr><?php endforeach; ?>
                                            </tbody>
                                        <?php else: ?>
                                            <tbody>
                                            <tr>
                                                <td class="text-center">No Data</td>
                                            </tr>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
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
<script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/sweetalerts2/dist/sweetalert2.js"></script>
<script src="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

<script src="<?= base_url(); ?>/public/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/public/js/datatables.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/jszip.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/responsive.dataTables.js"></script>
<script src="<?= base_url(); ?>/public/plugins/datatables/js/dataTables.select.min.js"></script>
<script src="<?= base_url(); ?>/public/js/print.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/datatables/css/buttons.dataTables.min.css">
<script>
    let table = $('.bus_table').DataTable({
        responsive: true,
        dom: 'Bflrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf',
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>Copy',
                titleAttr: 'Copy',
                className: 'btn btn-secondary',
                attr: {
                    id: 'copy_btn'
                }
            }, {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>Excel',
                titleAttr: 'Excel',
                className: 'btn btn-success',
                attr: {
                    id: 'xcel_btn'
                }
            }, {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i>CSV',
                titleAttr: 'CSV',
                className: 'btn btn-info',
                attr: {
                    id: 'csv_btn'
                }
            }, {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary',
                attr: {
                    id: 'pdf_btn'
                }
            }, {
                extend: 'print',
                text: '<i class="ik ik-printer"></i>Print',
                titleAttr: 'Print',
                className: 'btn btn-dark',
                attr: {
                    id: 'print_btn'
                },
            },
        ],

        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort'],
        }],
        select: {
            style: 'os'
        }

    });
    $(document).ready(function () {

        $("#copy_btn").removeClass("dt-button buttons-copy buttons-html5");
        $("#xcel_btn").removeClass("dt-button buttons-excel buttons-html5");
        $("#csv_btn").removeClass("dt-button buttons-excel buttons-html5");
        $("#pdf_btn").removeClass("dt-button buttons-excel buttons-html5");
        $("#print_btn").removeClass("dt-button buttons-excel buttons-html5");

    });

    /**
     *
     * @param {string | int | any} id
     */
    function edit(id) {
        let domain = $("#domain").prop("href");
        let name = $("#name" + id).text();

        //  Shows Pop Up to confirm edit event
        Swal.fire({
            title: 'Are you sure you want to edit this bus?',
            imageHeight: 100,
            text: name,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Yes`,
            denyButtonText: `No`,
        }).then((result) => {
            //  when confirm button (yes) is clicked
            if (result.isConfirmed) {
                // shows a loading screen overlay
                loading_overlay(1)
                // redirects to the edit page
                window.location.assign(domain + "/buses/edit/" + id)
            } else if (result.isDenied) { // when the denied button (no) is clicked
                // Denial message pop up
                Swal.fire('Edit Discarded', '', 'info');
            }
        });
    }


    /**
     * sends a post request to delete a bus for the list
     * @param {string | int | array | any} id the id of the bus to be deleted
     */
    function delete_bus(id) {
        let domain = $("#domain").prop("href");
        if (typeof (id) === 'object' && id.length > 0) {
            console.log(id.length)

            //  Shows Pop Up to confirm edit event
            Swal.fire({
                title: 'Are you sure you want to delete these buses?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
            }).then((result) => {
                //  when confirm button (yes) is clicked
                if (result.isConfirmed) {
                    // post request to delete bus
                    let success = [];
                    let error = [];
                    for (let i = 0; i < id.length; i++) {
                        let name = $("#name" + id[i].replace("bus", "")).text();
                        url = (domain + "/buses/delete/" + id[i].replace("bus", ""));
                        $.post(url, function (data) {
                            try {
                                data = JSON.parse(data)
                            } catch (e) {
                                data.msg = "error"
                            }
                            if (data.msg === "success") {

                                let table = $("#bus_data_table");
                                let data_table = table.dataTable();
                                let index = findProductRow(table, id[i].replace("bus", ""));
                                data_table.fnDeleteRow(index);

                                success[i] = name;


                            } else {
                                error[i] = name;
                            }
                        })
                    }

                    if (success.length > 0) {
                        name = success.toString().replace(",", ", ")
                        $.toast({
                            text: name + " has been successfully deleted",
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: "top-right",
                            bgColor: '#2dce89',
                            textColor: 'white'
                        });
                    }

                    if (error.length > 0) {
                        name = error.toString().replace(",", ", ")
                        $.toast({
                            text: name + " could not be deleted",
                            showHideTransition: 'fade',
                            icon: 'Error',
                            position: "top-right",
                            bgColor: '#f5365c',
                            textColor: 'white'
                        });
                    }

                } else if (result.isDenied) { // when the denied button (no) is clicked
                    // Denial message pop up
                    Swal.fire('Deletion Discarded', '', 'info')
                }
            });
        } else if (typeof (id) === 'string') {
            let img = $("#img" + id).prop("src");
            let name = $("#name" + id).text();
            url = (domain + "/buses/delete/" + id);

            //  Shows Pop Up to confirm edit event
            Swal.fire({
                title: 'Are you sure you want to delete this bus?',
                text: name,
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
            }).then((result) => {
                //  when confirm button (yes) is clicked
                if (result.isConfirmed) {
                    // post request to delete bus
                    $.post(url, function (data) {
                        try {
                            data = JSON.parse(data)
                        } catch (e) {
                            data.msg = "error"
                        }
                        if (data.msg === "success") {

                            let table = $("#bus_data_table");
                            let data_table = table.dataTable();
                            let index = findProductRow(table, id);
                            data_table.fnDeleteRow(index);

                            $.toast({
                                text: name + " has been successfully deleted",
                                showHideTransition: 'fade',
                                icon: 'success',
                                position: "top-right",
                                bgColor: '#2dce89',
                                textColor: 'white'
                            });

                        } else {
                            $.toast({
                                text: name + " could not be deleted",
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: "top-right",
                                bgColor: '#f5365c',
                                textColor: 'white'
                            });
                        }
                    })

                } else if (result.isDenied) { // when the denied button (no) is clicked
                    // Denial message pop up
                    Swal.fire('Deletion Discarded', '', 'info')
                }
            });
        } else {
            $.toast({
                text: "No item has selected to be deleted",
                showHideTransition: 'fade',
                icon: 'error',
                position: "top-right",
                bgColor: '#f5365c',
                textColor: 'white'
            });
        }
    }

    /**
     *
     * @param element {object | any} the element
     * @param id the id of the bus to be deleted
     * @returns {number} returns the index of the row of the bus to be deleted
     */
    function findProductRow(element, id) {
        table = element.dataTable();
        table = table.fnGetData();
        let index;
        for (i = 0; i < table.length; i++) {
            // console.log(table[i].DT_RowId)
            if (table[i].DT_RowId === "bus" + id) {
                index = i;
                break;
            }
        }
        return index;
    }

    $(document).on("keydown", function (e) {
        if (e.which === 46) {
            let ids = table.rows(
                {selected: true}
            ).ids();
            // console.log(ids[0].replace("bus",""))
            delete_bus(ids)
        }
    });


</script>
</body>

</html>
<?= $this->endSection(); ?>
