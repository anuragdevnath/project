<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Booking</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    .sticky-div {
      float: left;
    font-family: 'Poppins', sans-serif;  
    text-align: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #212529;
    color: #fff;
    padding: 20px;
    z-index: 999;
  }
    body {
      background-color: #212529;
      color: #fff;
    }
    .header{
        display: flex;
      justify-content: center;
      align-items: center; 
    }
    .carousel-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 100vh;
    }
    .carousel-caption {
      text-align: center;
      justify-content: center;
      text-shadow: 2px 2px 5px #000000;
      top:40%;
    }
    .btn-success {
      background-color: #28a745;
      color: #fff;
      border-color: #28a745;
    }
    .main{
      height: 100%;
      width:70%;
    }
    .main2{
      height:100%;
      width:30%;
      float:left;
    }
  </style>
</head>

<body>
 
<div class="sticky-div">
  <h1>Welcome to Student Hive</h1>
The best hostel service available for students. <br>
  <br><a href="main.php"><button id='contbtn' type="button" class="btn btn-light">Continue</button></a>

</div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-container">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://images.pexels.com/photos/14676726/pexels-photo-14676726.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 1">
          <div class="carousel-caption">
            <h2>Find Your Perfect Student Accommodation</h2>
            <p>Discover Comfortable and Affordable Hostels Tailored for Students. </p>

          </div>
        </div>
        <div class="carousel-item">
          <img src="https://images.pexels.com/photos/2029719/pexels-photo-2029719.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 2">
          <div class="carousel-caption">
            <h2>Explore a Wide Range of Hostels</h2>
            <p>Connect with Like-Minded Students, Participate in Events, and Create Lasting Memories.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://images.pexels.com/photos/8082562/pexels-photo-8082562.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 3">
          <div class="carousel-caption">
            <h2>Experience a Vibrant Student Community</h2>
            <p>Enjoy Modern Facilities, High-Speed Internet, Study Areas, and Recreation Spaces.</p>
            <a href="main.php" class="btn btn-success">Continue</a>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
