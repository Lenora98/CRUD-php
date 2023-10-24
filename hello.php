<?php 
$name = $_POST["name"];
$userPassword = $_POST["password"]; // Changed variable name to avoid conflict

$dsn = "mysql:dbname=test";
$username = "root";
$dbPassword = "";  // Changed variable name to avoid conflict

$conn = new PDO($dsn, $username, $dbPassword);

$strquery = "INSERT INTO myguest (name, password) VALUES (:name, :password)";
$st = $conn->prepare($strquery);

$st->bindValue(":password", $userPassword, PDO::PARAM_STR);
$st->bindValue(":name", $name, PDO::PARAM_STR);

$st->execute();

echo "Successfully inserted";
echo "<br>";
echo "<br>";
?>
