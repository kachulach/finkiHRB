<?php 

	if (isset($_POST["uid"])) {
		print("User id: ". $_POST["uid"]);
	} else {
		print("User id is not set");
	}


	if (isset($_POST["user_likes"])) {
		print("user likes: ". $_POST["user_likes"]);
	} else {
		print("user_likes is not set");
	}


	if (isset($_POST["user_poll_answers"])) {
		print("user_poll_answers: ". $_POST["user_poll_answers"]);
	} else {
		print("user_poll_answers is not set");
	}



?>