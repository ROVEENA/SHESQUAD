<html>
<head>

</head>
<body>

<?php
if ( ! empty( $_POST ) ) {
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db="woman";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"; 
$sql = "INSERT INTO review ( teacher_name, teacher_email, rating ) VALUES ('$_POST[name]', '$_POST[email]',  '$_POST[rating]')";
 
  

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
else{ echo "Please click on the submit button";}

?>
<form method="post" action="">
 NAME: <input name="name" type="text">
 EMAIL: <input name="email" type="email">
 RATING: <input name="rating" type="text">
  <input type="submit" value="Submit Form">
</form>
</body>
</html>