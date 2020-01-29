<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 20/07/2017
 * Time: 17:13
 */

session_start();

include_once "includes/config.php";
include_once "includes/db.php";



if(isset($_POST['login'])) {





    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);



    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = $db->query($query);

    if($result->num_rows == 1) {


        $result = $result->fetch_assoc();
        $hash = $result['password'];

        $_SESSION['username'] = $username;

        if (password_verify($password, $hash)) {
            header('Location: backend_index.php');
            exit();
        } else {
            header("Location:login.php?err_msg=Invalid Password");
            exit();
        }

    }else{
        header("Location:login.php?err_msg=Invalid Username");
        exit();

    }

}

?>


<!doctype html>
<html lang="en" style="min-width: 100px">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/backend-styles.css">
    <title>Blog Login</title>
</head>
<body style="min-width: 100px">


<div class="parent">
    <form class="login" method="post">

        <img src="images/astra.jpg">

        <div style="text-align: center; color: ghostwhite;"><h2>Admin Login</h2></div>

        <?php

        if(isset($_GET['err_msg'])){

            echo "
            <div class='alert'>$_GET[err_msg]</div>
            ";
        }


        ?>


        <div class="form-group">
            <label class="sr-only" for="exampleInputName2">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputName2" placeholder="Username">
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
        </div>
        <br>
        <button name="login" type="submit" class="btn btn-default">Sign in</button>

</div>


</body>
</html>



