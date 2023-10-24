<?php
include('nav.php');
if (isset($_SESSION['loggedIn'])!=true){
    echo '<script>window.location="logchoice.php"</script>';
}
    $roomid = $_GET['id'];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'demodb';

    $conn = mysqli_connect($host, $username, $password, $database);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

$sql = "SELECT * FROM addphotos where roomid='$roomid'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped table-dark">';
    while ($row = $result->fetch_assoc()) {
        $imagePath = $row["room_image"];
        $imageId = $row["image_id"];

echo '<tr>';
echo '<td>';
echo '<img src="images/' . $imagePath . '" width="300" height="250" alt="Uploaded Image" /><br />';
echo '</td>';
echo '</tr>';

    }
    echo '</table>';
} else {
    echo "No images uploaded yet.";
}

mysqli_close($conn);
?>

</body>
</html>