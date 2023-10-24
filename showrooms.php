<?php include('nav.php'); ?> 
 <script>
        $(document).ready(function() {
            $('body').on('click','#leave',function(){
                let appid=$(this).closest('table').find('tr:first-child #appid').text();
                let roomid=$(this).closest('table').find('tr:first-child #roomid').text();

          alert(appid+roomid);
          $.post("leave.php",{k0:appid,k1:roomid}, function(data){$("#p").html(data);});
        });});
    </script>
       <script>
        $(document).ready(function() {
          $('body').on('click','#logoutbtn',function(){
            window.location.href = "logout.php";
  });
  $('body').on('click','#loginbtn',function(){
            window.location.href = "logchoice.php";
  });
 });
    </script>
</head>
<body>
    <div id="p"></div>
<?php
if (isset($_SESSION['clientid'])!=true) {
    echo "<script>window.location='slog.php';</script>";
}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show rooms</title>
</head>
<body>
    <?php 
    $cname= $_SESSION['clientname'];
    echo " <h1>Showing Rooms of $cname</h1><p><br><br><br><br></p>" ;
    echo "<table border=3><tr>";
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "demodb";
    $conn = mysqli_connect($host, $username, $password, $database);
    $clientID = $_SESSION['clientid'];
$query = "SELECT rooms.roomid, rooms.room_image,applications.application_id
          FROM applications
          INNER JOIN rooms ON applications.roomid = rooms.roomid
          WHERE applications.client_id = '$clientID' AND applications.status = 1";

$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $roomID = $row['roomid'];
        $roomImage = $row['room_image'];
        $appID=$row['application_id'];
echo "<table class='table table-dark'>
<thead>
  <tr>
  <th scope='col'>application ID</th>
    <th scope='col'>Room ID</th>
    <th scope='col'>Room Image</th>
    <th scope='col'>Leave Room</th>
</tr>
</thead>
<tbody>
  <tr>
  <td id='appid'>$appID</td>
    <td id='roomid'>$roomID</td>
<td><img src='images/$roomImage' height='200' width='250'></td>
<td><button class='btn btn-danger' id='leave'>Leave</button>
</td>
  </tr>";
}
echo "
</tbody>
</table>";
// Close the database connection
mysqli_close($conn);}
    ?>

</body>
</html>