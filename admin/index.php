<?php require('include/dbconn.php');
require('include/wanted.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('include/links.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-TravelMania</title>
    <?php
    require('include/script.php');
    ?>
    <style>
        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="post">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="ad_uname" required type="text" class="form-control shadow-none text-center"
                        placeholder="Admin Username">
                </div>
                <div class="mb-3">
                    <input name="ad_pass" required type="password" class="form-control shadow-none text-center"
                        placeholder="Password">
                </div>
                <input type="submit" name="ad_login" class="btn btn-dark text-white shadow-none" value="Login">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['ad_login'])) {
        $ad_name = $_POST['ad_uname'];
        $ad_pwd = $_POST['ad_pass'];

        $query = "SELECT * FROM ad_cred WHERE ad_uname = ? AND ad_pwd = ?";
        $values=[$ad_name,$ad_pwd];

        $res = select($query,$values,"ss");
        if($res->num_rows==1){
            $row = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['s_no'];
            redirect('hotel.php');
        }
        else{
            alert1('error','Invalid Credentials - Login Failed!');
        }
    }

    ?>
</body>

</html>