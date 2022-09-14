<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />

    </head>


    <body background="background.jpg" >

            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h1>Admin Dashboard</h1>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
               

                <div>
                    <a href="add-post.php" class="btn btn-primary btn-lg" role="button" style="display:flex;">Add Post</a>
                    <a href="add-category.php" class="btn btn-primary btn-lg" role="button" style="display:flex;">Add Category</a>
                    <a href="manage-posts.php" class="btn btn-primary btn-lg" role="button" style="display:flex;">Manage Posts</a>
                    <a href="manage-categories.php" class="btn btn-primary btn-lg" role="button" style="display:flex;">Manage Categories</a>
                

                </div> 

            </div>

        <script>
            var resizefunc = [];
        </script>
    </body>
</html>
<?php } ?>