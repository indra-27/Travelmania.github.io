<?php
 require('../include/wanted.php');
 require('../include/dbconn.php');
 require('../include/links.php');
 require('../include/script.php');
 adminLogin();

 if(isset($_POST['inserthangout']))
 {
    $sno = $_POST['id'];
    $img = $_POST['img'];
    $name = $_POST['name'];
    $location = $_POST['loc'];
    $phno = $_POST['phno'];
    $rating = $_POST['rating'];
    $desc = $_POST['desc'];

    $qu = "INSERT INTO hangouts(id,img,name,location,phno,rating,Description) VALUES ('$sno','$img','$name','$location','$phno','$rating','$desc')";
    $query_run = mysqli_query($conn,$qu);
     
    if($query_run){
      echo "<h2>Hangout data Inserted!!</h2>";
      header('Location: ../hangouts_admin.php');
    }
    else{
      "<h2>Error!,Hotel data not Inserted!!</h2>";
    }
 }

 if(isset($_POST['edithangout']))
 {
  $id = $_POST['hid'];
  $himg = $_POST['himg'];
  $hname = $_POST['hname'];
  $hlocation = $_POST['hloc'];
  $hphno = $_POST['hphno'];
  $hrating = $_POST['hrating'];
  $hdesc = $_POST['hdesc'];

  $query = "UPDATE hangouts SET img = '$himg',name='$hname',location = '$hlocation',phno = '$hphno', Description ='$hdesc', rating ='$hrating' WHERE id = '$id'";
  $query_run3 = mysqli_query($conn,$query);

  if($query_run3)
  {
    alert1("Success","Edited Successfully");
    header('Location: ../hangouts_admin.php');
  }
  else{
    alert1("error","Edit Failed");
  }
 }

 if(isset($_POST['dlthangout']))
 {
  $did = $_POST['did'];
  
  $queryd = "DELETE FROM hangouts WHERE id = '$did'";
  $query_rund = mysqli_query($conn,$queryd);

  if($query_rund)
  {
    alert1("Success","Deleted Successfully");
    header('Location: ../hangouts_admin.php');
  }
  else{
    alert1("error","Delete Failed");
  }
 }
