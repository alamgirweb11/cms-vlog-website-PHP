<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <!-- form start -->
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </form> <!-- form end  -->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                       <?php 
                       // for put cat data in category sidebar
                    $query = "SELECT * FROM categories";
                    $select_categories_sidebar = mysqli_query($connection,$query);
                ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                 <?php 
                       while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                           $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];
                           echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include 'widget.php'; ?>

            </div>