<?php 
include 'includes/connect.php'; 
include 'includes/header-full.php';
?>



<div class="container">

<br>
<br>
<br>

<h1 class="text-center">Update Profile</h1>

<?php 
$user_id = $name = $full_name = $emailid = $contact = $registerationdate = $modifydate = "";
if (isset($_GET["id"])) {
  # code...
  $id = $_GET["id"];
  $query  = "SELECT * FROM `userdetails` where `user_id` = '$id'";

            $run = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){
while($rowz = mysqli_fetch_array($run)){
           $user_id          =   $rowz['user_id'];
           $name             =  $rowz['name'];
           $full_name        =   $rowz['full_name'];
           $emailid          =   $rowz['emailid'];
           $contact          =   $rowz['contact'];
           $registerationdate =   $rowz['registerationdate'];
           $modifydate       =  $rowz['modifydate'];
            }
            }

}
?>

<form class="form-horizontal" method="post">
              <div class="form-group">
                <label for="User" class="col-sm-3 control-label">User Name:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" required="required" id="User" placeholder="Enter the User Name" name="name" aria-describedby="sizing-addon2" value="<?= $name; ?>">
                    <span class="input-group-addon" id="sizing-addon2">@</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Full" class="col-sm-3 control-label">Full Name:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" id="Full" required="required" placeholder="Enter the Full Name" name="full_name" aria-describedby="sizing-addon2" value="<?= $full_name; ?>">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Email" class="col-sm-3 control-label">Email:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="email" class="form-control" id="Email" required="required" placeholder="Enter the Email" name="emailid" aria-describedby="sizing-addon2" value="<?= $emailid; ?>">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Contact:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="number" class="form-control" id="contact" required="required" placeholder="Enter the Contact Number" name="contact" aria-describedby="sizing-addon2" value="<?= $contact; ?>">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Full" class="col-sm-3 control-label">Password:</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="password" class="form-control" id="Full" required="required" placeholder="Enter the Password" name="password" aria-describedby="sizing-addon2" value="<?= $name; ?>">
                    <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                  </div>
                </div>
              </div>


<?php 
if (isset($_GET["id"])) { 
?>

<input type="text" style="display: none;" value="<?= $_GET["id"]; ?>" name="user_id">

<?php
}
?>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                 <button type="submit" name="<?php if(isset($_GET['id']) && !empty($_GET['id'])){ echo 'update';}else{ echo 'submit2';} ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?php if(isset($_GET['id']) && !empty($_GET['id'])){ echo 'Update';}else {echo 'Sign Up';}?></button>
                 <?php 
if (isset($_GET["id"])) { }else {
?>
                  <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                  <?php
}
?>
                </div>
              </div>
            </form>

</div>

<?php 
include 'includes/footer-full.php';
?>


         </body>
      </html>
