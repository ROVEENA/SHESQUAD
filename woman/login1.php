<html>
<head>

<body>
<form name="login.php" action="" method="post">
Enter email:<input type="text" name="t1"><br>
Enter password:<input type="text" name="t2"><br>
<input type="submit" name="submit" value="login">
</form>

</body>
</head>
</html>

<?php
//if(isset($_POST["submit"])
if (isset($_POST['submit'])) {
	if($_POST['cpassword']==$_POST['password'] && $nameErr == ""){
	
	$pass=$_POST['password'];
$username="root";
$servername="127.0.0.1";
$db="woman";
$password="";
$conn= new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
	die("Connection failed: ", $conn->connect_error);
}

	$email = mysql_escape_srtring($_POST['t1']);
	$pass = mysql_escape_string($_POST['t2']);
	$pass= md5($pass);
	$sql= mysql_query("SELECT * FROM learner where email = '$email' AND password = '$pass'");
	if(mysql_num_rows($sql) > 0 ){
		echo "You are now logged in.";exit();
	}else{
	echo "Wrong USER PAssword";
?>