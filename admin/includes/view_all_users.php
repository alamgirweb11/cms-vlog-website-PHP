 <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Firstname</th>                  
                  <th>Lastname</th>   
                  <th>Email</th>              
                  <th>Role</th> 
                  <th>Change to Admin</th>             
                  <th>Change to Subscriber</th>             
                </tr>
                </thead>
              <tbody>
                <?php 
                  // query for change_to_admin
                  if (isset($_GET['change_to_admin'])) {
                       $the_user_id = $_GET['change_to_admin'];
                       $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
                       $change_to_admin_query = mysqli_query($connection,$query);
                       header("Location:users.php");
                  }
                  // query for change to subscriber 
                  if (isset($_GET['change_to_sub'])) {
                       $the_user_id = $_GET['change_to_sub'];
                       $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id";
                       $change_to_sub_query = mysqli_query($connection,$query);
                       header("Location:users.php");
                  }
                  
                 // query for delete users
                  if (isset($_GET['delete'])) {
                       $the_user_id = $_GET['delete'];
                       $query = "DELETE FROM users WHERE user_id = $the_user_id";
                       $delete_query = mysqli_query($connection,$query);
                       header("Location:users.php");
                  }
                 ?>
                <?php 
                // show all data of users section in admin page
                 $query = "SELECT * FROM users";
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
                     echo "<tr>";                                                  
                      echo "<td>$user_id</td>";                   
                      echo "<td>$username</td>";                   
                      echo "<td>$user_firstname</td>";                   
                      echo "<td>$user_lastname</td>";                   
                      echo "<td>$user_email</td>";                   
                      echo "<td>$user_role</td>";                

         echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
         echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
         echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
         echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
         echo "</tr>";
                 }
            ?>
              </tbody>
          </table>