<?php include('nav.php'); ?>
</head>
<body>
<div class="fxnav">
<?php
if (isset($_SESSION['clientid'])!=true) {
    echo "<script>window.location='slog.php';</script>";
}
$cname= $_SESSION['clientname'];
echo " <h1>Showing Application Status for $cname</h1><p><br><br><br><br></p>" ;
echo "<table border=3><tr>";
$host = "localhost";
$username = "root";
$password = "";
$database = "demodb";
$client=$_SESSION['clientid'];
$clientname=$_SESSION['clientname'];
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from applications where client_id = '$client'";
$cur = mysqli_query($conn, $sql);
echo "<table class='table table-dark'>
<thead>
  <tr>
    <th scope='col'>Client Name</th>
    <th scope='col'>Owner ID</th>
    <th scope='col'>Room ID</th>
    <th scope='col'>Application status</th>
    
  </tr>
</thead><tbody>";
while ($row = mysqli_fetch_array($cur)) {
  if ($row[4]==1){
    $status='<span class="label label-success">Accepted</span>
    ';
  }
  else{
    $status='<span class="label label-warning">Pending</span>';
  }
    echo "

  <tr>
    <td>$clientname</td>
    <td>$row[2]</td>
    <td>$row[1]</td>
    <td>$status</td>
  </tr>";
}
echo "</tbody></table>";
?> 
</body>
</html>