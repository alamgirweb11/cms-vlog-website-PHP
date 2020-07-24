<?php include 'db.php'; 
session_start();
if (isset($_POST['login'])) {
	 $user_email = $_POST['email']; 
	 $user_password = $_POST['password'];
	 // protect data from sql injection
	 $user_email = mysqli_real_escape_string($connection,$user_email);
	 $user_password = mysqli_real_escape_string($connection,$user_password);

	 // fetch data from database
	 $query = "SELECT * FROM users WHERE user_email = '{$user_email}'";
	 $select_user_query = mysqli_query($connection,$query);
	 if (!$select_user_query) {
	 	   die("connection failed".mysqli_error($connection));
	 }
	 while ($row = mysqli_fetch_array($select_user_query)) {
                     $db_username = $row['username'];
                     $db_user_firstname = $row['user_firstname'];
                     $db_user_lastname = $row['user_lastname'];
                     $db_user_email = $row['user_email'];
                     $db_user_password = $row['user_password'];
                     $db_user_image = $row['user_image'];
                     $db_user_role = $row['user_role'];	 	  
	 }
	 if ($user_email == $db_user_email && $user_password == $db_user_password) {
	 	        $_SESSION['username'] = $db_username;
	 	        $_SESSION['user_firstname'] = $db_user_firstname;	 	    
	 	        $_SESSION['user_lastname'] = $db_user_lastname;	 	    
	 	        $_SESSION['user_email'] = $db_user_email;	 	    	 	    
	 	        $_SESSION['user_role'] = $db_user_role;	 	    	 	    
	 	        header("Location:../admin");
	 }else{
	 	    header("Location:../index.php");
	 }

}
