<?php
    
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL")) ;
    $c_s = 'us-cdbr-iron-east-01.cleardb.net';
    $c_u = 'be3083510c3140';
    $c_p = '716c0fad';
    $c_db = 'heroku_d877f2ebefc84ff';

    // name of the server
    $servername = $c_s;
    // username of the user
    $username = $c_u;
    
    // password of the mysql user
    $password = $c_p;
    
    // database that is being used
    $db = $c_db;
    
    // Establishing a connection between PHP and MySQL
    $conn = new mysqli($servername, $username, $password, $db);
    
    // Checking for a connection error
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }
    
?>
