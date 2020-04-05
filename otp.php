<?php
session_start();
?>
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "<script>(function(){alert('Please do not refresh the page until Transcation Completes');})()</script>";
    $op = $_POST["otp"];
    $_SESSION["op"]= $op;
        if($op == "mobOTP"){  
              
            $mn = $_SESSION["mobno"];
            if($mn =="null"){
                echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
            }
            else{
                
                // Account details
                $apiKey = urlencode('e6ES5mVtBvo-7MO2iYHRJTYXHSDWmvc0WmIg89JuRf');
                
                // Message details
                $otp = rand(1000,9999);
                $numbers = '91'.$mn;
                $sender = urlencode('TXTLCL');
                $message = rawurlencode('Your OTP is '.$otp);
             
                $numbers = implode(',', $numbers);
             
                // Prepare data for POST request
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
             
                // Send the POST request with cURL
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                
                // Process your response here
                echo $response;
        
            $_SESSION["otp"] =$otp;
            $_SESSION['start_time'] = time();
               header('Location:verifyOTP.html') ;
            }
        }   
        else
        if($op =="eOTP"){
            $email=$_SESSION["email"];
            if($email =="null"){
                echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
            }
            else{
            $python = `python emailOTP.py $email`;
            $_SESSION["otp"] =$python;
            $_SESSION['start_time'] = time();
             header('Location:verifyOTP.html') ;
            }
        }
        
}
else{
    $op = $_SESSION["op"];
    
    if($op == "mobOTP"){   
        $mn = $_SESSION["mobno"];
        if($mn =="null"){  
            echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
        }
        else{
            $apiKey = urlencode('e6ES5mVtBvo-7MO2iYHRJTYXHSDWmvc0WmIg89JuRf');
                
            // Message details
            $otp = rand(1000,9999);
            $numbers = '91'.$mn;
            $sender = urlencode('TXTLCL');
            $message = rawurlencode('Your OTP is '.$otp);
         
            $numbers = implode(',', $numbers);
         
            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            // Process your response here
            echo $response;
    
        $_SESSION["otp"] =$otp;
        $_SESSION['start_time'] = time();
          header('Location:verifyOTP.html') ;
        }
    }   
    else
    if($op =="eOTP"){
        $email=$_SESSION["email"];
        echo $email;
        if($email =="null"){ 
             echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
        }
        else{
        $python = `python emailOTP.py $email`;
        $_SESSION["otp"] =$python;
        $_SESSION['start_time'] = time();
          header('Location:verifyOTP.html') ;
        }
    }
}
?>