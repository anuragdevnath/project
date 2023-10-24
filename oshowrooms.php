<?php include('nav.php'); ?>
  <script>
        $(document).ready(function() {
            $('body').on('click','#leave',function(){
                let appid=$(this).closest('table').find('tr:first-child #appid').text();
                let roomid=$(this).closest('table').find('tr:first-child #roomid').text();
                alert("Confirm Remove?");
          $.post("leave.php",{k0:appid,k1:roomid}, function(data){$("#p").html(data);});
        });});
    </script>
       
</head>
<body>
    <div id="p"></div>
<?php
if (isset($_SESSION['ownerid'])!=true) {
    echo "<script>window.location='slog.php';</script>";
}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show rooms</title>
</head>
<body>
    <?php 
    $cname= $_SESSION['ownername'];
    echo " <h1>Showing Rooms of $cname</h1><p><br><br><br><br></p>" ;
    echo "<table border=3><tr>";
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "demodb";
    $conn = mysqli_connect($host, $username, $password, $database);
    $ownerID = $_SESSION['ownerid'];
$query = "SELECT rooms.roomid, rooms.room_image,applications.application_id,applications.client_id
          FROM applications
          INNER JOIN rooms ON applications.roomid = rooms.roomid
          WHERE applications.owner_id = '$ownerID' AND applications.status = 1";

$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $roomID = $row['roomid'];
        $clientID = $row['client_id'];
        $roomImage = $row['room_image'];
        $appID=$row['application_id'];
echo "<table class='table table-dark'>
<thead>
  <tr>
  <th scope='col'>Client Name</th>
  <th scope='col'>Application ID</th>
    <th scope='col'>Room ID</th>
    <th scope='col'>Room Image</th>
    <th scope='col'>Leave Room</th>
</tr>
</thead>
<tbody>
  <tr>
  <td>$clientID</td>
  <td id='appid'>$appID</td>
    <td id='roomid'>$roomID</td>
<td><img src='images/$roomImage' height='200' width='250'></td>
<td><button class='btn btn-danger' id='leave'>Remove</button>
</td>
  </tr>";
}
echo "
</tbody>
</table>";
mysqli_close($conn);}
    ?>

</body>
</html>