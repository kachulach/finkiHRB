<?php 
include 'konekcija.php';
	
	header("Access-Control-Allow-Origin: *");
 
	if (isset($_POST["data"])) {
		$json=$_POST["data"];
		$uid=$json["uid"];
		$user_likes=$json["user_likes"];
		$user_poll_answers=$json["user_poll_answers"];
		insertUserData($uid, $user_poll_answers);
	}

	function insertUserData ($uid,$user_poll_answers) {
		$age=$user_poll_answers["age"];
		$gender=$user_poll_answers["gender"];
		$religion=$user_poll_answers["religion"];
		$politics=$user_poll_answers["politics"];
		$relationship=$user_poll_answers["relationship"];
		
		global $connection; 		
		$str="INSERT INTO userdata (uid,poll_age,poll_gender,poll_politics,poll_relationship,poll_religion) 
												VALUES ('$uid',$age,'$gender','$politics','$relationship','$religion')";												
		mysqli_query($connection,$str);
		mysqli_close($connection);
	}





?>