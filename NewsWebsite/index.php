<?php 
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Website</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/news.css" rel="stylesheet" >
 </head>

  <body>

   <?php include('includes/header.php');?>

    <div class="container" style="padding-top:50px;">

      <div class="row" style="margin-top: 4%">

        <div class="col-md-8">
<ul class="cards">
<?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblcategory.id as cid,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate, tblposts.PostImgURL as img_url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId ORDER BY tblposts.id DESC LIMIT $offset, $no_of_records_per_page");

while ($row=mysqli_fetch_array($query)) {   
?>

  


  <li class="cards__item">
    <div class="card">
      <div><img src="<?php echo $row['img_url']?>"></div>
      <div class="card__content">
        <div class="card__title"><?php echo htmlentities($row['posttitle']);?></div>
        <p class="card__text"><a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> ||  Added on: <?php echo htmlentities($row['postingdate']);?></p>
        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
      </div>
    </div>
  </li>
  

<?php } ?>
       
</ul>
      

        </div>

      <?php include('includes/sidebar.php');?>
      </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 
</head>
  </body>

</html>
