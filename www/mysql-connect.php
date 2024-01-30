<h3>Hello Learner!</h3>
<h4>Attempting MySQL connection from php...</h4>
<?php
if(!empty($_ENV['MYSQL_HOST']))
   $host = $_ENV['MYSQL_HOST'];
else
   $host = 'n-mysql-app';

if(!empty($_ENV['MYSQL_USER']))
   $user = $_ENV['MYSQL_USER'];
else
   $user = 'nuser';

if(!empty($_ENV['MYSQL_PASSWORD']))
   $pass = $_ENV['MYSQL_PASSWORD'];
else
   $pass = 'npass';

if(!empty($_ENV['MYSQL_DB']))
   $db_name = $_ENV['MYSQL_DB'];
else
   $db_name = 'myphpappdb';

echo "Connecting to Database: $host $user $pass $db_name";
echo "<br><br>";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to MySQL successfully!";
echo "<br><br>";

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtPhone = $_POST['txtPhone'];
$txtMessage = $_POST['txtMessage'];

$res = $conn->query("INSERT INTO userinfo (name, email, phone, message) VALUES ('$txtName', '$txtEmail', '$txtPhone', '$txtMessage')");

if($res)
{
	echo "Contact Records Inserted";
}

$conn->close();
?>