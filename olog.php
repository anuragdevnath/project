
    <?php
    session_start();
    session_destroy();
    include('nav.php');
    ?>


    </style>

    <?php 
if(isset($_POST['username'])){
    $name=$_POST['username'];
    $pass=$_POST['password'];


        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'demodb';
        $conn = mysqli_connect($host, $username, $password, $database);
        $sql="select * from owners where id='$name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row[2]==$pass){
            $message = "Welcome ".$row[0];
            echo "<script>alert('$message');</script>";
            session_start();
            $_SESSION['ownername'] = $row[0];
            $_SESSION['ownerid'] = $row[1];
            $_SESSION['loggedIn']= 'owner';
            echo "<script>window.location='main.php';</script>";
        }else{
            echo '<div class="alert alert-danger">Invalid Credentials!</div>';


        }
       }


    ?>

<body>
</head>

<div class="container">
    <h2 class="centered-text">Owner Login</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">User ID:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="centered-text"><button type="submit" class="btn btn-primary">Login</button> <p> <br>  Don't have an account ? <a href='oreg.php'>click here to create one</a></p></div>
    </form>
</div>

</body>

</html>
