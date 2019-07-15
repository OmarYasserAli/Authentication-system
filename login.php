


<?php 
$page_title = "Log in";
include_once 'partials/header.php';
include_once 'partials/parselogin.php';
?>

<h2>Log in </h2><hr>

<div>
<?php if(isset($res)) echo $res;
if(!empty($form_errors)) echo show_errors($form_errors);
?>
</div>
<div class="clearfix"> </div>
<div class="container">
  <section class="col col-lg-7">
      <form method='POST' action=''>
        <div class="form-group">
          <label for="exampleInputEmail1">username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" value="yes">
          <label class="form-check-label" for="exampleCheck1">Remember me </label>
        </div>
        <a href="resetpassword.php">forget password</a>
        <button type="submit" class="btn btn-light pull-right" name='submit'>sign in</button>

      </form>
      
  </section>
</div>
<?php include_once 'partials/footer.php'; ?>