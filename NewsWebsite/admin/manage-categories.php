<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if($_GET['action']=='parmdel' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  tblcategory  where id='$id'");
	$delmsg="Category deleted forever";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Manage Categories</title>
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
 
<?php if($delmsg){ ?>
<div class="alert alert-danger" role="alert">
<strong> <?php echo htmlentities($delmsg);?></strong>
</div>
<?php } ?>

</div>
</div>
  
                                    <div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">


												<div class="table-responsive" style="background:white">
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Category</th>
                                                                <th>Description</th>
                                                          
                                                                
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$query=mysqli_query($con,"Select id,CategoryName,Description from  tblcategory where Is_Active=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

<tr>
    <th scope="row"><?php echo htmlentities($cnt);?></th>
    <td><?php echo htmlentities($row['CategoryName']);?></td>
    <td><?php echo htmlentities($row['Description']);?></td>
    <td>
        <a href="edit-category.php?cid=<?php echo $row['id'];?>">Edit Category   |</a> 
        <a href="manage-categories.php?rid=<?php echo $row['id'];?>&&action=parmdel">   Delete Category</a>

    </td>
</tr>
<?php
$cnt++;
 } ?>
</tbody>
                                                  
                                                    </table>
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