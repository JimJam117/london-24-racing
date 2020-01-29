<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 04/08/2017
 * Time: 10:08
 */

session_start();

if(!isset($_SESSION['username'])){

    header("Location:login.php?err_msg=You need to log in to see this!");
    exit();

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/backend-styles.css">
    <title>Blog Backend</title>
    <!-- Latest compiled and minified CSS -->
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="js\tinymce\tinymce.min.js"></script>
    <script src="js\global.js"></script>



</head>
<body>

<div class="topBar">

    <span class="title">Blog Content Management System</span>

    <a class="logout" href="logout.php">Logout</a>

</div>

<div class="topBar-clear"></div>