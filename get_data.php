<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 05/08/2017
 * Time: 05:58
 */
include ("includes/config.php");
include ("includes/db.php");


if(isset($_GET['offset']) && $_GET['limit']){

    $limit =$_GET['limit'];
    $offset =$_GET['offset'];


    $data = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");

    while($row = mysqli_fetch_array($data)){?>

        <div class="animated slideInUp blog-post">

            <!--  Date  -->
            <p class="date">Posted on: <?php echo $row['date']?></p>

            <!--  Title  -->
            <h2 class="post-title">
                <a href="post.php?post=<?php echo $row['id']?>"
                   style="text-decoration: none;">
                    <?php echo $row['title']?>
                </a>
            </h2>

            <hr>

            <div class="content">
            <!--short Post body -->
            <?php
            $string = $row['body'];
            $output = substr(strip_tags($string), 0, strpos(strip_tags($string), ' ', 1199)). "...";
            echo "<em>" . $output . "</em>"; ?>
            </div>

            <hr>


            <div class="button-container">
                <button onclick="location.href='post.php?post=<?php echo $row['id']?>';" class="read-more">Read More</button>
            </div>

        </div>





<?php }
}
;
?>