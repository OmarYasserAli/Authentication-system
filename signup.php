

<?php 
$page_title = "Sign up";
include_once 'partials/header.php';
include_once 'partials/parsesignup.php';
?>

<h2>sign up </h2><hr>

<div>
<?php if (isset($res)) {
  echo $res;
} 

if(!empty($form_errors)) echo show_errors($form_errors);

?>
</div>
<div class="clearfix"> </div>
<div class="container">
  <section class="col col-lg-7">
<form method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" class="form-control" id="exampleInputusername" placeholder="Username" name="username">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
  </div>


  <button type="submit" class="btn btn-primary" name="submit">sign up</button>
</form>
  </section>
</div>
<?php include_once 'partials/footer.php'; ?>