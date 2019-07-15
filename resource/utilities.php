<?php 



function check_empty_fields($required_fields_array){

	$form_errors= array();
	foreach ($required_fields_array as  $field) {
		if(!isset($_POST[$field])  || $_POST[$field] == NULL){
			$form_errors[] = $field . " is required";
		}
	}

	return $form_errors;
}



/*
this Function need assoc array  (field => min_len)
*/
function check_min_length($fields_to_check){

	$form_errors=array();
	foreach ($fields_to_check as $field => $min_len) {
		if(strlen(trim($_POST[$field])) <$min_len)
		{
			$form_errors[]= $field . " is too short, must be ".$min_len . " characters long";
		}
		
	}

	return $form_errors;
}


function check_email($data){
	$form_errors= array();
	$key="email";

	if(array_key_exists($key ,$data)){

		if($_POST[$key] != NULL){

			$key= filter_var($key, FILTER_SANITIZE_EMAIL);


			if(filter_var($_POST[$key] ,FILTER_VALIDATE_EMAIL)===false){
				$form_errors[] = $key . " is not a valid email address";
			}
		}
	}
	return $form_errors;
}


function show_errors($fields_error_array){
	$error = "<ul style='color : red; ' >";
	foreach ($fields_error_array as $err) {
			$error .="<li> {$err}</li>";
	}


	$error .="</ul>";


	return $error;
}

function flashMessage($message, $passOrFail = "Pass"){

	if($passOrFail === "Fail"){
		$data = "<p class='alert alert-danger' >   {$message}   </p>";
	}
	else{
		$data =  "<p style= 'padding :20px; color:green;' border:1px solid gray;> {$message}   </p>";
	}

	return $data;
}

function redirectTo($page){

 	header("location:{$page}.php");
}


function checkDublicationEntry($table , $col ,$value , $db){
	try {
		$sql ='select * from ' . $table .' where ' . $col .'= :col';
		$statment =$db->prepare($sql);
		$statment->execute(array(":col" => $value));

		if($row = $statment->fetch()){
			return true;
		}
		else {
			return false;
		}
		
	} catch (PDOException $e) {
		
	}
}



function rememberMe($user_id){
	$incryptCookieData =  base64_encode("VGhpcyBpcyGbiBlbmNvkGVkI0cuZwDz{$user_id}");

	setcookie("rememberUserCookie" , $incryptCookieData, time()+60*60*24*100,'/');
}

function isCookieValid($db){
	$isValid= false;
	if (isset($_COOKIE['rememberUserCookie'])) {

		$decryptCookieData =  base64_decode($_COOKIE['rememberUserCookie']);
		$data = explode('VGhpcyBpcyGbiBlbmNvkGVkI0cuZwDz', $decryptCookieData);
		$user_id = $data[1];

		$sql = "select * from users where id = :id";
		$statment = $db->prepare($sql);
		$statment->execute(array(":id" => $user_id));

		if($row = $statment->fetch()){
			$id = $row['id'];
			$username = $row['username'];

			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			$isValid= true;


		}else{
			$isValid= false;
			signout();

		}
		
	}
	return $isValid;
}

function signout(){
	unset($_SESSION['username'] );
	unset($_SESSION['id'] );

	if (isset($_COOKIE["rememberUserCookie"])) {
			unset($_COOKIE["rememberUserCookie"]);
			setcookie("rememberUserCookie" , null, -1 , '/');

	}

	session_destroy();
	//session_regenerate_id(true);
	redirectTo('index');
}