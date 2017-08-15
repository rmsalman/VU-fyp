<?php

if(isset($_POST['submit'])){    
    if($_POST['user'] !== "" && $_POST['pass'] !== ""){
        
      $user       = $_POST['user'];
      $password   = $_POST['pass'];
        
        $query = "select * from userdetails where name = '$user' and password = '$password' AND status = '1'";
        $run = mysqli_query($conn,$query);
        if(mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_array($run)){
               $id          = $row['user_id'];
               $name        = $row['name'];
               $full_name   = $row['full_name'];
               $usertype    = $row['usertype'];
            }

            if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
                 echo '<script> alert(" User created Successfully ")</script>';
            }else {
               $_SESSION["id"]          = $id;
               $_SESSION["name"]        = $name;
               $_SESSION["full_name"]   = $full_name;
               $_SESSION["usertype"]    = $usertype;
            }
        }
        else
        {            
           
                echo '<script> alert("Sorry User and pass did not match")</script>';
            
        }
    }
    else
    {
        echo '<script> alert("Sorry User AND Password fields are Required! ")</script>';
    }
}

?>


<?php

if(isset($_POST['submit2'])){    
    if($_POST['name'] !== "" && $_POST['emailid'] !== "" && $_POST['password'] !== "" && $_POST['full_name'] !== ""){        
            $name           = $_POST['name'];
            $password       = $_POST['password'];
            $emailid        = $_POST['emailid'];
            $full_name      = $_POST['full_name'];
            $contact      = '';
            $now = date("Y-m-d h:i:sa");
        
    $query = "INSERT INTO `userdetails`(`name`, `password`, `emailid`, `usertype`, `registerationdate`, `modifydate`, `full_name`, `contact`) VALUES ('$name','$password','$emailid',  '1', '$now', '$now', '$full_name', '$contact')";
        $run = mysqli_query($conn,$query);

        if($run){
            
            $query  = "select * from userdetails where name = '$name' and password = '$password'";
            $run    = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){
                while($rowz = mysqli_fetch_array($run)){
                   if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
                 echo '<script> alert(" User created Successfully ")</script>';
            }else {
                   $_SESSION["id"]          = $rowz['user_id'];
                   $_SESSION["name"]        = $rowz['name'];
                   $_SESSION["full_name"]   = $rowz['full_name'];
                   $_SESSION["usertype"]    = '1';
                 }
                   // echo '<script type="text/javascript"> window.location = "profile.php" </script>';
                }
            }else {
                echo '<script> alert("Sorry User and pass did not match")</script>';
            }
            
        }
        else
        {            
            if($run = "Duplicate entry 'stu' for key 'name'"){
                echo '<script> alert("Kindly try a defferent User Name ") </script>';
            }else {
                echo '<script> alert("Some thing went wrong") </script>';                
            }
        }
        
    }
    else
    {
        echo '<script> alert("Sorry All Fields are Required!") </script>';
    }
}
?>




<?php

if(isset($_POST['update'])){    
    if($_POST['name'] !== "" && $_POST['emailid'] !== "" && $_POST['password'] !== "" && $_POST['full_name'] !== ""){        
            $name           = $_POST['name'];
            $password       = $_POST['password'];
            $emailid        = $_POST['emailid'];
            $full_name      = $_POST['full_name'];
            $contact      = $_POST['contact'];
            $user_id      = $_POST['user_id'];
            $now = date("Y-m-d h:i:sa");
        
    $query = "UPDATE  `userdetails` 
    SET `name` = '$name' , 
    `password` = '$password', 
    `emailid` = '$emailid', 
    `usertype` = '1' , 
    `registerationdate` = '$now', 
    `modifydate` = '$now', 
    `full_name` = '$full_name', 
    `contact` =  '$contact'

     WHERE `userdetails`.`user_id` ='$user_id'";

// echo $query;
// exit;

        $run = mysqli_query($conn,$query);

        if($run){
            
            $query  = "select * from userdetails where name = '$name' and password = '$password'";
            $run    = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){
                while($rowz = mysqli_fetch_array($run)){
                   if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
                 echo '<script> alert(" User Updated Successfully ")</script>';
            }else {
                   $_SESSION["id"]          = $rowz['user_id'];
                   $_SESSION["name"]        = $rowz['name'];
                   $_SESSION["full_name"]   = $rowz['full_name'];
                   $_SESSION["usertype"]    = '1';
                 }
                   // echo '<script type="text/javascript"> window.location = "profile.php" </script>';
                }
            }else {
                echo '<script> alert("Sorry User and pass did not match")</script>';
            }
            
        }
        else
        {            
            if($run = "Duplicate entry 'stu' for key 'name'"){
                echo '<script> alert("Kindly try a defferent User Name ") </script>';
            }else {
                echo '<script> alert("Some thing went wrong") </script>';                
            }
        }
        
    }
    else
    {
        echo '<script> alert("Sorry All Fields are Required!") </script>';
    }
}
?>

    <!-- Header -->
      <header id="header" class="skel-layers-fixed">
        <h1>
          <a href="index.php">Brands <span>Pakistan</span></a>
        </h1>
        <nav id="nav">
          <ul>

            <li class=""><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
            <li class=""><a href="brands.php">Brands<span class="sr-only">(current)</span></a></li>
            <?php 
            if (isset($_SESSION["usertype"]) &&  $_SESSION["usertype"] == '0'){ 
            ?>
            <li class=""><a href="add_pro.php">Add Product<span class="sr-only">(current)</span></a></li>
            <li class=""><a href="add_brand.php">Add Brand<span class="sr-only">(current)</span></a></li>
            <?php
            }
            ?>

        <?php if(isset($_SESSION['id'])){?>
        <li class=""><a href="subscribed.php">Subscribed Brands</a></li>
        <?php } ?>
           
               <li class=""> 
        <?php
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            ?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            <a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
            <?php
            }else {
                    ?>
                    <a href="JavaScript:;" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-log-in"></span> Login </a>
                    <a href="JavaScript:;" data-toggle="modal" data-target="#myModa2">
                    <span class="glyphicon glyphicon-user"></span> Register</a>
            <?php
            }
            ?>

        </li>
          </ul>
        </nav>
      </header>

    <div class="modal fade" tabindex="-1" id="myModal" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Login</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" required="required" id="inputEmail3" placeholder="Enter the User Name" name="user" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="password" class="form-control" id="inputPassword3" required="required"  placeholder="Enter the Password" name="pass" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Sign in</button>
                  <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">&times; Close</button>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


 <div class="modal fade" tabindex="-1" id="myModa2" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Get Registered</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <div class="form-group">
                <label for="User" class="col-sm-3 control-label">User Name:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" required="required" id="User" placeholder="Enter the User Name" name="name" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2">@</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Full" class="col-sm-3 control-label">Full Name:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" id="Full" required="required"  placeholder="Enter the Full Name" name="full_name" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Email" class="col-sm-3 control-label">Email:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="email" class="form-control" id="Email" required="required"  placeholder="Enter the Email" name="emailid" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Full" class="col-sm-3 control-label">Password:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="password" class="form-control" id="Full" required="required"  placeholder="Enter the Password" name="password" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" name="submit2" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Sign Up</button>
                  <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">&times; Close</button>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->




