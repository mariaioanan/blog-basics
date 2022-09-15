<?php
include "connect.php";

if (isset($_POST['submit'])) {
  $user_name = $_POST['user_name'];
  $description = $_POST['description'];

  $sql = "insert into`posts` (user_name, description) values('$user_name','$description')";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die(mysqli_error($con));
  }
}
$sql = "select id, title,description from`posts`";
$all_posts = mysqli_query($con, $sql);

$sql_comments = "select user_name, created_at, comment, email,posts_id,parent_comment_id from`comments`";
$post_comments = mysqli_query($con, $sql_comments);

$row_posts = mysqli_fetch_all($all_posts, MYSQLI_ASSOC);
$row_comments = mysqli_fetch_all($post_comments, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>posts</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" </head>

<body>
  <div class="all posts">
    <?php
    if (mysqli_num_rows($all_posts) > 0) {

      foreach ($row_posts as $row_post) {
        $id = $row_post["id"];
        $title = $row_post["title"];
        $description = $row_post["description"];
        ?>
        <div style="display:flex">
        <?php
        echo "id: " . $id . " - title: " . $title . " - description: " . $description;
        echo "<button class='btn btn-primary'><a href='comment.php?post_id=".$id. 
"' class='text-light'>add comment</a></button>";
        echo '
        <button class="btn btn-primary"><a href="view.php?viewpost_id=' . $id . '" class="text-light">view</a></button>
        <form method="POST" action="delete.php?id='.$id.'"> 
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        ', "<br>";
        ?>
        </div>
        <?php
        if (mysqli_num_rows($post_comments) > 0) {

          foreach ($row_comments as $row_comment) {
            $posts_id = $row_comment["posts_id"];
            if ($id == $posts_id) {
              $user_name = $row_comment["user_name"];
              $created_at = $row_comment["created_at"];
              $comment = $row_comment["comment"];
              $email = $row_comment["email"];
              $posts_id = $row_comment["posts_id"];
              //$parent_comment_id=$row_comment['parent_comment_id'];

              echo "user_name: " . $user_name .
                " - created_at: " . $created_at .
                " - comment: " .   $comment .
                " - email: " . $email .
                " - posts_id: " . $posts_id .
                //"-parent_comment_id: ". $parent_comment_id .
                
                "<br>";
            }
          }
        } else {
          echo "0 results";
        }


      }
    } else {
      echo "0 results";
    }

    ?>


  </div>
</body>

</body>

</html>

