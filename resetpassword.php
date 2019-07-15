<?php include_once 'resource/Database.php';
      include_once 'resource/session.php';
      include_once 'resource/utilities.php';
if(isset($_POST['submit'])){
  $form_errors = array();

    $required_fields = array("email" , "password" ,"confirmpassword");
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length=array('password'=>6 , 'confirmpassword'=>6 );
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

    if(empty($form_errors)){

    
    $email =$_POST['email'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirmpassword'];

    if($password1 != $password2){
      $res = "<p style= 'padding :20px; color:red; border:1px solid gray;'>New password does not match the confirmation   </p>";
    }else{
      try {
          $sql= "select email from  users where email = :email ";
          $statement= $db->prepare($sql);
          $statement->execute(array(":email"=>$email  ));

          if($statement->rowCount() ==1){
            $Hpassword= password_hash($password1 , PASSWORD_DEFAULT);

            $sql= "update    users set password= :password where email = :email ";
            $statement= $db->prepare($sql);
            $statement->execute(array(":password" => $Hpassword,":email"=>$email  ));

             $res = "<p style= 'padding :20px; color:green; border:1px solid gray;'>password reset   </p>";
          }else{
            
            $res = "<p style='padding :20px; color:red; border:1px solid gray;'>This Email doesn't exist </p>";
          }
        
      } catch (PDOException $e) {
         $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' >reset Failed : " .$e->getMessage()."   </p>";

      }
    }


  }else{
    $res = "<p>Please check errors </p> <br>"; 
  }

}


?>



<?php 
$page_title = "Sign up";
include_once 'partials/header.php';
?>
<h2>Reset Passsword </h2><hr>

<?php   if(isset($res))  echo $res;?>
<?php  if(!empty( $form_errors))  echo show_errors($form_errors);?>


<div class="container">
  <section class="col col-lg-7">
<form method='POST' action=''>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="confirmpassword">
  </div>
  <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
</form>

  </section>
</div>
<?php include_once 'partials/footer.php'; ?>