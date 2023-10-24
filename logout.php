<?php
session_start();
session_destroy();
echo "<script>window.location='main.php'</script>";
?>