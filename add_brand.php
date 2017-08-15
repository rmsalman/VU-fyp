
<?php 
include 'includes/connect.php'; 
include 'includes/header-full.php';

if(isset($_POST['submit1'])){    
    if($_POST['pro_title'] !== "" && $_POST['pro_des'] !== "" && $_FILES['image'] !== ""){

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
                echo '<script type="text/javascript"> window.location = "add_brand.php" </script>';
                exit;
          }
        
             $pro_title     = mysqli_real_escape_string($conn,$_POST['pro_title']);
             $pro_des       = mysqli_real_escape_string($conn,$_POST['pro_des']);

          $query_ins = "INSERT INTO `brands`
          (`brand_name`, `brand_description`, `image`, `created_at`, `updated_at`) 
          values ('$pro_title','$pro_des', '$file_name', now(), now())";
     

        if(mysqli_query($conn,$query_ins)){
                echo '<script> alert("Brand Added Successfully")</script>';
        }else{
                echo '<script> alert("Sorry Wrong information")</script>';
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
    Add Brand
</h1>

<form action="add_brand.php" method="post" class="form-horizontal" enctype = "multipart/form-data">  
  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">Title</label>
    <div class="col-sm-9">
        <input type="text" required="required" class="form-control" name="pro_title">
    </div>
  </div>
  <div class="form-group">
    <label for="Department" class="col-sm-3 control-label">Description</label>
    <div class="col-sm-9">
        <textarea required="required" class="form-control" name="pro_des" placeholder="Product Description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Image" class="col-sm-3 control-label">Brand Image <small>(.jpeg, .jpg, .png)</small></label>
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