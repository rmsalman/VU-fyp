<?php 
include 'includes/connect.php'; 

if(isset($_SESSION['id']) && $_SESSION['usertype'] == '0' && isset($_GET['user_id']) && isset($_GET['user_status'])){
    
             $user_id        = $_GET['user_id'];
             $user_status    = $_GET['user_status'];


$query_ins = "UPDATE `userdetails` SET `status` = '$user_status', `modifydate` = now() WHERE `userdetails`.`user_id` = ".$user_id ;
     
        if(mysqli_query($conn,$query_ins)){
            if($_GET['user_status'] == '1'){
                echo '<script> alert("User Activated Successfully")</script>';
        }else{
                echo '<script> alert("User Deactivated Successfully")</script>';
        } }
    }



if(isset($_SESSION["usertype"])){
include 'includes/header-full.php'; 
    ?>

<?php 

if($_SESSION["usertype"] == '0'){
    $query  = "SELECT * FROM `userdetails`";
}
else
{
	$id = $_SESSION["id"];
 	$query  = "SELECT * FROM `userdetails` where `user_id` = '$id'";
}
            $run = mysqli_query($conn,$query);
            if(mysqli_num_rows($run) > 0){

?>
<div class="container">
<br><br><br>
<h1 class="text-center">
    Profile
</h1>
<div class="table-responsive">

<?php if($_SESSION["usertype"] == '0'){?>
<div class="text-right">
    <a href="profile-update.php?new" class="btn btn-primary">Create User</a>
    <br><br>
</div>
<?php }?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Registered At</th>
            <th>Updated At</th>
<?php if($_SESSION["usertype"] == '0'){?>
            <th>Status</th>
<?php }?>
 <th>Update Profile</th>

        
        </tr>
    </thead>
    <tbody>


<?php
    while($rowz = mysqli_fetch_array($run)){
?>
        <tr>
            <td><?= $rowz['user_id']; ?></td>
            <td><?= $rowz['name']; ?></td>
            <td><?= $rowz['full_name']; ?></td>
            <td><?= $rowz['emailid']; ?></td>
            <td><?= $rowz['contact']; ?></td>
            <td><?= $rowz['registerationdate']; ?></td>
            <td><?= $rowz['modifydate']; ?></td>
            


<?php 
if($_SESSION["usertype"] == '0'){
    if($rowz['status'] == '0'){
?>
          <td>  <a class="btn btn-success" href="profile.php?user_id=<?= $rowz['user_id']; ?>&user_status=1">
            Activate User
            </a></td>
<?php
}else {
?>
           <td> <a class="btn btn-danger" href="profile.php?user_id=<?= $rowz['user_id']; ?>&user_status=0">Deactivate User</a> </td>

<?php
}
}
?>
            </td>
            
            <td><a class="btn btn-primary" href="profile-update.php?id=<?= $rowz['user_id']; ?>">Update</a></td>
        </tr>


        <?php
      }
           

        ?>
    </tbody>
</table>
<?php  }else {
                echo '<h2>Sorry no data found</h2><a class="btn btn-primary" href="file.php">Clik to Add File Data</a>';
            }?>
</div>
<br><br>
</div>

<?php include 'includes/footer-full.php'; }else {
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
} ?>