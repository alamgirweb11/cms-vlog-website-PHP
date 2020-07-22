<?php 
  if (isset($_POST['create_user'])) {
  	  $user_id = $_POST['user_id'];
  	  $user_firstname = $_POST['user_firstname'];
  	  $user_lastname = $_POST['user_lastname'];
  	  $username = $_POST['username'];
  	  $user_email = $_POST['user_email'];  	  
  	  $user_password = $_POST['user_password'];
  	  $user_role = $_POST['user_role'];
  	  // for image field
/*  	  $post_image = $_FILES['image']['name'];
  	  $post_image_temp = $_FILES['image']['tmp_name'];
      move_uploaded_file($post_image_temp, '../images/$post_image');*/
      
      // query for insert data in users table
      $query = "INSERT INTO users (user_id,user_firstname,user_lastname,username,user_email,user_password,user_role) VALUES ('$user_id','$user_firstname','$user_lastname','$username','$user_email','$user_password','$user_role')";
      $create_user_query = mysqli_query($connection,$query);
      header("Location:users.php");

  }
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="title">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div> -->

	<div class="form-group">
		<label for="post_tags">Email</label>
		<input type="text" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="post_tags">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

      <div class="form-group">
      	<select name="user_role" id="">
      		<option value="subscriber">Select Options</option>
      		<option value="admin">Admin</option>
      		<option value="subscriber">Subcriber</option>
      	</select>
      </div>
	<div class="form-group">	
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>
</form>