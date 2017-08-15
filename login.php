<?php

include 'includes/connect.php'; 
if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] == '1'){
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}elseif(isset($_SESSION["usertype"]) &&  $_SESSION["usertype"] == '0'){
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}

?>

<?php
if(isset($_POST['submit'])){    
    if($_POST['user'] !== "" && $_POST['pass'] !== ""){
        
        $user       = $_POST['user'];
	    $password   = $_POST['pass'];
        
        $query = "select * from userdetails where name = '$user' and password = '$password'";
        $run = mysqli_query($conn,$query);
        if(mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_array($run)){
               $id          = $row['user_id'];
               $name        = $row['name'];
               $full_name   = $row['full_name'];
               if($row['usertype'] == '1'){
                    $_SESSION["usertype"]    = $row['usertype'];
                     echo '<script type="text/javascript"> window.location = "files.php" </script>';
               }
            }
               $_SESSION["id"]          = $id;
               $_SESSION["name"]        = $name;
               $_SESSION["full_name"]   = $full_name;
                
                if($row['usertype'] == '1'){
                    $_SESSION["usertype"]    = $row['usertype'];
                     echo '<script type="text/javascript"> window.location = "files.php" </script>';
                }
        }
        else
        {            
            $query  = "select * from admin where name = '$user' and password = '$password'";
            $run    = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){
                while($rowz = mysqli_fetch_array($run)){
                   $_SESSION["id"]          = $rowz['id'];
                   $_SESSION["name"]        = $rowz['name'];
                   $_SESSION["usertype"]    = '0';
                   echo '<script type="text/javascript"> window.location = "files.php" </script>';
                }
            }else {
                echo '<script> alert("Sorry User and pass did not match")</script>';
            }
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
    if($_POST['name'] !== "" && $_POST['emailid'] !== "" && $_POST['password'] !== "" && $_POST['access'] !== "" && $_POST['full_name'] !== "" && $_POST['access'] == 'VU-Test-Phase'){
        
            $name           = $_POST['name'];
            $password       = $_POST['password'];
            $emailid        = $_POST['emailid'];
            $access         = $_POST['access'];
            $full_name      = $_POST['full_name'];
            $now = date("Y-m-d h:i:sa");
        
        $query = "INSERT INTO `userdetails`(`name`, `password`, `emailid`, `usertype`, `registerationdate`, `modifydate`, `full_name`) VALUES ('$name','$password','$emailid',  '1', '$now', '$now', '$full_name')";
        $run = mysqli_query($conn,$query);

        if($run){
            
            $query  = "select * from userdetails where name = '$name' and password = '$password'";
            $run    = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){
                while($rowz = mysqli_fetch_array($run)){
                   $_SESSION["id"]          = $rowz['user_id'];
                   $_SESSION["name"]        = $rowz['name'];
                   $_SESSION["full_name"]   = $rowz['full_name'];
                   $_SESSION["usertype"]    = '1';
                   echo '<script type="text/javascript"> window.location = "files.php" </script>';
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
        echo '<script> alert("Sorry All Fields are Required! and Use Right Access Code") </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>615 Project Phase 2 BC120401366</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
      <br>
      <br>
      <br>
      <div class="jumbotron">
        <h1 class="text-center">Collage Education File System</h1>
        <h4 class="text-center">Here is your VU ID </h4>
        
        <div class="text-center" style="font-size: 30px;">
          <a href="JavaScript:;" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
          <a href="JavaScript:;" data-toggle="modal" data-target="#myModa2"><span class="glyphicon glyphicon-user"></span> Register</a>
        </div>
      </div>
      
      
    </div>
    
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
                  <label for="Access" class="col-sm-3 control-label">Access Code:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" id="Access" required="required"  placeholder="Enter the Password" name="access" aria-describedby="sizing-addon2">
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

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
             <script src="assets/js/jquery.min.js"></script>
          <!-- Latest compiled and minified JavaScript -->
          <script src="assets/js/bootstrap.min.js"></script>
          
          
        </body>
      </html>