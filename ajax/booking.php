<?php
 require('../admin/include/wanted.php');
 require('../admin/include/dbconn.php');
 require('../admin/include/links.php');
 require('../admin/include/script.php');
 adminLogin();
 
if(isset($_POST['book']))
 {
    $name = $_POST['name'];
    $phno = $_POST['phno'];
    $addr = $_POST['addr'];
    $hotel = $_POST['hotel'];
    $cin = $_POST['cin'];
    $cout = $_POST['cout'];

    $qu = mysqli_query($conn,"INSERT INTO booking(Cust_name, phno, addr, hotel, checkin, checkout) VALUES ('$name','$phno','$addr','$hotel','$cin','$cout')");
    if($qu){
        header('Location: ../bookconfirm.php');
    }
}

?>
