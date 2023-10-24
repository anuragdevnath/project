<?php
include('nav.php');
if (isset($_SESSION['ownername'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
$roomid = $_POST['roomid'];
   $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'demodb';
    $conn = mysqli_connect($host, $username, $password, $database);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $targetDir = "images/";
    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    if(move_uploaded_file( $tmpName, $targetDir.$fileName)){
    
        $query = "INSERT INTO addphotos (roomid,room_image) VALUES ( '$roomid','$fileName')";
        
        if(mysqli_query($conn, $query)){
            echo '<div class="alert alert-success">Image added successfully.<br><a href="addphotos.php?roomid='.$roomid.'">Back</a></div>';
        } else{
            echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
    }
        
        mysqli_close($conn);
    }
    ?>
    
