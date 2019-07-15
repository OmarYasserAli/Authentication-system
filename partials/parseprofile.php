<?php 
include_once 'resource/Database.php';
include_once 'resource/session.php';




if (isset($_SESSION['id'])) {

	$id = $_SESSION['id'];

	$sql= 'select * from users where id = :id';
	$statment = $db->prepare($sql);
	$statment->execute(array(':id' => $id));

	while ($row = $statment->fetch()) {
		$username = $row['username'];
		$email= $row['email'];
		$jDate = strftime("%b , %d ,%y" ,strtotime($row['join_date']));
	}
	$encoded_id = base64_encode("encodedID{$id}");
}
?>