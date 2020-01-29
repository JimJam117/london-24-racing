<?php
include ("includes/config.php");
include ("includes/db.php");

if(isset($_GET['post'])){

    $post = mysqli_real_escape_string($db, $_GET['post']);
    $p = $db->query("SELECT * FROM posts WHERE id='$post'");

    $p1 = $p->fetch_assoc();

    $title = $p1['title'];

}

include("includes/header.php");


if(isset($_GET['post'])){
    $id = mysqli_real_escape_string($db, $_GET['post']);
    $query ="SELECT * FROM posts WHERE id='$id'";

}


$posts = $db->query($query);
if($posts->num_rows > 0) {
while($row = $posts->fetch_assoc()) {
$title = $row['title'];

?>




<div class="blog-post">
    <p class="date">Posted on <?php echo $row['date']?></p>
    <h2 class="post-title"><?php echo $row['title']?></h2>
    <hr>

    <?php
    $string = $row['body'];
    echo $string;?>

    <hr>
    <div class="button-container">
        <button onclick="location.href='blog.php';" class="read-more">Go Back</button>
    </div>
</div>

    <div style='padding-bottom: 5%;'></div>

<?php }} ?>

<script>
    $(".blog-post img").addClass("image");
    $(".blog-post video").addClass("image");
    $(".blog-post iframe").addClass("image");
</script>

</body>
</html>
