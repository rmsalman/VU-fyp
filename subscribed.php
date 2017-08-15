<?php 
include 'includes/connect.php'; 
include 'includes/header-full.php';
?>

<style>
  .thumbnail p {
    max-height: 107px;
    overflow: hidden;
    text-align: justify;
}
.thumbnail h3 {
    height: 93px;
    overflow: hidden;
    text-align: left;
}
.thumbnail img {
    max-height: 130px;
}
</style>
<div class="container">

<?php



if(!isset($_SESSION['id'])){

    echo '<script> alert("Login First!")</script>';

    echo '<script type="text/javascript"> window.location = "index.php" </script>';

  }


if(isset($_POST['pro_del'])){

if(isset($_SESSION['id']) && $_POST['pro_id'] !== ""){
    
        
             $comment        = $_POST['pro_id'];
             $id             = $_SESSION['id'];


          $query_ins = "UPDATE `products` SET `pro_status` = '0' WHERE `products`.`id` =".$comment;
     
        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Product Deleted Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
        }
    }
    else
    {
        echo '<script> alert("Kindly fill all the fields") </script>';
    }
}
if(isset($_POST['submit_del'])){
          // echo '<pre>';
          // print_r($_GET);
          // exit;

if(isset($_SESSION['id']) && isset($_GET['pro']) && $_POST['comment_id'] !== ""){
    
        
             $comment        = $_POST['comment_id'];
             $pro            = $_GET['pro'];
             $id             = $_SESSION['id'];



          $query_ins = "UPDATE `comments` SET `status` = '0' WHERE `comments`.`comment_id` =".$comment;
     
        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Rating Added Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
        }
    }
    else
    {
        echo '<script> alert("Kindly fill all the fields") </script>';
    }
}






if(isset($_GET['brand'])){
          // echo '<pre>';
          // print_r($_GET);
          // exit;

if(isset($_SESSION['id']) && isset($_GET['brand'])){
    
        
             $brand        	 = $_GET['brand'];
             $id             = $_SESSION['id'];

          $subscribed = "select * from subscribed where sub_brand = '$brand' and sub_by = '$id'";

          $query_ins = "INSERT INTO subscribed (`sub_brand`, `sub_by`) values ('$brand','$id')";


          $subscribed_run = mysqli_query($conn,$subscribed);

     if(mysqli_num_rows($subscribed_run) > 0){

                echo '<script> alert("Brand Alreaded added in your account.")</script>';

       }else {
         if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Brand Added Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
        }
       }



    }
    else
    {
        echo '<script> alert("Sorry Some error occoured") </script>';
    }
}


if(isset($_GET['brand_unsub'])){
  

if(isset($_SESSION['id']) && isset($_GET['brand_unsub'])){
        
             $brand          = $_GET['brand_unsub'];
             $id             = $_SESSION['id'];

          $query_del = "DELETE FROM `subscribed` WHERE `sub_id` = '$brand'";

    if(mysqli_query($conn,$query_del)){
        echo '<script> alert("Brand Unsubscribed from your account.")</script>';
    }
    else
    {
        echo '<script> alert("Sorry Some error occoured") </script>';
    }
}
}




if(isset($_POST['rating_submit'])){
if(isset($_SESSION['id']) && isset($_GET['pro']) && $_POST['rating'] !== ""){
    
        
             $comment        = $_POST['rating'];
             $pro            = $_GET['pro'];
             $id             = $_SESSION['id'];



          $query_ins = "INSERT INTO rating (`rating_by`, `rating_to`,`rating`) values ('$id','$pro','$comment')";
     
        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Rating Added Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
        }
    }
    else
    {
        echo '<script> alert("Kindly fill all the fields") </script>';
    }
}


if(isset($_POST['commnet_submit'])){


if(isset($_SESSION['id']) && isset($_GET['pro']) && $_POST['comment'] !== ""){
    
        
             $comment        = $_POST['comment'];
             $pro            = $_GET['pro'];
             $id             = $_SESSION['id'];



          $query_ins = "INSERT INTO comments (`comment_by`, `comment_to`,`comment`) values ('$id','$pro','$comment')";
     
        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Comment Deleted Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
        }
    }
    else
    {
        echo '<script> alert("Kindly fill all the fields") </script>';
    }
}

