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
    <title>Admin-Hotels</title>
    <?php require('include/links.php');
    require('include/script.php'); ?>
</head>

<body>
    <?php require('include/header.php'); ?>
<!--Table for Hotels-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-3 text-center fw-bold">Hotels</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addhotel">
                                <i class="bi bi-plus-square me-2"></i>Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sno</th>
                                        <th scope="col">Image Path</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Rating</th>  
                                        <th scope="col">Description</th>                               
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                $dbdata = selectAll('hotel_details');
                                if ($dbdata) {
                                    foreach ($dbdata as $row) {
                                ?>
                                <tbody id="room-data">
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['Image']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['guests']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <td><?php echo $row['rating']; ?></td>
                                        <td class="w-auto"><?php echo $row['Description']; ?></td>
                                        <td>
                                            <button type="button" class="editbtn btn btn-primary shadow-none mb-2"><i class="bi bi-pencil-square"></i></button>
                                            <button type="button" class="dltbtn btn btn-danger shadow-none"><i class="bi bi-trash"></i></button>
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


<!--Add Hotel Modal-->
    <div class="modal fade" id="addhotel" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="addhotel_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Hotel</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">S_no</label>
                                <input type="number" name="id" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Image <small class="text-muted">(Give the Path of image)</small></label>
                                <input type="text" name="img" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Guest</label>
                                <input type="number" name="guests" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="location" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rating</label>
                                <input type="text" name="rating" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Description</label>
                               <textarea name="desc" class="form-control shadow-none" id="desc" cols="20" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="insertdata">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<!--Edit Hotel Modal-->
    <div class="modal" id="edithotel" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edithotel_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Edit Hotel</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">S_no</label>
                                <input type="number" name="hid" id="hid" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Image <small class="text-muted">(Give the Path of image)</small></label>
                                <input type="text" name="himg" id="himg" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="hname" id="hname" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Guest</label>
                                <input type="number" name="hguests" id="hguests" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="hprice"id="hprice" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="hlocation" id="hlocation" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rating</label>
                                <input type="text" name="hrating" id="hrating" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Description</label>
                               <textarea name="hdesc" id="hdesc" class="form-control shadow-none" cols="20" rows="10" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="editdata">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!--Delete Hotel Model-->
<div class="modal" id="dlthotel" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="dlthotel_form" method="POST" action="ajax/queries.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Delete Hotel</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">S_no</label>
                                <input type="number" name="did" id="did" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Image <small class="text-muted">(Give the Path of image)</small></label>
                                <input type="text" name="dimg" id="dimg" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="dname" id="dname" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Guest</label>
                                <input type="number" name="dguests" id="dguests" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="dprice"id="dprice" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="dlocation" id="dlocation" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rating</label>
                                <input type="text" name="drating" id="drating" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Description</label>
                               <textarea name="ddesc" id="ddesc" class="form-control shadow-none" cols="0" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary shadow-none" name="dltdata">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        
       $(document).ready(function(){
            $('.editbtn').click(function(){
                $('#edithotel').modal("show");
                $tr = $(this).closest('tr');

                var tbdata = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(tbdata);

                $('#hid').val(tbdata[0]);
                $('#himg').val(tbdata[1])
                $('#hname').val(tbdata[2]);
                $('#hguests').val(tbdata[3]);
                $('#hprice').val(tbdata[4]);
                $('#hlocation').val(tbdata[5]);
                $('#hrating').val(tbdata[6]);
                $('#hdesc').val(tbdata[7]);

            });
       });

       $(document).ready(function(){
            $('.dltbtn').click(function(){
                $('#dlthotel').modal("show");
                $tr = $(this).closest('tr');

                var tbdata = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(tbdata);

                $('#did').val(tbdata[0]);
                $('#dimg').val(tbdata[1])
                $('#dname').val(tbdata[2]);
                $('#dguests').val(tbdata[3]);
                $('#dprice').val(tbdata[4]);
                $('#dlocation').val(tbdata[5]);
                $('#drating').val(tbdata[6]);
                $('#ddesc').val(tbdata[7]);
            });
       });

       let hotelservices = [];
        addhotel_form.elements['services'].forEach(el => {
            if (el.checked) {
                hotelservices.push(el.value);
            }
        });

        let hotelgeneral = [];
        addhotel_form.elements['general'].forEach(el => {
            if (el.checked) {
                hotelgeneral.push(el.value);
            }
        });

        data.append('services', JSON.stringify(hotelservices));
        data.append('general', JSON.stringify(hotelgeneral));

    </script>
</body>

</html>