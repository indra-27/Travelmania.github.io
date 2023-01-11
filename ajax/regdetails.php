<?php
 require('../admin/include/wanted.php');
 require('../admin/include/dbconn.php');
 require('../admin/include/links.php');
 require('../admin/include/script.php');
 
 if(isset($_POST['rbutton']))
 {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $pc = $_POST['pc'];
    $dob = $_POST['dob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $qu1 = mysqli_query($conn,"SELECT * FROM regis_details WHERE email='$email'");
    $qu2 = mysqli_query($conn,"SELECT * FROM regis_details WHERE phno ='$phno'");

    if($pass!=$cpass){
        alert1('error','Password Mismatch');
    }
    elseif(mysqli_num_rows($qu1)>0){
      alert1('error','Email Already Exists');
    }
    elseif(mysqli_num_rows($qu2)>0){
        alert1('error','Phone number already exists');
    }
    else
    {
        $qu = "INSERT INTO regis_details(fname,lname,phno,email,address,pincode,dob,pass,cpass) VALUES ('$fname','$lname','$phno','$email','$addr','$pc','$dob','$pass','$cpass')";
        $query_run = mysqli_query($conn,$qu);
         
        if($query_run){
          header('Location: ../index.php');
          alert1('success','Registered Successfully');
        }
        else{
          "<h2>Error!,Registration not successful!</h2>";
        }
    }

 }
 

 if(isset($_POST['login']))
 {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $qu1 = mysqli_query($conn,"SELECT * FROM regis_details WHERE email='$email'AND pass = '$pass'");
    $count= mysqli_num_rows($qu1);
    if($count>0)
    {
      session_start();
      $_SESSION['login']=true;
      $_SESSION['email']=$email;
      header('Location: ../index.php');
    }
    else
    {
      alert1('error','Login Failed! Invalid email or password');
    }
 }
 
 if(isset($_POST['updatepwd']))
 {
    $email = $_POST['uemail'];
    $pass = $_POST['upwd'];

    $qu = mysqli_query($conn,"UPDATE regis_details SET pass='$pass', cpass ='$pass' WHERE email = '$email'");
    if($qu)
    {
      header('Location: ../index.php');
      alert1('success','Password Updated!');
    }
    else{
      alert1('error','Login Failed! Invalid email or password');
    }
 }
 



 ?>