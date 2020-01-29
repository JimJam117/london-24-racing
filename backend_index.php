<?php

include "includes/config.php";
include "includes/db.php";
include "includes/backend_header.php";

if(isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])){

    $entity = mysqli_real_escape_string($db, $_GET['entity']);
    $action = mysqli_real_escape_string($db, $_GET['action']);
    $id = mysqli_real_escape_string($db, $_GET['id']);

    if($action === "delete"){
        $query = "DELETE FROM posts WHERE id = '$id'";

    }else{

    }
    $db->query($query);
}



$query = "SELECT * FROM posts ORDER BY id DESC";
$posts = $db->query($query);

?>


<div class="sidebar-clear"></div>
<div class="sidebar">
<ul class="sidebar-list">

    <li><h2 class="list-header">Blog</h2></li>
    <li><hr></li>

    <li class="active"><a href="#">Dashboard</a></li>
    <li><a href="newpost.php">Create Post</a></li>

    <li><br></li>


</ul></div>



<div class="content">
    <h1 class="page-header">Dashboard</h1>
    <h2 class="sub-header">Posts</h2>
    <div class="table">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Date Posted</th>
                <th>Title</th>
                <th>Length</th>
                <th>Tags</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>

            <?php while($row = $posts->fetch_assoc()) {?>
            <tr>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo str_word_count($row['body']);?> words</td>
                <td style="max-width: 300px"><?php echo $row['keywords'];?></td>
                <td><a href="newpost.php?post=<?php echo $row['id'];?>" class="btn btn-warning">edit</a>
                    <a href="backend_index.php?entity=post&action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger">delete</a></td>

            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
