<?php 
$page_title = "Profile";
include_once 'partials/header.php';
include_once 'partials/parseprofile.php';
?>





<div class="container">
	<h1>Profile </h1>
	<?php if(!isset($_SESSION['username'])) :?>
	<p> You need to log in to see your profile, <a href="login.php">Log in</a> or 
		<a href="signup.php">Sign up</a> </p>
  <section class="col col-lg-7">
  <?php else: ?>
  	 <section class="col col-lg-7">
     	<table class="table">
     		<tr> <th>username</th>     <th> <?php  echo $username?></th> </tr>
     		<tr> <th>email</th>     <th> <?php  echo $email?></th> </tr>
     		<tr> <th>Date joined</th>     <th > <?php  echo $jDate?></th> </tr>

     		<tr> <th></th> <th> <a class="pull-right" href='edit-profile.php?user_identify= <?php  echo $encoded_id ?> 
     		'> <span class="glyphicon glyphicon-edit"></span> Edit profile</a></th> </tr>
     	</table>
      
  </section>
  <?php endif ?>

      
  </section>
</div>
<?php include_once 'partials/footer.php'; ?>