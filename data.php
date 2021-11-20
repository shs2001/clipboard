<?php

    $host = "localhost";

    $user = "root";

    $pass = "";

    $database = "cliptable";

    $con = mysqli_connect($host,$user,$pass,$database);

if(isset($_POST['data'])){
    $data = mysqli_real_escape_string($con,$_POST['data']);
    $sql = mysqli_query($con,"UPDATE `cliptable` SET `data`='$data' WHERE id=1");
}

?>