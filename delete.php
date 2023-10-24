<?php
if (isset($_SESSION['ownername'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
include('nav.php');
$roomid = $_GET['roomid'];
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'demodb';
$conn = mysqli_connect($host, $username, $password, $database);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $imageId = $_GET["id"];
    $sql = "DELETE FROM addphotos WHERE image_id = '$imageId'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success">Image Deleted successfully.<br><a href="addphotos.php?roomid='.$roomid.'">Back</a></div>';
        } else {
            echo "Sorry, there was an error deleting the image.";
        }

}

$conn->close();
?>
