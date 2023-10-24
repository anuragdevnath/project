<?php 
include('nav.php'); 
?>
<body>
<?php
if(isset($_POST['submit'])){

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'demodb';
    
    $conn = mysqli_connect($host, $username, $password, $database);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    $owner_name=$_SESSION['ownername'];
    $owner_id=$_SESSION['ownerid'];
    $no_of_beds = $_POST['no_of_beds'];
    $room_rent = $_POST['room_rent'];
    $room_area = $_POST['area'];
    $available_beds = $_POST['available_beds'];
    $targetDir = "images/";
    $fileName = $_FILES["room_image"]["name"];
    $tmpName = $_FILES["room_image"]["tmp_name"];
    if(move_uploaded_file( $tmpName, $targetDir.$fileName)){
    
    $query = "INSERT INTO rooms (owner_id,owner_name,Area,room_image,no_of_beds, room_rent,  available_beds) VALUES ( '$owner_id','$owner_name','$room_area','$fileName','$no_of_beds', '$room_rent', '$available_beds')";
    
    if(mysqli_query($conn, $query)){
        echo '<div class="alert alert-success">Room added successfully.</div>';
    } else{
        echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
    }
}
    
    mysqli_close($conn);
}
?>

<div class="container">
    <h2>Add Room for Rent</h2>
    <form method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="room_image">Room Image:</label>
            <input type="file" class="form-control-file" id="room_image" name="room_image" required>
        </div>
        <div class="form-group">
            <label for="area">Area:</label>
            <input type="text" class="form-control" id="area" name="area" required>
        </div>
        <div class="form-group">
            <label for="no_of_beds">Number of Beds:</label>
            <input type="number" class="form-control" id="no_of_beds" name="no_of_beds" required>
        </div>
        <div class="form-group">
            <label for="room_rent">Room Rent:</label>
            <input type="number" class="form-control" id="room_rent" name="room_rent" required>
        </div>
        <div class="form-group">
            <label for="available_beds">Available Beds:</label>
            <input type="number" class="form-control" id="available_beds" name="available_beds" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Room</button>
    </form>
</div>

</body>
</html>
