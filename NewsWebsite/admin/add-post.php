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
            $posttitle=$_POST['posttitle'];
            $catid=$_POST['category'];
            $postdetails=$_POST['postdescription'];
            $postimgurl=$_POST['img_url'];
            $arr = explode(" ",$posttitle);
            $status=1;
            $query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,PostDetails,Is_Active,PostImgURL) values('$posttitle','$catid','$postdetails','$status','$postimgurl')");
            if($query)
            {
                $msg="Post successfully added ";
            }
            else{
                $error="Something went wrong . Please try again.";    
            } 

        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Add Post</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    </head>

    <body background="background.jpg">
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
                                    <?php echo htmlentities($error);?>
                                </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div>
                                            <form name="addpost" method="post">
                                                <div class="form-group m-b-20">
                                                    <label>Post Title</label>
                                                    <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                                                </div>
                                                    <div class="form-group m-b-20">
                                                        <label>Category</label>
                                                        <select class="form-control" name="category" id="category" required>
                                                            <option value="">Select Category </option>
                                                            <?php
                                                                $ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
                                                                while($result=mysqli_fetch_array($ret))
                                                                {    
                                                            ?>
                                                                <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                                                            <?php } ?>

                                                        </select> 
                                                    </div>
                                                <div class="form-group m-b-20">
                                                    <label>Post Details</label>
                                                    <input type="text" class="form-control" name="postdescription" placeholder="Enter description" required>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label>Post Image</label>
                                                    <input type="text" class="form-control" name="img_url" placeholder="Enter URL" >
                                                </div>


                                                <button type="submit" name="submit" class="btn btn-success">Save and Post</button>
                                                <button type="button" class="btn btn-danger">Discard</button>
                                            </form>
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