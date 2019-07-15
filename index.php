<?php 
$page_title = "Authentication system - Homepage";
include_once 'partials/header.php';
?>

  <div class="container">

  	
<h2>User Authentication System </h2><hr>





		<?php  if(!isset($_SESSION['username'])): ?>
		<p class="lead"> you are not sing in <a href="login.php">log in</a>  or create account <a href="signup.php"> sign up</a></p>
	<?php else: ?>
<p class="lead"> welcome <?php echo($_SESSION['username']) ;?> <a href="logout.php">log out</a></p>

<?php endif?>
</div>

<?php include_once 'partials/footer.php'; ?>