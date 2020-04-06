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
    $email = $_POST["email"];
    $pno = $_POST["phoneNo"];

    $sql = "INSERT INTO carddetails (cname , cnum , em , ey , cvv , email , mobno) values('" . $cname . "', '" . $cnum ."', '" . $em . "','" . $ey . "','" . $cvv . "','" . $email . "','" . $pno . "')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header('Location:welcome.html') ;
}
?>