<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'demodb';
$conn = mysqli_connect($host, $username, $password, $database);
    if (isset($_GET["id"])) {
        $roomid = $_GET["id"];
        $sql = "DELETE FROM rooms WHERE roomid = '$roomid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql2 = "DELETE FROM addphotos WHERE roomid = '$roomid'";
            $result = mysqli_query($conn, $sql2);
            echo '<div class="alert alert-success">Room Deleted successfully.<br><a href="addphotos.php?roomid='.$roomid.'">Back</a></div>';
            } else {
                echo "Sorry, there was an error deleting the Room.";
            }
    
    }
?>