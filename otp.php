<?php
session_start();
?>
<?php
// include 'connection.php';
    echo "<script>(function(){alert('Please do not refresh the page until Transcation Completes');})()</script>";
         $_SESSION["op"]  = "mobOTP";
            $mn = $_SESSION["mobno"];
            if($mn =="null"){
                echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
            }
            else{            
                $otp = rand(1000,9999);
                $numbers = '+91'.$mn;
                echo $numbers;
                $message = 'Dear User, OTP for mobile number verification is '.$otp.'. Thanks SafePay';
                // A Twilio number you own with SMS capabilities
                 // Account details
                 $apiKey = urlencode('e6ES5mVtBvo-7MO2iYHRJTYXHSDWmvc0WmIg89JuRf');
                 // Message details
                // Prepare data for POST request
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "message" => $message);
     
             // Send the POST request with cURL
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                echo $response;
                 $_SESSION["otp"] =$otp;
                $_SESSION['start_time'] = time();
                 header('Location:verifyOTP.html') ;
              }
          


?>
