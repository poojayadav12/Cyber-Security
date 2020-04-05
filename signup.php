<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$uname= mysqli_real_escape_string($conn,$_POST["uname"]);
$pwd = mysqli_real_escape_string($conn,$_POST["pword"]);
$pw = password_hash($_POST["pword"],PASSWORD_DEFAULT);
$fn = mysqli_real_escape_string($conn,$_POST["fname"]);
$ln = mysqli_real_escape_string($conn,$_POST["lname"]);
$em =mysqli_real_escape_string($conn,$_POST["email"]);
$phn = mysqli_real_escape_string($conn,$_POST["phone"]);
$dd = mysqli_real_escape_string($conn,$_POST["dd"]);
$q = "SELECT uname FROM userdetails";
// echo($uname);

$f=0;
 if ($result = $conn -> query($q)) {
  while ($row = $result ->fetch_assoc()) {
 		  if($row['uname'] == $uname)
 		  {
			   
			    echo "<script>(function(){alert('This Username is already in use');})(); window.location.replace('signup.html');</script>"; 
		  	 $f=1;
 		     break;
		  }  	 
		}
	}
	if($f==0){
$sql = "INSERT INTO userdetails (uname , dob , lname , fname , email , phone , pwd) values('" . $uname . "', '" . $dd ."', '" . $ln . "','" . $fn . "','" . $em . "','" . $phn . "','" . $pw . "')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('Location:welcome.html') ;
}
 
}

?>
