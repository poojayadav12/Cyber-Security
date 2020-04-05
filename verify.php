<?php
session_start();
?>

<?php
$input = $_POST['otp'];
$otp = $_SESSION['otp'];
$otpn = $otp[0].$otp[1].$otp[2].$otp[3];
$start_time = $_SESSION['start_time'];

if($_SESSION["mobno"]=="null"){
    echo "<script>(function(){alert('Please Enter the Card Details');})(); window.location.replace('welcome.html');</script>";
}
else{

if(time()-$start_time<=60){
if($input == $otpn){
    $_SESSION["mobno"] ="null";
    $_SESSION["email"] ="null";
echo '<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>Safe Pay-Verify</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="https://kit.fontawesome.com/131820b999.js" crossorigin="anonymous"></script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body >

<section class="main" id="welcome">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="welcome.html"><img src="images/coins.png" height="30" width="30">S@fe Pay</a></h1>
			</div>
			<div class="links" style="display: flex;">
				<ul class="links-unordered-list">
					<li class="">
						<a href="#" class=""> <i class="fa fa-user" aria-hidden="true"></i> User </a>
					</li>
					<li class="">
						<a href="index.html" class=""><i class="fas fa-sign-out-alt"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-w3ls">	 
			<h1 class="heading"> Transcation Completed </h1>			
		</div>
    </div>

</section>

</body>
<!-- //Body -->
</html>

';
}
else
echo "<script>(function(){alert('Entered Wrong OTP');})(); window.location.replace('verifyOTP.html');</script>";
}
else
{
    echo 'Session expired';
    $_SESSION['otp']= 0;
    echo "<script>(function(){alert('Session Experied, Please click on the Resend button');})(); window.location.replace('verifyOTP.html');</script>";
}
}
?>