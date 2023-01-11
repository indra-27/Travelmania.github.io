<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('include/links.php') ?>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php require('include/header.php');
    require('admin/include/dbconn.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center font">Available Hotels</h2>
    </div>

    <div class="position-relative">
        <div class="container hotel">
            <div class="row">

                <?php
                $hotel_det = selectAll('hotel_details');
                while ($hotel_data = mysqli_fetch_assoc($hotel_det)) {
                    echo <<<data
                       <div class="col-lg-4 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <img src="$hotel_data[Image]" class="card-img-top">
                                <div class="card-body">
                                    <h5>$hotel_data[name]</h5>
                                    <h6 class="me-3">₹$hotel_data[price]/per night <span class="text-muted"><i class="bi bi-geo-alt-fill"></i>$hotel_data[location]</span></h6>
                                    <h6 class="mb-3 me-3">$hotel_data[guests] persons/room</h6>
                                    <div class="features mb-4">
                                        <h6 class="mb-1"><i class="bi bi-exclamation-circle me-2"></i>Description</h6>
                                        <p>$hotel_data[Description]</p>
                                        <h6 class="mb-1">Rating <span class="badge rounded-pill bg-light text-warning text-wrap mb-2">$hotel_data[rating]</span></h6>
                                   </div>
                                   <a href="booknow.php" class="btn btn-info shadow-none">Book Now!</a>
                                </div>
                           </div>
                        </div>
                    data;
                }
                ?>
            </div>
        </div>
    </div>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center font">Common Services</h2>
    </div>

    <div class="position-relative">
        <div class="container hotel">
            <div class="row">

                <?php
                $srvc_det = selectAll('services');
                while ($srvc_data = mysqli_fetch_assoc($srvc_det)) {
                    echo <<<data
                       <div class="col-lg-2 me-4 my-1">
                            <div class="row">
                                <div class="card border-0 shadow bg-dark">
                                   <div class="card-body">
                                       <h6 class="text-light fw-bold">$srvc_data[service]</h6>
                                   </div>
                                </div>
                           </div>
                        </div>
                    data;
                }
                ?>
            </div>
        </div>
    </div>


    <div class="my-5 px-4">
        <h2 class="fw-bold text-center font">Common Facilities</h2>
    </div>

    <div class="position-relative">
        <div class="container hotel">
            <div class="row">

                <?php
                $gen_det = selectAll('general');
                while ($gen_data = mysqli_fetch_assoc($gen_det)) {
                    echo <<<data
                       <div class="col-lg-2 me-4 my-1">
                            <div class="row">
                                <div class="card border-0 shadow bg-dark">
                                   <div class="card-body">
                                       <h6 class="text-light fw-bold">$gen_data[general]</h6>
                                   </div>
                                </div>
                           </div>
                        </div>
                    data;
                }
                ?>
            </div>
        </div>
    </div>

    <?php require('include/footer.php') ?>


</body>

</html>