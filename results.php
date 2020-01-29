<?php
include ("includes/config.php");
include ("includes/db.php");

$title = "Search Results";

include("includes/header.php");

$results = "";

if(isset($_GET['search'])) {
    $results = "Search Results for " . $_GET['search'];

    $keyword = mysqli_real_escape_string($db, $_GET['search']);
    $query = "SELECT * FROM posts WHERE keywords LIKE '%$keyword%'";
    $posts = $db->query($query);

}



?>


    <h2 class="searchOutput"><?php echo htmlspecialchars($results, ENT_QUOTES, 'UTF-8');?></h2>


<?php

if(!$posts->num_rows > 0) {

    echo "
    
    
           
                <div class='noResults-banner'>
                <h4 class=\"noResults\">No results found <i class='fa  fa-frown-o'></i></h4>
                <br>
                <a href=\"blog.php\" class=\"read-more\"><i class=\"fa fa-long-arrow-left\" aria-hidden=\"true\"></i>
            Go back to Main Page</a></div>
            
                
          
            <br>
            <br>
    
    ";
}


if($posts->num_rows > 0) {
    while($row = $posts->fetch_assoc()) {

        ?>


        <div class="blog-post">
            <p class="date">Posted on <?php echo $row['date']?></p>
            <h2 class="post-title">
                <a href="post.php?post=<?php echo $row['id']?>" style="text-decoration: none;">
                    <?php echo $row['title']?>
                </a>
            </h2>
            <hr>
            <div class="content">
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
    <?php } ?>
    <div style='padding-bottom: 50%;'></div>
<?php } ?>



