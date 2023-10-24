<?php
session_start();
if (isset($_SESSION['ownerid'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
$host = "localhost";
$user = "root";
$password = "";
$database = "demodb";
$appid = $_GET["appid"];
$rid = $_GET["roomid"];
$conn = mysqli_connect($host, $user, $password, $database);
echo $query="SELECT available_beds FROM rooms WHERE roomid =$rid";
$response = mysqli_query($conn,$query);
$available = mysqli_fetch_array($response);
if($available[0]>=1){
    $sql = "UPDATE applications SET status = 1 WHERE application_id='$appid'";
    $newavailable = $available[0]-1;
    $sql2 = "UPDATE rooms SET available_beds = '$newavailable' WHERE roomid='$rid'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
    if($result && $result2){
        echo "<script>alert('application accepted')</script>";
        echo "<script>window.location='ownerapp.php';</script>";
    }
    else{
    
        echo "No rooms available!";
    }
}


?>