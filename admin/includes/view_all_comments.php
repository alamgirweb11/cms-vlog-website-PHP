 <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Comment_post_id</th>
                  <th>Author</th>
                  <th>Email</th>
                  <th>Comment</th>
                  <th>In response to</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Approve</th>
                  <th>Unapprove</th>
                  <th>Delete</th>
                </tr>
                </thead>
              <tbody>
                <?php 
                  // query for approve post 
                  if (isset($_GET['approve'])) {
                       $the_comment_id = $_GET['approve'];
                       $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
                       $approve_query = mysqli_query($connection,$query);
                       header("Location:comments.php");
                  }
                  // query for unapprove post 
                  if (isset($_GET['unapprove'])) {
                       $the_comment_id = $_GET['unapprove'];
                       $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
                       $unapprove_query = mysqli_query($connection,$query);
                       header("Location:comments.php");
                  }
                  
                 // query for delete 
                  if (isset($_GET['delete'])) {
                       $the_comment_id = $_GET['delete'];
                       $query = "DELETE FROM comments WHERE comment_id = $the_comment_id";
                       $delete_query = mysqli_query($connection,$query);
                       header("Location:comments.php");
                  }
                 ?>
                <?php 
                // show all data of comments section in admin page
                 $query = "SELECT * FROM comments";
                 $select_comments = mysqli_query($connection,$query);
                 while ($row = mysqli_fetch_assoc($select_comments)) {
                     $comment_id = $row['comment_id'];
                     $comment_post_id = $row['comment_post_id'];
                     $comment_author = $row['comment_author']; 
                     $comment_email = $row['comment_email'];  
                     $comment_content = $row['comment_content'];
                     $comment_date = $row['comment_date'];
                     $comment_status = $row['comment_status']; 
                     
                     echo "<tr>";                                                  
                      echo "<td>$comment_id</td>";
                      echo "<td>$comment_post_id</td>";
                      echo "<td>$comment_author</td>";
                      echo "<td>$comment_email</td>";
                      echo "<td>$comment_content</td>";
            //fetch title coloum from posts table
          $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
          $select_post_id = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($select_post_id)) {
                   $post_id = $row['post_id'];
                   $post_title = $row['post_title'];
                   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
          }   
         echo "<td>$comment_date</td>";
         echo "<td>$comment_status</td>"; 
         echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
         echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
         echo "<td><a href='comments.php?delete=$comment_id '>Delete</a></td>";
         echo "</tr>";
                 }
            ?>
              </tbody>
          </table>