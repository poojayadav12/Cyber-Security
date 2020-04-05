<?php
include 'connection.php';
$uname=  mysqli_real_escape_string($conn,$_POST["uname"]);
$pwd = mysqli_real_escape_string($conn,$_POST["password"]);
$sql = "SELECT pwd FROM userdetails WHERE uname ='$uname'";

$f=0;
 if ($result = $conn -> query($sql)) {
  while ($row = $result ->fetch_assoc()) {
			$hash = $row['pwd'];
		   
		  if(password_verify($pwd, $hash))
		  {
			
		  	 header('Location:welcome.html') ;
		  	 $f=1;
		     break;
		  }
		}
	  
	  if($f==0){
		  
		  echo "<script>(function(){alert('Invalid Credentials');})(); window.location.replace('index.html');</script>";
	  }
  }
   else
        {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

?>