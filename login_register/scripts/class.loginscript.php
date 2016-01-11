<?php
// Extend this class to re-use db connection
class dbConn {
	public $conn;
	public function __construct(){

		include 'config.php';
		// Connect to server and select database.
		$this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
};

class loginForm extends dbConn {

	public function checkLogin($tbl_name, $myusername, $mypassword) {

		try {

			$db = new dbConn;

			$err = '';
			}

		catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		$stmt = $stmt = $db->conn->query("SELECT * FROM $tbl_name WHERE username='$myusername'");

		// Gets query result
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

	// Checks password entered against db password hash
		if(password_verify($mypassword, $result['password']) ){

			// Register $myusername, $mypassword and return "true"
			$success = 'true';

		}	else {
			//return the error message
			$success = '<div data-alert class="alert-box alert radius">Wrong Username or Password<a href="#" class="close">&times;</a></div>';
		}

		return $success;

	}
};

class newUserForm extends dbConn {

	public function createUser($usr, $uid, $email, $pw) {

		include 'config.php';

		try {

			$db = new dbConn;

			$err = '';
			// prepare sql and bind parameters
			$stmt = $db->conn->prepare("INSERT INTO $tbl_name (id, username, password, email)
			VALUES (:id, :username, :password, :email)");
			$stmt->bindParam(':id', $uid);
			$stmt->bindParam(':username', $usr);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $pw);
			$stmt->execute();
		}
		catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		//Determines returned value ('true' or error code)
		if ($err == '') {
			$success = 'true';
		}
		else {
			$success = $err;
		};

		return $success;
	}
};

function mySqlErrors ($response) {
	//Returns custom error messages instead of MySQL errors
	switch(substr($response, 0, 22)){
		case 'Error: SQLSTATE[23000]':
			echo '<div data-alert class="alert-box alert radius">Username already exists<a href="#" class="close">&times;</a></div>';
			break;
		default:
			echo '<div data-alert class="alert-box alert radius">An error occurred... try again<a href="#" class="close">&times;</a></div>';
	}
}

?>
