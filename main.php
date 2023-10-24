<?php
include('nav.php');
?>

<style>
.search-bar {
  width: 20%;
}

.srch {
  border-radius: 50%;
}
</style>

<div class="search-bar">
  <div class="input-group mb-3 srch">
    <input type="text" class="form-control" id="searchInput" placeholder="Search By Area" aria-label="Search By Area" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-success" type="button" id="searchBtn">Search</button>
    </div>
  </div>
</div>

<?php
echo "<table border=3><tr>";

$host = "localhost";
$username = "root";
$password = "";
$database = "demodb";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];
  $sql = "SELECT * FROM rooms WHERE area LIKE '%$searchTerm%'";
} else {
  $sql = "SELECT * FROM rooms";
}

$cur = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($cur)) {
  echo "<table class='table table-dark'>
<thead>
  <tr>
    <th scope='col'>Room Image</th>
    <th scope='col'>Area</th>
    <th scope='col'>Owner Name</th>
    <th scope='col'>Available rooms</th>
    <th scope='col' style='display: none;'>ID</th>
    <th scope='col'>Rent</th>
    <th scope='col'>Options</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td rowspan=2><img src='images/$row[2]' height='200' width='250'></td>
    <td rowspan=2>$row[7]</td>
    <td rowspan=2>$row[1]</td>
    <td rowspan=2>$row[5]</td>
    <td rowspan=2 id='rid' style='display: none;'>$row[6]</td>
    <td rowspan=2>$row[4]</td>
    <td><a href='viewphotos.php?id=$row[6]'><button type='button' class='btn btn-light'>View Photos</button></a></td>
  </tr>
  <tr>
    <td id='apply'>
    <button type='button' class='btn btn-secondary' id='applybtn'>Apply Now</button>
    </td>
  </tr>";
}
echo "
</tbody>
</table>";
?>

<script>
$(document).ready(function() {
  $('#searchBtn').on('click', function() {
    var searchTerm = $('#searchInput').val();
    window.location.href = 'main.php?search=' + searchTerm;
  });

  $('body').on('click', '#applybtn', function() {
    let rid = $(this).closest('table').find('tr:first-child #rid').text();

    var applytxt = "<a href='apply.php?rid=" + rid + "'><button type='button' class='btn btn-secondary' id='confirm'>Confirm apply?</button></a>";
    $(this).closest('tr').find('#apply').html(applytxt);
  });
});
</script>

</body>
</html>
