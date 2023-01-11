<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('include/links.php');
  require('include/scripts.php')
  ?>


  <style>
    .swiper {
      width: 45%;
      height: 645px;
      float: left;
    }

    .swiper-slide {
      display: flex;
    }

    .img {
      width: 100%;
      height: 100%;
    }

    .smimg {
      width: 100%;
      height: 100%;
    }

    .anitext {
      font-size: 40px;
      text-transform: uppercase;
      background-image: linear-gradient(-225deg,
          #231557 0%,
          #44107a 29%,
          #ff1361 67%,
          #fff800 100%);
      position: absolute;
      background-size: auto auto;
      background-clip: border-box;
      background-size: 200% auto;
      color: #fff;
      right: 200px;
      top: 200px;
      background-clip: text;
      text-fill-color: transparent;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: textclip 2s linear infinite;
      display: inline-block;
      display: inline-block;
      /* this is needed for inline elements */
      transform: scale(1.3);
    }

    @keyframes textclip {
      to {
        background-position: 200% center;
      }
    }



    .lgani {
      float: right;
      width: 54.9%;
      padding: 310.3px;
    }
  </style>
</head>

<body>
  <?php require('include/header.php');
  require('admin/include/dbconn.php'); ?>

  <!--Carousel-->
  <!--Carousel for Sm device-->
  <div class="d-md-block d-lg-none">
    <img class="smimg" src="img/travel1.jpg" alt="">
  </div>
  <!--Carousel for lg device-->
  <div class="container-fluid d-none d-lg-block">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img class="img" src="img/main.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel1.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel2.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel3.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel4.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel5.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel6.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel7.jpg" alt="">
        </div>
        <div class="swiper-slide">
          <img class="img" src="img/travel8.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <!--Animated Text for lg devices-->
  <div class="container">
    <div class="row">
      <div class="lgani d-none d-lg-block">
        <pre><h2><i class="font anitext">Are You Ready to Spend 
    an Amazing time in 
       South India?! </i></h2></pre>
        <br><br><br>
        <!--Search for Hotels-->
        <div class="col-lg-5 p-4 bg-white rounded position-absolute mb-5 start-50" style="position:absolute;top:400px;">
          <h3 class="mb-3">Search for Hotels</h3>
          <form class="form-group" method="post" action="index.php">
            <div class="row align-items-center">
              <div class="col-lg-4 mb-2">
                <div class="form-group">
                  <label class="form-label">Check-in</label>
                  <input type="date" class="form-control shadow-none">
                </div>
              </div>
              <div class="col-lg-4 mb-2">
                <div class="form-group">
                  <label class="form-label">Check-out</label>
                  <input type="date" class="form-control shadow-none">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-label">City</label>
                    <select class="form-control" name="city" required>
                      <option>Choose</option>
                      <option>Ooty, TN</option>
                      <option>Visakhapatnam, AP</option>
                      <option>Warangal, TS</option>
                      <option>Madikeri, KA</option>
                      <option>Alleppey, KL</option>
                      <option>Pondicherry, India</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 align-items-end mt-3">
                <div class="form-group">
                  <button class="form-control btn btn-primary shadow-none" type="submit"
                    name="searchbtn">Search</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Hotel Cards-->
  <h2 class="mb-5 pt-3 mt-1 fw-bold font text-center">HOTELS</h2>
  <div class="container" id="hotels">
    <div class="row">
      <?php
      if(isset($_POST['searchbtn']))
      {
        $city = $_POST['city'];
        $hotel_det = mysqli_query($conn,"SELECT * FROM hotel_details WHERE location ='$city'");
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
      }
      else
      {
        $hotel_det = mysqli_query($conn,"SELECT * FROM hotel_details LIMIT 3");
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
      }
      ?>

      <div class="col-lg-12 text-center mt-5">
        <a href="morehotels.php" class="btn btn-md btn-outline-dark rounded-0 fw-bold shadow-none">More Hotels>>></a>
      </div>
    </div>
  </div>

  <!--Common Services and Facilities-->
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


  <!--Testimonals-->
  <h2 class="mb-2 pt-3 mt-5 mx-auto fw-bold font d-none d-sm-none d-md-none d-lg-block" style="width: 200px;">
    TESTIMONALS</h2>
  <div class="container d-none d-sm-none d-md-none d-lg-block">
    <div class="swiper-testi mb-5">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-start">
            <img src="img/Rooban.jpg" class="rounded" width="40px">
            <h6 class="m-0 ms-2"><span class="fw-bold">Rooban Chakravathi</span><br><span>This is a fantastic website to search for hotels especially 
              for those who are budget friendly. The hotels shown in this website are also verified hotels.</span><br><span> ⭐⭐⭐</span>
            </h6>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-start">
            <img src="img/Indra.jpg" width="40px">
            <h6 class="m-0 ms-2"><span class="fw-bold">Indra Balakrishnan</span><br><span>I really enjoyed searching hotels for my trip 
              this time in this website. Really useful and such a time saver for sure!!</span><br><span> ⭐⭐⭐⭐</span>
            </h6>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-start">
            <img src="img/GV.jpg" width="40px">
            <h6 class="m-0 ms-2"><span class="fw-bold">Jeevitha Devaraj</span><br><span>I am a type of person who sees all the options first,
               then explore what i want. So this website is for persons like me!! Search for all options and then decide :)  </span><br><span> ⭐⭐⭐⭐</span>
            </h6>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!--Find Spots-->
  <h2 class="mb-3 pt-3 mt-5 mx-auto fw-bold font" style="width: 200px;">Find Spots!</h2>
  <div class="container align-items-end">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="450px"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7951790.568822918!2d78.58468700748669!3d13.306032313497601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baf1c528a383965%3A0xed77f1a39696ccc7!2sSouth%20India!5e0!3m2!1sen!2sin!4v1667918924812!5m2!1sen!2sin"
          loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col=lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h4 class="font" style="color:#393E46;"><i>Explore THE best spots nearby and take back the fabulous experience
              with you!!</i></h4>
          <img src="img/travel9.jpg" width="300" height="350">
        </div>
      </div>
    </div>
  </div>

  <?php require('include/footer.php') ?>

  <script>
    var swiper3 = new Swiper(".swiper-container", {
      grabCursor: false,
      loop: true,
      autoplay: {
        delay: 1500,
        disableOnInteraction: false,
      },
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: ["-20%", 0, -1],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },
    });

    var swiper = new Swiper(".swiper-testi", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: false,
      slidesPerView: "auto",
      slidesPerView: "3",
      coverflowEffect: {
        rotate: 50,
        stretch: 10,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },

      }
    });
  </script>
</body>
</html>