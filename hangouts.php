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
        <h2 class="fw-bold text-center font">Hangout!!</h2>
        <div class="h-line bd-dark"></div>
        <p class="text-center mt-3 fw-bold"><i>“Life was meant for good friends and great adventures.”</i></p>
    </div>

    <div class="position-relative">
        <div class="container hotel">
            <div class="row">
                <?php
            $hangout_det = selectAll('hangouts');
            while ($hangout_data = mysqli_fetch_assoc($hangout_det)) {
                echo <<<data
                       <div class="col-lg-4 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <img src="$hangout_data[img]" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="fw-bold font">$hangout_data[name]</h5>
                                    <h6 class="mb-3 me-3"><span class="text-muted me-3"><i class="bi bi-geo-alt-fill"></i>$hangout_data[location]</span>
                                    <span class="text-muted me-3"><i class="bi bi-telephone me-1"></i>$hangout_data[phno]</span>
                                    </h6>
                                    <div class="features mb-4">
                                      <h6 class="mb-1 fw-bold font">Description</h6>
                                      <h6>$hangout_data[Description]</h6>
                                      <h6 class="fw-bold font">Rating <span class="badge rounded-pill bg-light text-warning text-wrap">$hangout_data[rating]</span></h6>
                                    </div class="d-flex">
                                        <a href="$hangout_data[route]" class="btn btn-info shadow-none">Wanna Visit?</a>
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

