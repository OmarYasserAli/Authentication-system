<?php include_once 'resource/Database.php';
      include_once 'resource/session.php';
      include_once 'resource/utilities.php';




if(isset($_POST['submit'])){
  $form_errors = array();

  $required_fields = array("username" , "password");
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));



    if(empty($form_errors)){
        $username = $_POST['username'];
    $password = $_POST['password'];
    isset($_POST['remember'])? $remember = $_POST['remember']  : $remember = "";    
  try {
echo $remember;
  $sql= "select * from  users where username = :username ";
      $statement= $db->prepare($sql);
      $statement->execute(array(":username"=>$username  ));
      if ($user = $statement->fetch()) {
        $id=$user['id'];
        $username=$user['username'];
        $Hpassword=$user['password'];
        if(password_verify($password, $Hpassword)){
          $_SESSION['id']=$id;
          $_SESSION['username']=$username;
          if($remember == "yes"){
            rememberMe($id);
          }
          echo "
              <script type='text/javascript'>
                Swal.fire({
                type: 'success',
                title: 'Your logged in successfully',
                showConfirmButton: false,
                timer: 3000
              })

                setTimeout(function(){ 
                    window.location.href= 'index.php';
                 }, 2500);

              </script>
          ";


         // redirectTo('index');
        }else{
          $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' >  Invaled userneme or password   </p>";
        }
      }
      else{
          $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' >  Invaled userneme or password   </p>";
        }
    }catch (PDOException $e) {
  $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' >Login Failed : " .$e->getMessage()."   </p>";
}

   } else{
      $res = "<p>Please check errors </p>";
    }


}


?>


