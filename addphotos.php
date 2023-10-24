<?php 
include("nav.php") ;
if (isset($_SESSION['ownername'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
$roomid = $_GET['roomid'];
echo '<form action="addphotos2.php" method="POST" enctype="multipart/form-data">
<h1 class="text-success">Select Image To Upload</h1>
<input class="form-control" type="file" id="DefaultFile" name="image">
<input type="hidden" name="roomid" value="';
echo $roomid;
echo '">
<button class="btn btn-warning" type="submit">Upload</button>
</form>';
?>



<h2>Previously Uploaded Images</h2>

<?php
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
echo '<img src="images/' . $imagePath . '" width="200" height="150" alt="Uploaded Image" /><br />';
echo '</td>';
echo '<td>';
echo '<a href="delete.php?id=' . $imageId . '&roomid=' . $roomid . '"><button type="button" class="btn btn-danger btn-lg">Delete</button></a>';
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