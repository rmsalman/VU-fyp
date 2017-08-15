<?php 
include 'includes/connect.php'; 
include 'includes/header-full.php';
?>
<style>
  article.box.post p {
    max-height: 107px;
    overflow: hidden;
    text-align: justify;
}
article.box.post h3 {
    height: 93px;
    overflow: hidden;
    text-align: left;
}
article .image.fit img {
    max-height: 130px;
}
</style>
<?php 
if(!isset($_GET['pro'])){
?>
    <!-- Banner -->
      <section id="banner">
        <div class="inner">
          <h2>Online Sales Information</h2>
          <p>Organization that keeps you informed for latest Sales.</p>
          <ul class="actions">
            <li><a href="about.php" class="button big scrolly">Learn More</a></li>
          </ul>
        </div>
      </section>

<?php 
}
?>

<?php

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

if(isset($_SESSION['id']) && isset($_GET['pro']) && $_POST['comment_id'] !== ""){
             $comment        = $_POST['comment_id'];
             $pro            = $_GET['pro'];
             $id             = $_SESSION['id'];

$query_ins  = "DELETE FROM `comments` WHERE `comments`.`comment_id` = ".$comment;
     
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
                echo '<script> alert("Commented Successfully")</script>';
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


<div id="main" class="wrapper style1">
<br>

  <div class="container">
  
  <header class="major">
    <h2 class="text-center"><?= $rowz['brand_name']; ?></h2>
    <p><?= $rowz['brand_description'];?></p>
  </header>
    <div class="">
    <div class="image fit">
      <center>  
          <img src="uploads/<?= $rowz['image']; ?>" alt="thumbnail_img" class="img-responsive thumbnail_img"> 
      </center>
    </div>
      <h3 class="">
        <?= $rowz['pro_name']; ?>         
      </h3>
      
      <p>
        <?= $rowz['pro_description']; ?>
      </p>

  <form action="index.php?pro=<?= $_GET['pro']?>" method="POST">
    <strong>Rating: </strong>
<?php 

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
?>
<input class=" form-control" style="display: inline-block; width: initial;" name="rating" type="number" max="10" value="<?= round($run_query_rating['rater']); ?>">
<button type="submit" name="rating_submit" value="Rate It"  class="btn btn-primary "  > Rate It</button>

<?php 
}else {
  
if($run_query_rating['rater']){
  ?>

    <span class="" style="display: inline-block; width: initial;" >
          <?= round($run_query_rating['rater']); ?>
    </span>
  <?php
}
else {
  ?>

<i><a href="JavaScript:;" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-log-in"></span> Login
</a> To Be the First to Rate this Product  </i>
  <?php
}

}
?>
    </form>

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

<div class="col-sm-1">  <?php 
if (isset($_SESSION["usertype"]) &&  $_SESSION["usertype"] == '0'){ ?>
    <form action="index.php?pro=<?= $_GET['pro']?>" method="POST">
      <input type="text" name="comment_id" value="<?= $rowz['comment_id']; ?>" style="display: none;">
      <input type="submit" name="submit_del" value="Delete" class="btn btn-danger">
    </form>
    <?php }?>
  </div>
</div>
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
  <br>
    <input type="submit" class="btn btn-primary pull-right" name="commnet_submit" value="Comment Now">
  </div>
  <div class="clearfix"></div>
</div>
</form>
<?php 
}else {
?>
<p class="text-center">
<a href="JavaScript:;" style="font-size: 30px" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-log-in"></span> Login For Comments
</a>
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

<section id="three" class="wrapper style1">
        <div class="container">
          <header class="major">
            <h2>Offers by Brands</h2>
            <p>You can Subscribe Brands to get latest sales offers.</p>
          </header>
<?php

  $query  = "SELECT p.*, p.id as p_id, b.*
FROM brands b 
LEFT OUTER JOIN products p on b.id = p.pro_brand 
where p.pro_status = '1'
ORDER BY `b`.`brand_name` 
ASC";

       
  $_SESSION['pro_brand'] = '';
  $run = mysqli_query($conn,$query);
  if(mysqli_num_rows($run) > 0){
    $c = 0;
      while($rowz = mysqli_fetch_array($run)){
$brand_name = $rowz['pro_brand'];
if($_SESSION['pro_brand'] !== $brand_name) {
  if($c > 0){
    echo '<div class="clearfix"></div></div>';
  }
  $c++;

?>


<h2><?= $rowz['brand_name'];?><?php $_SESSION['pro_brand'] = $brand_name; ?>
<?php 
if(isset($_SESSION['id'])){
?> 
<a href="subscribed.php?brand=<?= $rowz['id'] ?>" class="btn btn-primary">Subscribe</a>
<?php
}
?>
</h2>
<div class="row">
<?php
}
?>
  <div class="col-sm-3 ">
  <article class="box post">
    <div class=" text-center">
    <div class="image fit">
        <img src="uploads/<?= $rowz['pro_image']; ?>" alt="thumbnail_img" class="img-responsive thumbnail_img">
    </div>
      <h3>
        <?= $rowz['pro_name']; ?>
        <?php 
          if(!empty($rowz['sale_price'])){
            ?>
           <br> 
        <small><strong>SALE:</strong> <span style="text-decoration: line-through;"><?= $rowz['price']; ?>Rs.</span></small> 
        to  
        <small><?= $rowz['sale_price']; ?> Rs.</small>
            <?php
          }else{
            ?>
            <small><?= $rowz['price']; ?> Rs.</small>
            <?php
          }
         ?>
      </h3>
      <p>
        <?= $rowz['pro_description']; ?>
      </p>
      <a href="index.php?pro=<?= $rowz['p_id'] ?>" class="btn btn-primary">Read More</a>
      <?php 
      if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == '0') {
        ?>
    <form action="index.php" method="POST">
      <input type="text" name="pro_id" value="<?= $rowz['p_id']; ?>" style="display: none;">
      <button type="submit" name="pro_del" value="Delete" class="btn btn-danger">Delete</button>
    </form>
   <?php } ?>
    </div>
  </div>

<?php
      }
?>
</article>
</div>
<?php  
  }
  else
  {
  echo '<h2 class="align-center">Sorry no Sale found</h2>';
  }
  }
?>
</div>
</section>
      
 
 <?php 
    include 'includes/footer-full.php';
 ?>


        </body>
      </html>