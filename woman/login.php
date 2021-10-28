<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "woman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['submit'])){
	$email = mysql_escape_srtring($_POST['email']);
	$pass = mysql_escape_string($_POST['password']);
	$pass= md5($pass);
	$sql= mysql_query("SELECT * FROM learner where email = '$email' AND password = '$pass'");
	if(mysql_num_rows($sql) > 0 ){
		echo"You are now logged in.";exit();
	}else{
	echo "Wrong USER PAssword ";
	}
<form name="login.php" action="" method="post">
Enter email<input type="text" name="t1"><br>
Enter password<input type="text" name="t2"><br>
<input type="submit"name="submit"value="login"><br>
</form>
}
?>