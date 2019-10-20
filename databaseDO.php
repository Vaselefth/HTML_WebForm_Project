<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = $_POST['name'];
$email = $_POST['email'];

echo "<h1>Δώσατε </h1>";
echo "<br/>";
echo $name;
echo "<br/>";
echo $email;
echo "<br/>";
echo "<br/>";
echo "<br/>";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "<br/>";
} 

// Create database
$sql = "CREATE DATABASE Vasi";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
	echo "<br/>";
} else {
    echo "Error creating database: " . $conn->error;
	echo "<br/>";
}
$dbname = "Vasi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "<br/>";
} 

// sql to create table
$sql = "CREATE TABLE Players (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Players created successfully";
	echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error;
	echo "<br/>";
}
$sql = "INSERT INTO Players (name, email)
VALUES ('".$_POST["name"]."','".$_POST["email"]."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	echo "<br/>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<br/>";
}

$sql = "SELECT id, name, email FROM Players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["email"] . "<br>";
     }
} else {
     echo "0 results";
}
$conn->close();


?>