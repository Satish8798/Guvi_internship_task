<?php 

$host         = "localhost";
$username     = "root";

$password     = "";

$dbname       = "users_db";
$result_array = array();

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);

/* Check connection  */
if ($conn->connect_error) {

     die("Connection to database failed: " . $conn->connect_error);
}

$email  = $_POST['email'];

$password = $_POST['password'];

/* SQL query to get results from database */

$sql = "SELECT id, first_name, last_name, email FROM registered_users where email = '$email' and password='$password'";

$result = $conn->query($sql);

/* If there are results from database push to result array */

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        array_push($result_array, $row);

    }

}

/* send a JSON encded array to client */
header('Content-type: application/json');
echo json_encode($result_array);

$conn->close();

?>