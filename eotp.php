<?php
session_start();
?>

<?php
// include 'connection.php';
    // echo "<script>(function(){alert('Please do not refresh the page until Transcation Completes');})()</script>";
            $_SESSION["op"]  = "eOTP";
           $email=$_SESSION["email"];
            if($email =="null"){
                 echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
             }
             else{
             $python = `python emailOTP.py $email`;
             $_SESSION["otp"] =$python;
             $_SESSION['start_time'] = time();
              header('Location:verifyeOTP.html') ;
             }
?>