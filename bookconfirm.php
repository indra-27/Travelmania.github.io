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

    <?php
   $qu = mysqli_query($conn, "SELECT id,name from hotel_details");
   ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".book").fadeOut(5000);
        });

    </script>
    </head>

    <body>
        <div class="book container text-center inline-block my-5 mt-5">
            <h1 class="font fw-bold"><i>Congratulation!!</i></h1>
            <h1 class="font fw-bold"><i>Your Booking has been Confirmed</i></h1>
            <h3 class="font fw-bold">Thanks for Booking!</h3>
        </div>


    </body>

</body>

</html>