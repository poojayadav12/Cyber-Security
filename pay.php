<?php
session_start();
?>

<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $cname= strtoupper($_POST["cardname"]);  
    $cnum = $_POST["cardnumber"];
    $em = strtoupper($_POST["expmonth"]);
    $ey = $_POST["expyear"];
    $cvv = $_POST["cvv"];

    $sql = "SELECT cvv,mobno,email FROM carddetails WHERE cname = '$cname' AND cnum = '$cnum' AND em='$em' AND ey='$ey'";
    
    
    $f =0;
    if ($result = $conn -> query($sql)) {
        while ($row = $result ->fetch_assoc()) {
            if( $row['cvv'] == $cvv)
            {
                $_SESSION["mobno"] = $row['mobno'];
                $_SESSION["email"] = $row['email'];
                header('Location:otp.html') ;
                 break;
            }

        }
    }
    if($f==0){
        echo "Redirecting...";
    echo "<script>(function(){alert('Invalid Card Details');})(); window.location.replace('pay.html');</script>"; 
    }
}
    ?>