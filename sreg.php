<?php include('nav.php'); ?>
    <?php
    if(isset($_POST['username'])){
        $name=$_POST['username'];
        $id=$_POST['userid'];
        $pass=$_POST['password'];
        $cfpass=$_POST['cfpassword'];
        if($pass!=$cfpass){
            echo '<div class="alert alert-danger">Passwords do not match!</div>';
        }else if($pass==$cfpass){
    
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'demodb';
        $conn = mysqli_connect($host, $username, $password, $database);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="insert into clients values('$name','$id','$cfpass')";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success">Registration successfull</div>';
        } else{
            echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
        }
           }
    ?>
</head>
<body>
<div class="container">
    <h2 class="centered-text">New Client Registeration</h2>
    <form method="post" action="" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="userid">Userid:</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="password" name="cfpassword" required>
        </div>
        <div class="centered-text"><button type="submit" class="btn btn-primary">Register</button> <p> <br>  Already have an account ? <a href='slog.php'>click here to login</a></p></div>
    </form>
</div>

</body>
</html>
