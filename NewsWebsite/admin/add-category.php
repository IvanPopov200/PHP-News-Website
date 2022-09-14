<?php
    session_start();
    include('includes/config.php');
    error_reporting(0);
    if(strlen($_SESSION['login'])==0)
    { 
        header('location:index.php');
    }
    else{

        if(isset($_POST['submit']))
        {
            $category=$_POST['category'];
            $description=$_POST['description'];
            $status=1;
            $query=mysqli_query($con,"insert into tblcategory(CategoryName,Description,Is_Active) values('$category','$description','$status')");
            if($query)
            {
                $msg="Category created ";
            }
            else{
                $error="Something went wrong . Please try again.";    
            } 
        }


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Category</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    </head>


    <body background="background.jpg" >
        <div id="wrapper">
            <?php include('includes/leftsidebar.php');?>
                <div class="content-page">
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">  
                                    <?php if($msg){ ?>
                                    <div class="alert alert-success" role="alert">
                                    <?php echo htmlentities($msg);?>
                                    </div>
                                    <?php } ?>
                                    <?php if($error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo htmlentities($error);?></div>
                                    <?php } ?>
                                </div>
                            </div>

                        	<div class="row">
                        		<div class="col-md-6">
                        			<form name="category" method="post">   
                                        <div class="form-group m-b-20">
                                            <label>Category Title</label>
                                            <input type="text" class="form-control" name="category" placeholder="Enter title" required>
                                        </div>
	                                     
                                        <div class="form-group m-b-20">
                                            <label>Category Details</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter description" required>
                                        </div>  
                                        <button type="submit" class="btn btn-success" name="submit">Submit</button>                                         
	                                </form>
                        				</div>
                        	</div>
                        </div>
                    </div>
                </div>
        </div>

        <script>
            var resizefunc = [];
        </script>
    </body>
</html>
<?php } ?>