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

    <marquee  direction="left" style="border: black 3px solid; color: brown;">If you haven't Logged/Signed in, Please do log in before Booking the Hotel. Thank you!</marquee>

   <?php 
   $qu =mysqli_query($conn,"SELECT id,name from hotel_details") ;
   ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold text-center font">Booking</h2>
    </div>
    <div class="container">
        <div class="col-lg-12 p-4 bg-white rounded">
            <form class="form-group" method="post" id="myform" action="ajax/booking.php">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none border border-dark" value=""
                                required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="form-group">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="number" name="phno" class="form-control shadow-none border border-dark"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="form-group">
                            <label class="form-label fw-bold">Address</label>
                            <input type="text" name="addr" class="form-control shadow-none border border-dark"
                                value="" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Hotel</label>
                        <select class="form-control shadow-none border border-dark" name="hotel">
                        <option>Choose</option>
                            <?php while($row = mysqli_fetch_array($qu)): ?>
                            <option><?php echo $row['name'] ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="form-group">
                            <label class="form-label fw-bold">Check-in</label>
                            <input type="date" name="cin" class="form-control shadow-none border border-dark" required>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-group">
                            <label class="form-label fw-bold">Check-out</label>
                            <input type="date" name="cout" class="form-control shadow-none border border-dark" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 align-items-end mt-3">
                        <div class="form-group">
                            <button class="form-control btn btn-primary shadow-none" name="book" type="submit">Confirm
                                Booking</button>
                        </div>
                    </div>
                </div>

        </div>
        </form>
    </div>
    </div>
    </div>
    </div>

    </div>

    <?php require('include/footer.php') ?>

    <script>
            document.getElementById('myform').reset();
    </script>

</body>

</html>