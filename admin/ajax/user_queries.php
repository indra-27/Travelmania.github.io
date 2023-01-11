<?php
 require('../include/wanted.php');
 require('../include/dbconn.php');
 require('../include/links.php');
 require('../include/script.php');
 adminLogin();
 
 if(isset($_POST['dltuserdetail']))
 {
  $did = $_POST['did'];
  
  $queryd = "DELETE FROM regis_details WHERE id = '$did'";
  $query_rund = mysqli_query($conn,$queryd);

  if($query_rund)
  {
    alert1("Success","User Deleted Successfully");
    header('Location: ../users.php');
  }
  else{
    alert1("error","Delete Failed");
  }
 }

 
 ?>