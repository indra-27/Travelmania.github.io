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
    <title>Admin-User Details</title>
    <?php require('include/links.php');
    require('include/script.php'); ?>
</head>

<body>
    <?php require('include/header.php'); ?>
    <!--Table for Users-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-3 text-center fw-bold">User Details</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sno</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Ph no.</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Pincode</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">DateTime</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                $dbdata = selectAll('regis_details');
                                if ($dbdata) {
                                    foreach ($dbdata as $row) {
                                ?>
                                <tbody id="room-data">
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['lname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['phno']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pincode']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['dob']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['dateandtime']; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="dltbtn btn btn-danger shadow-none"><i
                                                    class="bi bi-trash"></i></button>
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


    <!--Delete User Model-->
    <div class="modal" id="dltuser" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="dltuser_form" method="POST" action="ajax/user_queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Delete User</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Id</label>
                                <input type="number" name="did" id="did" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" name="dfname" id="dfname" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" name="dlname" id="dlname" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phno</label>
                                <input type="text" name="dphno" id="dphno" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="demail" id="demail" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <textarea name="daddr" id="daddr" class="form-control shadow-none" cols="0"
                                    rows="5"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Pin Code</label>
                                <input type="number" name="dpc" id="dpc" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">DOB</label>
                                <input type="date" name="ddob" id="ddob" value="DD/MM/YYYY"
                                    class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="dltuserdetail">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>

        $(document).ready(function () {
            $('.dltbtn').click(function () {
                $('#dltuser').modal("show");
                $tr = $(this).closest('tr');

                var tbdata = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(tbdata);

                $('#did').val(tbdata[0]);
                $('#dfname').val(tbdata[1])
                $('#dlname').val(tbdata[2]);
                $('#dphno').val(tbdata[3]);
                $('#demail').val(tbdata[4]);
                $('#daddr').val(tbdata[5]);
                $('#dpc').val(tbdata[6]);
                $('#ddob').val(tbdata[7]);
            });
        });

    </script>
</body>

</html>