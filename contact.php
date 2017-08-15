<?php  
include 'includes/connect.php';
include 'includes/header-full.php';
?>
<center>
<?php
if(isset($_POST['send'])){
$to = "bc120401366@vu.edu.pk";
$subject = "From WebPortal by".$_POST['name'];
$txt = $_POST['message'];
$headers = "From: webmaster@webPortal.com" . "\r\n" .
"CC: ".$_POST['email'];

if(mail($to,$subject,$txt,$headers)){
	echo 'Email Genrated Successfully';
}else {
	echo 'Sorry an error Occoured';
}
}

?>

</center>


<br>
<br>
<div class="container">

	<h1 class="text-center">Contact Us</h1>

<section>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u(3)">
												<input type="text" name="name" id="name" value="" placeholder="Name">
											</div>
											<div class="6u 12u(3)">
												<input type="email" name="email" id="email" value="" placeholder="Email">
											</div>
										</div>
										<div class="row uniform">
											<div class="12u">
												<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
											</div>
										</div>
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" name="send" value="Send Message"></li>
													<li><input type="reset" value="Reset" class="alt"></li>
												</ul>
											</div>
										</div>
									</form>
								</section>



<br><br>

 
 <?php 
    include 'includes/footer-full.php';
 ?>

 </body>
 </html>