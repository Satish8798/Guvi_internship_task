<?php

$host         = "localhost";

$username     = "root";

$password     = "";

$dbname       = "users_db";

$result = 0;

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);

/* Check connection */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}

/* Get data from Client side using $_POST array */

$fname  = $_POST['first_name'];

$lname  = $_POST['last_name'];

$email  = $_POST['email'];

$password = $_POST['password'];

/* validate whether user has entered all values. */

if(!$fname || !$lname || !$email || !$password){

  $result = 2;

}elseif (!strpos($email, "@") || !strpos($email, ".")) {

  $result = 3;

}else {

   //SQL query to get results from database
   $sql    = "insert into registered_users (first_name, last_name, email, password) values (?, ?, ?, ?)  ";

   $stmt   = $conn->prepare($sql);

   $stmt->bind_param('ssss', $fname, $lname, $email, $password);

   if($stmt->execute()){
     
        $result = 1;
     
   }

}

echo $result;

$conn->close();