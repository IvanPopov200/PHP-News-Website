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
            $catid=intval($_GET['cid']);
            $category=$_POST['category'];
            $description=$_POST['description'];
            $query=mysqli_query($con,"Update  tblcategory set CategoryName='$category',Description='$description' where id='$catid'");
            if($query)
            {
                $msg="Category Updated successfully ";
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
							    <div class="col-xs-12">
								    <div class="page-title-box">
                                        <h4 class="page-title">Edit Category</h4>
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>
                                            <li>
                                                <a href="#">Category </a>
                                            </li>
                                            <li class="active">
                                                Edit Category
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
							    </div>
						    </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Edit Category </b></h4>
                                        <hr />

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

<?php 
$catid=intval($_GET['cid']);
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1 and id='$catid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>



                        			<div class="row">
                        				<div class="col-md-6">
                        					<form class="form-horizontal" name="category" method="post">
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Category</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="<?php echo htmlentities($row['CategoryName']);?>" name="category" required>
	                                                </div>
	                                            </div>
	                                     
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Category Description</label>
	                                                <div class="col-md-10">
 <textarea class="form-control" rows="5" name="description" required><?php echo htmlentities($row['Description']);?></textarea>
	                                                </div>
	                                            </div>
<?php } ?>
        <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Update
                                                </button>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>


                        			




           
                       


                                </div>
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