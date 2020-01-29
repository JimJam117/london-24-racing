<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 04/08/2017
 * Time: 09:08
 */
?>

<html lang="en">
<head>

    <!--META TAGS-->
    <meta charset="UTF-8">
    <meta name="description" content="London Powerboat Race Team">
    <meta name="keywords" content="Powerboat, London, Astra, 24, Racing">
    <meta name="author" content="Astra London, James Sparrow">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--LINKS AND TITLE-->
    <title><?php echo $title;?></title>
    <link rel="shortcut icon" type="image/x-icon" href="24.ico" />
    <link rel="stylesheet" href="css/blog-styles.css">
    <link rel="stylesheet" href="css/animate.css">

    <!--SCRIPTS-->
    <script src="https://use.fontawesome.com/1c9721711e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body class="bkimg">

<!--Top Bar-->

<div class="topBar">
    <span class="title2">LONDON 24 RACING</span>

    <div class="animated slideInDown text-bar">
        <span class="title">LONDON 24 RACING</span>
        <a href="index.html" class="top-link">Home</a>
        <a href="blog.php" class="top-link">Blog</a>


    </div>
    <div class="center-form">
        <form method="get" action="results.php" class="search">
            <button type="submit" class="searchButton"><i class="fa fa-search" aria-hidden="true"></i></button>
            <input type="text" name="search" class="searchInput" id="exampleInputName2" placeholder="Search...">
        </form>
    </div>

</div>

<div class="clear"></div>
