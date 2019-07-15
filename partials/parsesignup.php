<?php include_once "resource/Database.php";
      include_once "resource/utilities.php";

  if (isset($_POST['submit'])) {

    $form_errors=array();


    $required_fields = array("username" , "password", "email");
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length=array('username'=>4 , 'email'=>6 ,'password' =>6);
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

   $username = $_POST['username'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $H_password=password_hash($password, PASSWORD_DEFAULT);


if(!empty($form_errors)){
  $res="<p style= 'padding :20px; color:red; border:1px solid gray;'> Please check errors <br>";
}

else if(checkDublicationEntry("users" , "username" ,$username , $db)){
    $res =  flashMessage(" username already exists" , "Fail");

}
else if(checkDublicationEntry("users" , "email" ,$email , $db)){
    $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' > email already exists   </p>";

}

    
else if(empty($form_errors)){

   

  try {
  $sql= "INSERT into users (username , email , password , join_date) 
            values (:username , :email , :password , now())";
      $statement= $db->prepare($sql);
      $statement->execute(array(":username"=>$username  , ":email" =>$email , ":password"=>$H_password));
      if ($statement) {
       $res =  "<p style= 'padding :20px; color:green;' border:1px solid gray;>regestration Succesful   </p>";
      }
} catch (PDOException $e) {
  $res =  "<p style= 'padding :20px; color:red; border:1px solid gray;' >regestration Failed : " .$e->getMessage()."   </p>";
}
  
}
  
  }
?>