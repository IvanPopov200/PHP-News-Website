<?php 
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  </head>

  <body>

   <?php include('includes/header.php');?>

    <div class="container" style="padding-top: 50px;">


     
      <div class="row" style="margin-top: 4%">

        <div class="col-md-12">

<?php
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblcategory.id as cid,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate, tblposts.PostImgURL as img_url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.id='$pid'"); 
while ($row=mysqli_fetch_array($query)) {
?>

            <div class="card-body">
              <h2 class="card-title" style="padding-bottom:15px;"><?php echo htmlentities($row['posttitle']);?></h2>
              <hr>
              <div><img src="<?php echo $row['img_url']?>" style="object-fit:contain; max-width:100%;"></div>
              <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> | 
              Posted on <?php echo htmlentities($row['postingdate']);?>
              <hr>
              <p class="card-text"><?php 
              $pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>            
            </div>
         
          
<?php } ?>
       

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
