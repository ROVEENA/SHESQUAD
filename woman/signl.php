<!DOCTYPE HTML>

<html>
	
	<body>

	

	


<style>
.error {color: #FF0000;}
</style>
<body> 
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
//$USNErr = $BUSROUTEErr = $PICKUPPOINTErr = $NAMEErr = "";
$nameErr = $addressErr  = $emailErr = $learnErr= $passwordErr=$cpasswordErr= $phoneErr= $domainErr="";
//$password;
//$phone=0;
//$name = $address  = $phoneErr= $passwordErr= $email = $learn="";
//$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "name is required";
   } else {
     $name = test_input($_POST["name"]);$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
}
	 
   }
   
   if (empty($_POST["address"])) {
     $addressErr = "address is required"; 
   } else {
	 $address = test_input($_POST["address"]);
	 
   } 
     
   if (empty($_POST["email"])) {
     $emailErr = "email is required";
   } else {
     $email = test_input($_POST["email"]);
	 $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
}
   } 
   //if (empty($_POST["phone"])) {
   //  $phoneErr = "phone no is required";
   //} else {
   //  $phone = test_input($_POST["phone"]);
   //}
    if (empty($_POST["password"])) {
     $passwordErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
   if (empty($_POST["cpassword"])) {
     $passwordErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
   if (empty($_POST["domain"])){
    $domainErr = "domain is required";
  } else {
    $domain = test_input($_POST["domain"]);
   }
   
    
   

   
}

function test_input($data) {
	$data = trim($data);
   $data = stripslashes($data);
	
   
   
   $data = htmlspecialchars($data);
   return $data;
}
?>


<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 
   FULL NAME: <input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
    FULL ADDRESS: <input type="text" name="address">
   <span class="error">* <?php echo $addressErr;?></span>
   <br><br> 
 <!-- PHONE:<input type="number" name="BUSROUTE" min ="1" max="12">
   <span class="error">* <?php echo $BUSROUTEErr;?></span>
   <br><br> -->
   PHONE NO: <input type="text" name="phone">
  <!-- <span class="error">* <?php echo $phoneErr;?></span> -->
   <br><br>
   EMAIL-ID: <input type="email" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br> 
   PASSWORD: <input type="password" name="password">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br> 
   CONFIRM PASSWORD: <input type="password" name="cpassword">
   <span class="error">* <?php echo $cpasswordErr;?></span>
   <br><br> 
   IN WHICH DOMAIN DO U WANNA LEARN?:<select name= "domain">
  <option value="Education">Education</option>
  <option value="Medicine">Medicine</option>
  <option value="Miscellaneous">Miscellaneous</option>
 
</select>
<span class="error">* <?php echo $domainErr;?></span> 
   <br><br> 
   WHAT ARE YOU INTERESTED IN LEARNING?: <input type="text" name="learn">
 <!--  <span class="error">* <?php echo $learnErr;?></span> -->
   <br><br> 
   
  
   <input type="submit" name="submit" value="Submit"> 
   
</form>

<?php

//$pass=$_POST['password'];
//$enpass=md5($pass);
?>
<?php
if (isset($_POST['submit'])) {
	if($_POST['cpassword']==$_POST['password'] && $nameErr == ""&&learnErrErr== "" &&$emailErr=="" && $addressErr=="" && $passwordErr=="" && $cpasswordErr=="" && $domainErr=="" ){
	
	$pass=$_POST['password'];
$enpass=md5($pass);
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


$sql = "INSERT INTO learner(name,address,phone,email,password,learn,domain)
VALUES ('$_POST[name]', '$_POST[address]','$_POST[phone]' ,'$_POST[email]', '$enpass','$_POST[learn]','$_POST[domain]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
else{ //echo "confirm password not same";
}
?>


</body>
</html>
</body>
</html>

