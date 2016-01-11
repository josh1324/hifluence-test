<?php
require 'scripts/class.loginscript.php';
include_once 'config.php';

	//Pull username, generate new ID and hash password
	$newid = uniqid (rand(), false);
	$newuser = $_POST['newuser'];
	$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
	$pw1 = $_POST['password1'];
	$newemail = $_POST['email'];

//Validation rules
if (strlen($pw1) < 6){
	echo'<div data-alert class="alert-box alert radius">Password must be at least 6 characters<a href="#" class="close">&times;</a></div><div id="returnVal" style="display:none;">false</div>';
}
elseif(!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true ){
	echo '<div data-alert class="alert-box alert radius">Must provide a valid email address<a href="#" class="close">&times;</a></div><div id="returnVal" style="display:none;">false</div>';
}
//Validation passed
else{
	if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1'])) ){
		//Tries inserting into database and add response to variable
		$a = new newUserForm;
		$response = $a->createUser($newuser, $newid, $newemail, $newpw);
		//Success
		if($response == 'true'){
			echo '<div data-alert class="alert-box success radius">'. $signupthanks .'<a href="#" class="close">&times;</a></div><div id="returnVal" style="display:none;">true</div>';
		}
		//Failure
		else{ mySqlErrors($response); }
	}

	else{//Validation error from empty form variables
		echo '<div data-alert class="alert-box alert radius">An error occurred on the form... try again<a href="#" class="close">&times;</a></div>';
	}
};
?>
