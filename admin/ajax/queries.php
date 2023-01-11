<?php
 require('../include/wanted.php');
 require('../include/dbconn.php');
 require('../include/links.php');
 require('../include/script.php');
 adminLogin();

 if(isset($_POST['insertdata']))
 {
    $sno = $_POST['id'];
    $img = $_POST['img'];
    $name = $_POST['name'];
    $guests = $_POST['guests'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $desc = $_POST['desc'];

    $qu = "INSERT INTO hotel_details (id,image,name,guests,price,location,rating,Description) VALUES ('$sno','$img','$name','$guests','$price','$location','$rating','$desc')";
    $query_run = mysqli_query($conn,$qu);
     
    if($query_run){
      echo "<h2>One Hotel data Inserted!!</h2>";
      header('Location: ../hotel.php');
    }
    else{
      "<h2>Error!,Hotel data not Inserted!!</h2>";
    }
 }


 if(isset($_POST['editdata']))
 {
  $id = $_POST['hid'];
  $himg = $_POST['himg'];
  $hname = $_POST['hname'];
  $hguests = $_POST['hguests'];
  $hprice = $_POST['hprice'];
  $hlocation = $_POST['hlocation'];
  $hrating = $_POST['hrating'];
  $hdesc = $_POST['hdesc'];

  $query = "UPDATE hotel_details SET image = '$himg', name ='$hname', guests ='$hguests', price = '$hprice', location = '$hlocation', rating = '$hrating', Description='$hdesc' WHERE id = '$id'";
  $query_run3 = mysqli_query($conn,$query);

  if($query_run3)
  {
    alert1("Success","Edited Successfully");
    header("Location: ../hotel.php");
  }
  else{
    alert1("error","Edit Failed");
  }
 }


 if(isset($_POST['dltdata']))
 {
  $did = $_POST['did'];
  
  $queryd = "DELETE FROM hotel_details WHERE id ='$did'";
  $query_rund = mysqli_query($conn,$queryd);

  if($query_rund)
  {
    alert1("Success","Deleted Successfully");
    header("Location: ../hotel.php");
  }
  else{
    alert1("error","Delete Failed");
  }
 }



 if(isset($_POST['insertservices']))
 {
  $ssno = $_POST['sno'];
  $service = $_POST['srvc'];
  

  $squery = "INSERT INTO services(sno,service) VALUES ('$ssno','$service')";
  $query_run4 = mysqli_query($conn,$squery);

  if($query_run4)
  {
    alert1("Success","Service Inserted Successfully");
    header("Location: ../sandg.php");
  }
  else{
    alert1("error","Failed");
  }
 }

 if(isset($_POST['insertgeneral']))
 {
  $gsno = $_POST['sno1'];
  $general = $_POST['gen'];
  

  $gquery = "INSERT INTO general(sno,general) VALUES ('$gsno','$general')";
  $query_run5 = mysqli_query($conn,$gquery);

  if($query_run5)
  {
    alert1("Success","General Inserted Successfully");
    header("Location: ../sandg.php");
  }
  else{
    alert1("error","Failed");
  }
 }

 if(isset($_POST['dltyes_s']))
 {
  $ssno = $_POST['sno'];
  $service = $_POST['srvc'];
  

  $squery = "DELETE FROM services WHERE sno='$ssno'";
  $query_run6 = mysqli_query($conn,$squery);

  if($query_run6)
  {
    alert1("Success","Service Deleted Successfully");
    header("Location: ../sandg.php");
  }
  else{
    alert1("error","Failed");
  }
 }

 if(isset($_POST['dltyes_g']))
 {
  $gsno = $_POST['sno1'];
  $general = $_POST['gen'];
  

  $gquery = "DELETE FROM general WHERE sno='$gsno'";
  $query_run7 = mysqli_query($conn,$gquery);

  if($query_run7)
  {
    alert1("Success","General Deleted Successfully");
    header("Location: ../sandg.php");
  }
  else{
    alert1("error","Failed");
  }
 }


?>
