<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "demodb";

$conn = mysqli_connect($host, $user, $password, $database);
$room_id = trim($_POST["rid"]);
$client_id = trim($_POST["client_id"]);
$owner_id = trim($_POST["owner_id"]);
$flag = trim($_POST["flag"]);
$query = "INSERT INTO applications (roomid,owner_id,client_id,status) VALUES ( '$room_id','$owner_id','$client_id','$flag')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo '<h2>Your Application has been submitted successfully.</h2>You can check your application status from <a href="sdash.php">students dashboard<a> section.';

}

?>