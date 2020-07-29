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
      // work for searh
      if (isset($_POST['submit'])) {
      $search = $_POST['search'];
      // echo  $search;
      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
      // $query = "SELECT * FROM posts WHERE post_tags= '$search'";
      $search_query = mysqli_query($connection, $query);
      if(!$search_query){
      echo "QUERY FAILED".mysqli_error($connection);
      }
      $count = mysqli_num_rows($search_query);
      if ($count == 0) {
      echo "<h2>RESULT NOT FOUND</h2>";
      }else{
      // this code for get post content dynamically
      while ($row = mysqli_fetch_assoc($search_query)) {
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
      <?php  }
      }
      }
      ?>
      
    </div>
    <!-- sidebar -->
    <?php include 'includes/sidebar.php'; ?>
  </div>
  <!-- /.row -->
  <hr>
  <!-- footer section -->
  <?php include 'includes/footer.php'; ?>