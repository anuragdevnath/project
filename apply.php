    <?php
        include('nav.php');
    ?>
<script>
       $(document).ready(function() {
        $('body').on('click','#applybtn',function(){
          let rid=$(this).closest('table').find('tr:first-child #rid').text();
          let owner_id=$(this).closest('table').find('tr:first-child #oid').text();
          let client_id=$(this).closest('table').find('tr:first-child #cid').text();
          let flag=0;
          $.post("sendreq.php",{rid:rid,owner_id:owner_id,client_id:client_id,flag:flag}, function(data){
                    $(".show").html(data);});
        });
       });
    </script>
</head>
<body>
<?php
    $rid = $_GET['rid'];
if (isset($_SESSION['clientid'])!=true) {
    echo "<script>window.location='slog.php';</script>";
}
$name=$_SESSION['clientname'];
$cid=$_SESSION['clientid'];
echo "<table border=3><tr>";
$host = "localhost";
$username = "root";
$password = "";
$database = "demodb";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from rooms where roomid=$rid";
$cur = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($cur)) {
    echo "<div class='centered-text'><h1>Confirm your order $name</h1></div><p><br></p><table class='table table-dark'>
<thead>
  <tr>
    <th scope='col'>Room Image</th>
    <th scope='col'>Owner id</th>
    <th scope='col'>Client id</th>
    <th scope='col'>room id</th>
    <th scope='col'>Rent</th>
    
  </tr>
</thead>
<tbody>
  <tr>
    <td rowspan=2><img src='images/$row[2]' height='200' width='250'></td>
    <td rowspan=2 id='oid'>$row[0]</td>
    <td rowspan=2 id='cid'>$cid</td>
    <td rowspan=2 id='rid'>$row[6]</td>
    <td>$row[4]</td>
  </tr>
  <tr>
    <td id='apply'>
    <button type='button' class='btn btn-secondary' id='applybtn'>Apply Now</button>
    </td> 
  </tr></tbody>
  </table>";
}


    ?>
    <br><br><br>
<p class="show"></p>
</body>
</html>
