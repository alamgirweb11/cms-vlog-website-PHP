<?php 
     if (isset($_GET['u_id'])) {
     	$the_user_id = $_GET['u_id'];    	
     }
       // query for show specific id 
      $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users = mysqli_query($connection,$query);
                 while ($row = mysqli_fetch_assoc($select_users)) {
                     $user_id = $row['user_id'];
                     $username = $row['username'];
                     $user_firstname = $row['user_firstname'];
                     $user_lastname = $row['user_lastname'];
                     $user_email = $row['user_email'];
                     $user_password = $row['user_password'];
                     $user_image = $row['user_image'];
                     $user_role = $row['user_role'];
       }

       // function for submit update user
      if (isset($_POST['update_user'])) {
  	   $user_id = $_POST['user_id'];
      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $username = $_POST['username'];
      $user_email = $_POST['user_email'];     
      $user_password = $_POST['user_password'];
      $user_role = $_POST['user_role'];
  	  // for image field
  	  /*$post_image = $_FILES['image']['name'];
  	  $post_image_temp = $_FILES['image']['tmp_name'];
      move_uploaded_file($post_image_temp, '../images/$post_image');
       // query for image section
        if (empty($post_image)) {
        	$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        	$select_image = mysqli_query($connection,$query);
        	while ($row = mysqli_fetch_array($select_image)) {
        		    $post_image = $row['post_image'];
        	}
        }*/
      
      $query = "UPDATE  users SET user_firstname = '{$user_firstname}' ,user_lastname = '{$user_lastname}' ,username = '{$username}' ,user_email = '{$user_email}',user_password = '{$user_password}' ,user_role = '{$user_role}' WHERE user_id = '{$the_user_id}'";
      $update_user_query = mysqli_query($connection,$query);
      if($update_user_query){
      	   header("Location:users.php");
      } else{
      	die("query failed".mysqli_error($connection));
      }

  }
 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_lastname">
  </div>

  <div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" value="<?php echo $username ?>" name="username">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->

  <div class="form-group">
    <label for="post_tags">Email</label>
    <input type="text" class="form-control" value="<?php echo $user_email ?>" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" class="form-control" value="<?php echo $user_password ?>" name="user_password">
  </div>

    <div class="form-group">
    <label for="user_role">User Role</label>
        <select name="user_role" id="">
          <option value="subscriber"><?php echo $user_role; ?></option>
          <?php 
             if ($user_role == 'admin') {
                echo "<option value='subscriber'>Subcriber</option>";
             }else{
                   echo "<option value='admin'>Admin</option>";
             }
           ?>       
        </select>
      </div>

  <div class="form-group">  
    <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">
  </div>
</form>