<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$postdetails=$_POST['postdescription'];
$postimgurl=$_POST['img_url'];
$arr = explode(" ",$posttitle);
$status=1;
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostImgURL='$postimgurl',Is_Active='$status' where id='$postid'");
if($query)
{
$msg="Post updated ";
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
        <title>Edit Post</title>     
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
                                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                </div>
                                    <?php } ?>

                                        <?php if($error){ ?>
                                        <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                                        <?php } ?>


                                </div>
                        </div>

                        <?php
                            $postid=intval($_GET['pid']);
                            $query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostTitle as title,tblposts.PostImgURL as img,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
                            while($row=mysqli_fetch_array($query))
                            {
                        ?>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                        <form name="addpost" method="post">
                                    <div class="form-group m-b-20">
                                        <label>Post Title</label>
                                        <input type="text" class="form-control" id="posttitle" value="<?php echo $row['title'];?>" name="posttitle" placeholder="Enter title" required>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                        <option value="<?php echo $row['catid'];?>"><?php echo $row['category'];?></option>
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
                                    <label>Post Description</label>
                                    <input type="text" class="form-control" value="<?php echo htmlentities($row['PostDetails']);?>" name="postdescription" required>
                                </div>

                                <div class="form-group m-b-20">
                                    <label>Image URL</label>
                                    <input type="text" class="form-control" value="<?php echo htmlentities($row['PostImgURL']);?>" name="img_url" required>
                                </div>

                            <?php } ?>

                            <button type="submit" name="update" class="btn btn-success">Update </button>

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