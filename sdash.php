<?php include('nav.php'); ?>
</head>
<body>
<?php
if (isset($_SESSION['clientid'])!=true) {
    echo "<script>window.location='slog.php';</script>";
}
?>
  <div class="container">
    <h1>Welcome to the students Dashboard</h1>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <button class="btn btn-primary btn-block" onclick="location.href='showrooms.php'">Your Rooms</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4 offset-md-4">
        <button class="btn btn-primary btn-block" onclick="location.href='sapp.php'">Your Applications</button>
      </div>
    </div>
    
</div>
</body>
</html>
