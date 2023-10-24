<?php include('nav.php'); ?>
</head>
<body>
<?php

if (isset($_SESSION['ownerid'])!=true) {
    echo "<script>window.location='olog.php';</script>";
}
echo "<table border=3><tr>";
$host = "localhost";
$username = "root";
$password = "";
$database = "demodb";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$owner=$_SESSION['ownerid'];
$sql = "SELECT * from applications where owner_id = '$owner' and status='0'";
$cur = mysqli_query($conn, $sql);
echo "<p><h1>These are pending Applications <h1></p><table class='table table-dark'><thead>
<tr>
  <th scope='col'>Application Id</th>
  <th scope='col'>Student Name</th>
  <th scope='col'>Room no.</th>
  <th scope='col' id='acceptbtn'>Accept Button</th>
  <th scope='col'id='rejectbtn'>Reject Button</th>
  
</tr>
</thead>";
while ($row = mysqli_fetch_array($cur)) {
    echo "
<tr><td id='appid'>$row[0]</td><td>$row[3]</td><td id='rid'>$row[1]</td><td><a href='accept.php?appid=$row[0]&roomid=$row[1]'><button type='button' class='btn btn-success' id='accept'>Accept</button></a></td><td><button type='button' class='btn btn-danger' id='reject'>Reject</button>
</td></tr>
    ";
}
echo "
</table>";
?>    

<br><br>
<p id='p'>
</p>
</body>
</html>