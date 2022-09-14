<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if($_GET['action']='del')
{
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set Is_Active=0 where id='$postid'");
if($query)
{
$msg="Post deleted ";
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
        <title>Manage Posts</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />

    </head>


    <body background="background.jpg" >
s
        <div id="wrapper">


           <?php include('includes/leftsidebar.php');?>


            <div class="content-page">
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                         

                                    <div class="table-responsive" style="background:white;">
<table class="table m-0 table-colored-bordered table-bordered-primary">
<thead>
<tr>
                                           
<th>Title</th>
<th>Category</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1 ");
$rowcount=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['title']);?></b></td>
<td><?php echo htmlentities($row['category'])?></td>
<td>
    <a href="edit-post.php?pid=<?php echo $row['postid'];?>">Edit Post   |</a> 
    <a href="manage-posts.php?pid=<?php echo $row['postid'];?>&&action=del">   Delete Post</a> </td>
 </tr>
<?php } }?>
                                               
                                            </tbody>
                                        </table>
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
