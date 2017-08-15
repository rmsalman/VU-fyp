<style>
  .thumbnail_div img {
    max-height: 130px;
    width: 100%;
}

</style>

<?php 
include 'includes/connect.php'; 
include 'includes/header-full.php';
?>

<div class="container">
<br><br>
<h1 class="text-center">
     Brands
</h1>
<div class="row">
<?php
  $query  = "SELECT * FROM brands";
  $_SESSION['brand_name'] = '';
  $run = mysqli_query($conn,$query);
  if(mysqli_num_rows($run) > 0){
    while($rowz = mysqli_fetch_array($run)){

?>

  <div class="col-sm-3">
    <div class="thumbnail text-center">
    <div class="thumbnail_div">
        <img src="uploads/<?= $rowz['image']; ?>" alt="thumbnail_img" class="img-responsive thumbnail_img">
    </div>
      <h3>
        <?= $rowz['brand_name']; ?>
      </h3>
      <p>
        <?= $rowz['brand_description']; ?>
      </p>
      <br>    
    </div>
  </div>

<?php
      }
?>

</div>
</div> 
<?php  
  }
  else
  {
  echo '<h2>Sorry no data found</h2>';
  }
  
?>
</div>

 <?php 
    include 'includes/footer-full.php';
 ?>

        </body>
      </html>