<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "demodb";
$conn = mysqli_connect($host, $user, $password, $database);
$app_id = trim($_POST["k0"]);
$room_id = trim($_POST["k1"]);
$query = "DELETE FROM applications WHERE application_id = '$app_id'";
$result = mysqli_query($conn, $query);
if($result){
    $sql="SELECT available_beds FROM rooms WHERE roomid ='$room_id'";
    $response = mysqli_query($conn,$sql);   
    $available = mysqli_fetch_array($response);
    $newavailable = $available[0]+1;
    $sql2 = "UPDATE rooms SET available_beds = '$newavailable' WHERE roomid='$room_id'";
    $result2=mysqli_query($conn, $sql2);
    if($result2){
        echo "<div class='alert alert-success'>Removed successfully</div>";
    }else{
        echo "Error while removing";
    }
}
else{
    echo "Error while removing";
}
?>