if(isset($_GET['pro']) && !empty($_GET['pro']))
{
  $pro = $_GET['pro'];
$query  = "SELECT p.id as p_id, p.pro_name, p.pro_description, p.pro_brand , b.*, c.*, u.*
FROM products p 
LEFT OUTER JOIN brands b on b.id = p.pro_brand 
LEFT OUTER JOIN comments c on c.comment_to = p.id 
LEFT OUTER JOIN userdetails u on u.user_id = c.comment_by
where p.id = '$pro'";
$query_rating  = "SELECT AVG(`rating`) as rater FROM `rating` WHERE `rating_to` = '$pro'";



       $_SESSION['brand_name'] = '';



  $run_query_rating     = mysqli_query($conn,$query_rating);
  $run                  = mysqli_query($conn,$query);
  $runz                 = mysqli_query($conn,$query);
  if(mysqli_num_rows($run) > 0){
    $c = 0;

    $rowz = mysqli_fetch_array($run);
    $run_query_rating = mysqli_fetch_array($run_query_rating);
?>
<div class="row">

  <div class="col-sm-12">
<h1 class="text-center"><?= $rowz['brand_name']; ?></h1>
    <div class="thumbnail ">
  <form action="index.php?pro=<?= $_GET['pro']?>" method="POST">
      <h2 class="">
        <?= $rowz['pro_name']; ?> <small class="pull-right"><span style="display: inline-block;margin-top: 10px;margin-right: 10px;">Rating overall  </span>
<?php 

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
?>

<input type="submit" name="rating_submit" value="Rate It"  class="pull-right btn btn-primary "  > 
        <input class="pull-right form-control" style="display: inline-block; width: initial;" name="rating" type="number" max="10" value="<?= $run_query_rating['rater']; ?>">
<?php 
}else {
  ?>
    <span class="" style="display: inline-block; width: initial;" >
          <?= $run_query_rating['rater']; ?>
    </span>
  <?php
}
?>

</small>
        
      </h2>
      
    </form>
      <p>
        <?= $rowz['pro_description']; ?>
      </p>

      <br>

<hr>

<?php 
while ($rowz = mysqli_fetch_array($runz)) {

if(!empty($rowz['comment']) && $rowz['status'] !== '0'){

?>


<div class="row text-center">
  <div class="col-sm-4 text-right">
    <h4>
        <?= $rowz['full_name']; ?>  
    </h4>
  </div>
  <div class="col-sm-7 text-left">
    <pre><?= $rowz['comment']; ?></pre>
  </div>
  <div class="col-sm-1">
    <form action="index.php?pro=<?= $_GET['pro']?>" method="POST">
      <input type="text" name="comment_id" value="<?= $rowz['comment_id']; ?>" style="display: none;">
      <input type="submit" name="submit_del" value="Delete" class="btn btn-danger">
    </form>
  </div>
</div>

<?php
// echo '<pre>';
// print_r($rowz);
// echo '</pre>';
?>
<?php 
}
}

if(isset($_SESSION['id']) && isset($_SESSION['full_name']) && !empty($_SESSION['id'])){

?>
<br>
<form action="index.php?pro=<?= $_GET['pro']?>" method="POST">
  <div class="row text-center">
  <div class="col-sm-4">
    <h4>
        <?= $_SESSION['full_name']; ?>  
    </h4>
  </div>
  <div class="col-sm-8">
    <textarea required="required" class="form-control" name="comment" placeholder="Comment Here"></textarea>
  </div>
  <div class="clearfix"></div>
  <br>
  <div class="col-sm-12">
  <input type="submit" class="btn btn-primary pull-right" name="commnet_submit" value="Comment Now"></div>
  <div class="clearfix"></div>
  <br>
</div>
</form>
<?php 
}else {
?>
<p class="text-center">
<br>
<a href="JavaScript:;" style="font-size: 30px" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-log-in"></span> Login</a>
  <!-- <a href="#"></a> -->
</p>
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
}
else{

?>
<br>
<br>
<h1 class="text-center">
    New Offers by Subscribed Brands
</h1>
<?php

$query  = "SELECT products.*,  products.id as p_id, brands.*, subscribed.sub_id
   FROM `subscribed` 
   LEFT JOIN products on products.pro_brand = subscribed.sub_brand LEFT JOIN brands on brands.id = products.pro_brand 
   where products.pro_status = '1' AND `sub_by` = ". $_SESSION['id'];

       $_SESSION['brand_name'] = '';

  $run = mysqli_query($conn,$query);
if(mysqli_num_rows($run) > 0){
    $c = 0;
      while($rowz = mysqli_fetch_array($run)){
$brand_name = $rowz['brand_name'];
if($_SESSION['brand_name'] !== $brand_name) {
  if($c > 0){
    echo '</div>';
  }
  $c++;
?>

<h2><?= $_SESSION['brand_name'] = $brand_name; ?> <a href="subscribed.php?brand_unsub=<?= $rowz['sub_id']?>" class="btn btn-primary">Unsubscribe</a></h2>
<div class="row">
<?php
}
?>

  <div class="col-sm-3">
    <div class="thumbnail text-center">
    <div class="image fit">
        <img src="uploads/<?= $rowz['pro_image']; ?>" alt="thumbnail_img" class="img-responsive thumbnail_img">
    </div>
      <h3>
        <?= $rowz['pro_name']; ?>
      </h3>
      <p>
        <?= $rowz['pro_description']; ?>
      </p>
      <a href="index.php?pro=<?= $rowz['p_id'] ?>" class="btn btn-primary">Read More</a>
      <?php 
      if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == '0') {
        ?>
      <br>
      <br>
    <form action="index.php" method="POST">
      <input type="text" name="pro_id" value="<?= $rowz['p_id']; ?>" style="display: none;">
      <button type="submit" name="pro_del" value="Delete" class="btn btn-danger">Delete</button>
    </form>
   <?php } ?>
      <br>    <br>
    </div>
  </div>

<?php
      }
?>

</div>
<?php  
  }
  else
  {
  echo '<h2 class="align-center" >You have not subscribed any Brand yet! or get Logged In</h2>';
  }
  }
?>

</div>
<?php 

include 'includes/footer-full.php';
 ?>
          
        </body>
      </html>

