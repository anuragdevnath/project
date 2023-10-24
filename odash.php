<?php include('nav.php'); ?>
</head>
<body>
<?php
if (isset($_SESSION['ownername'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
?>
  <div class="container">
    <h1>Welcome to the Owner Dashboard</h1>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <button class="btn btn-primary btn-block" onclick="location.href='addroom.php'">Add Room</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4 offset-md-4">
        <button class="btn btn-primary btn-block" onclick="location.href='ownerapp.php'">Applications</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4 offset-md-4">
        <button class="btn btn-primary btn-block" onclick="location.href='oshowrooms.php'">Manage Rooms</button>
      </div>
    </div>
    <div class="content">
      <h2>Your Rooms</h2>
      <?php
echo '<table border=1 class="table table-dark">';
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'demodb';
$conn = mysqli_connect($host, $username, $password, $database);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
$oid=$_SESSION['ownerid'];
$sql = "SELECT * from rooms where owner_id ='$oid'";
$cur = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($cur))
{
echo "
<thead>
  <tr>
    <th scope='col'>Room Image</th>
    <th scope='col'>Available rooms</th>
    <th scope='col'>Rent</th>
    <th scope='col'>Edit</th>
    <th scope='col'>Delete room</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><img src='images/$row[2]' height='200' width='250'></td>
    <td>$row[5]</td>
    <td>$row[4]</td>
    <td><a href='addphotos.php?roomid=$row[6]'><button type='button' class='btn btn-success'>Edit Photos</button></a></td>
    <td><a href='removeroom.php?id=$row[6]'><button type='button' class='btn btn-danger'>Remove Room</button></a></td>
   
  </tr>";
}
echo"
</tbody>
</table>";

?>
    </div>
  </div>
</body>
</html>
