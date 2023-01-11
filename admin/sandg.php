<?php
require('include/wanted.php');
require('include/dbconn.php');
adminLogin(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Services and General</title>
    <?php require('include/links.php');
    require('include/script.php'); ?>
</head>

<body>
    <?php require('include/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-3 text-center fw-bold">Services</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addservices">
                                <i class="bi bi-plus-square me-2"></i>Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sno</th>
                                        <th scope="col">Services</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                $dbdata = selectAll('services');
                                if ($dbdata) {
                                    foreach ($dbdata as $row) {
                                ?>
                                <tbody id="room-data">
                                    <tr>
                                        <td>
                                            <?php echo $row['sno']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['service']; ?>
                                        </td>
                                        <td><button type="button" class="dltbtn_s btn-sm btn-danger"><i
                                                    class="bi bi-trash"></< /button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                } else {
                                    echo "No record found";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Model for Services-->
    <div class="modal fade" id="addservices" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addservice_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Services</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Sno</label>
                                <input type="number" name="sno" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Services</label>
                                <input type="text" name="srvc" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="insertservices">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Delete Model for services-->
    <div class="modal fade" id="dltservices" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addservice_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Delete Services</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Sno</label>
                                <input type="text" name="sno" id="sno" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Services</label>
                                <input type="text" name="srvc" id="srvc" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="dltyes_s">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-3 text-center fw-bold">General</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addgenerals">
                                <i class="bi bi-plus-square me-2"></i>Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sno</th>
                                        <th scope="col">General</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                $dbdata = selectAll('general');
                                if ($dbdata) {
                                    foreach ($dbdata as $row) {
                                ?>
                                <tbody id="room-data">
                                    <tr>
                                        <td>
                                            <?php echo $row['sno']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['general']; ?>
                                        </td>
                                        <td><button type="button" class="dltbtn_g btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></< /button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                } else {
                                    echo "No record found";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Model for General-->
    <div class="modal fade" id="addgenerals" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addgenerals_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Generals</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Sno</label>
                                <input type="number" name="sno1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">General</label>
                                <input type="text" name="gen" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="insertgeneral">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Delete Modal for General-->
    <div class="modal fade" id="dltgeneral" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addservice_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Delete General</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Sno</label>
                                <input type="text" name="sno1" id="sno1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">General</label>
                                <input type="text" name="gen" id="gen" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="dltyes_g">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.dltbtn_s').click(function () {
                $('#dltservices').modal("show");
                $tr = $(this).closest('tr');

                var tbdata = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(tbdata);

                $('#sno').val(tbdata[0]);
                $('#srvc').val(tbdata[1]);

            });
        });

        $(document).ready(function () {
            $('.dltbtn_g').click(function () {
                $('#dltgeneral').modal("show");
                $tr = $(this).closest('tr');

                var tbdata = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(tbdata);

                $('#sno1').val(tbdata[0]);
                $('#gen').val(tbdata[1]);
            });
        });

    </script>
</body>

</html>