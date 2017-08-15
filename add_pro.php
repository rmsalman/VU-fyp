<?php 
include 'includes/connect.php'; 

include 'includes/header-full.php';

if(isset($_POST['submit1'])){    
    if($_POST['brands'] !== "" && $_POST['pro_title'] !== "" && $_POST['pro_des'] !== "" && $_POST['price'] !== "" && $_FILES['image'] !== ""){
        

          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          
          $expensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if(empty($errors)==true) {
             move_uploaded_file($file_tmp,"uploads/".$file_name);
          }else{
                echo '<script> alert("extension must be .jpeg, .jpg or .png!")</script>';
                echo '<script type="text/javascript"> window.location = "add_pro.php" </script>';
                exit;
          }



             $brands        = $_POST['brands'];
             $pro_title     = mysqli_real_escape_string($conn,$_POST['pro_title']);
             $pro_des       = mysqli_real_escape_string($conn,$_POST['pro_des']);
             $price         = $_POST['price'];
             $sale_price    = $_POST['sale_price'];

          $query_ins = "INSERT INTO products 
          (`pro_name`, `pro_description`, `pro_image`, `price`, `sale_price`,`pro_brand`) 
          values 
          ('$pro_title', '$pro_des', '$file_name', '$price', '$sale_price', '$brands')";
     
        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Product Added Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information '.mysqli_error($conn).'")</script>';
        }
    }
    else
    {
        echo '<script> alert("Kindly fill all the fields") </script>';
    }
}
?>

<div class="container">
<br><br>
<h1 class="text-center">
    Add Product
</h1>

<form action="add_pro.php" method="post" class="form-horizontal" enctype = "multipart/form-data">
  <div class="form-group">
    <label for="brands" class="col-sm-3 control-label">Brands</label>
    <div class="col-sm-9">
        <select name="brands" required="required" id="brands" class="form-control" >
            <option value="">Select Brand</option>
            <?php
                $query = "select * from brands";
                $run_q = mysqli_query($conn,$query) ;

                
                    while ($rowz = mysqli_fetch_array($run_q)) {
                      if($rowz['brand_name'] !== ''){
                    ?>

              <option value="<?= $rowz['id'] ?>"><?= $rowz['brand_name'] ?></option>
            <?php
                                }
                                }
                
            ?>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">Title</label>
    <div class="col-sm-9">
        <input type="text" required="required" class="form-control" placeholder="Title of product" name="pro_title">
    </div>
  </div>

  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
        <input type="number" min="0" required="required" class="form-control" name="price" placeholder="Price in RS. ">
    </div>
  </div>

  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">On Sale <small>(optional)</small></label>
    <div class="col-sm-9">
        <input type="number" min="0"  class="form-control" name="sale_price" placeholder="Sale Price in RS. ">
    </div>
  </div>

  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">Description</label>
    <div class="col-sm-9">
        <textarea required="required" class="form-control" name="pro_des" placeholder="Product Description"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="Image" class="col-sm-3 control-label">Product Image <small>(.jpeg, .jpg, .png)</small></label>
    <div class="col-sm-9">
      <input type="file" name="image" id="Image" required>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="submit1" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>

<?php include 'includes/footer-full.php'; 
?>