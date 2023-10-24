<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Hostel Management system</title>
    <style>
    body{
      font-family: 'Poppins', sans-serif;
      line-height: 2.5; 
      background-color:#212529;
      color: white;
    }
    .fxnav{
      position: sticky;
      top:0;
    }
    #logout{
      position: fixed;
        right: 20px; 
    }
    .centered-text {        
        text-align: center;
        }
        .container {
      margin-top: 50px;
      text-align: center;
    }

    .content {
      margin-top: 30px;
    }
    
  </style>
  </head>

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


  <body  class="bg">
<div class="fxnav">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">Student Hive</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="main.php">Home</a>
      <?php 
      if (isset($_SESSION["ownerid"])) {
echo '<a class="nav-item nav-link" href="odash.php">Owner Dashboard</a>';
      }
      else if(isset($_SESSION["clientid"])) {
        echo '<a class="nav-item nav-link" href="sdash.php">Student Dashboard</a>';
      }
      
      ?>

      <div id='logout'>
   <?php
   if (isset($_SESSION["loggedIn"]) == true) {
       echo "<button type='button' class='btn btn-danger' id='logoutbtn'>Logout</button>";
   } else {
       echo "<button type='button' class='btn btn-info' id='loginbtn'>Login</button>";
   } ?>
      </div>
    </div>
  </div>
</nav>
</div>