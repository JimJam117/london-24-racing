<?php

include "includes/config.php";
include "includes/db.php";
include "includes/backend_header.php";

if(isset($_POST['addPost']))
{
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $body = mysqli_real_escape_string($db, $_POST['body']);
    $keywords = mysqli_real_escape_string($db, $_POST['keywords']);

    if(isset($_POST['id'])) {
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $query = "UPDATE posts SET body = '$body', keywords = '$keywords', title = '$title' WHERE id = '$id'";
        $db->query($query);
    }
    else {
        $d = date("Y-m-d H:i:s");
        $query = "INSERT INTO posts (date, body, keywords, title) VALUES ('$d', '$body', '$keywords', '$title')";
        $query_for_backup = "INSERT INTO posts_backup (date, body, keywords, title) VALUES ('$d', '$body', '$keywords', '$title')";
        $db->query($query_for_backup);
        $db->query($query);


    }


}

if(isset($_GET['post']))
{
    $id = mysqli_real_escape_string($db, $_GET['post']);
    $p = $db->query("SELECT * FROM posts WHERE id = '$id'");
    $p = $p->fetch_assoc();
}

$_SESSION['RF']['subfolder']="PHP";
?>


<div class="sidebar-clear"></div>
<div class="sidebar">
    <ul class="sidebar-list">

        <li><h2 class="list-header">Blog</h2></li>
        <li><hr></li>

        <li><a href="backend_index.php">Dashboard</a></li>
        <li class="active"><a href="#">Create Post</a></li>

        <li><br></li>

    </ul></div>



<div class="content">



        <h1 class="page-header">Create Post</h1>

        <div class="table">

            <form method="post">


                <?php if(isset($p))
                {
                    echo "<input type='hidden' value='$id' name='id'> ";

                }
                ?>

                <div class="form-group">
                    <h2 class="sub-header">Post Title</h2>
                    <input class="form-control" type="text" value="<?php echo @$p['title']?>" name="title"/>
                </div>


                <div class="form-group">
                    <h2 class="sub-header">Post Keywords</h2>
                    <input class="form-control" type="text" value="<?php echo @$p['keywords']?>" name="keywords"/>
                </div>


                <div class="form-group">
                    <h2 class="sub-header">Post Body</h2>
                    <textarea style="min-height: 400px" id="mytextarea" class="form-control" name="body"/><?php echo @$p['body']?></textarea>
                </div>


                <div class="form-group">
                    <button class="btn" name="addPost">Add Post</button>
                </div>


        </div>


</div>


</body>
</html>
