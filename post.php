<!-- database file include -->
<?php include 'includes/db.php'; ?>
<!-- header -->
  <?php include 'includes/header.php'; ?>
   
   <!-- navigation or menubar  -->
       <?php include 'includes/menubar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
             <?php 
             // add some function for see indivisual post 
             if (isset($_GET['p_id'])) {
                 $the_post_id = $_GET['p_id'];
             }
             // this code for get post content dynamically
                    $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
                    $select_all_posts_query = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author'];
                           $post_date = $row['post_date'];
                           $post_image = $row['post_image'];
                           $post_content = $row['post_content'];      
             ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               <?php  } ?>
                <!-- Blog Comments -->
                    <?php 
                        // work for submit comment
                       if (isset($_POST['create_comment'])) {
                            $the_post_id = $_GET['p_id'];
                           // $comment_post_id = $_POST['comment_post_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];
                        $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)
                       VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapprove',now()) ";
                       $insert_query = mysqli_query($connection,$query);
                          if (!$insert_query) {
                               die("Query Failed".mysqli_error());
                          }
                        }
                     ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Write Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                    // query for show comments in post page
                    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
                    $show_comment_query = mysqli_query($connection,$query);
                    if (!$show_comment_query) {
                          die("Query Failed".mysqli_error($connection));
                    }
                    // query for comments count dynamically in posts table
                    $query = "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id = $the_post_id";
                    $update_comment_count = mysqli_query($connection,$query);

                   while($row = mysqli_fetch_assoc($show_comment_query)){
                        $comment_author = $row['comment_author']; 
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                 ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>
                 <?php } ?>
            </div>

            <!-- sidebar -->
              <?php include 'includes/sidebar.php'; ?>
        </div>
        <!-- /.row -->

        <hr>

       <!-- footer section -->
       <?php include 'includes/footer.php'; ?>