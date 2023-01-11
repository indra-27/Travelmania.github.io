<?php
  function adminLogin(){
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        echo"<script>window.location.href='index.php';
        </script>";
    }
  }

  function redirect($url){
    echo"<script>window.location.href='$url';
    </script>";
  }
  
  function alert1($type,$text){
    $alert_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $alert_class alert-dismissible fade show custom-alert" role="alert">
       <strong>$text</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;  
 }
?>