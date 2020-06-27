<?php ob_start(); ?>
<?php include 'functions/cat_functions.php'; ?>
<?php include 'includes/admin_header.php'; ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'includes/admin_menubar.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Dashboard
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                          <?php 
                          // insert categories 
                           insert_categories();
                           ?> 
                           <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add Categories</label>
                              <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div> 
                           <?php
                           // update categories
                           if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                           include "includes/update_categories.php";
                         }
                             ?>  
                        </div> <!-- form div end -->
                        <div class="col-xs-6">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Cat Title</th>
                                <th>Delete</th>
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            // find all categories or show categories
                            show_categories();
                      ?>
                      <?php 
                      // delete query 
                        delete_categories();
                       ?>                                       
                            </tbody>
                          </table>
                        </div>
                   </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper --> 
   <?php include 'includes/admin_footer.php'; ?>
