<?php
$name = $_POST["name"];
$password = $_POST["password"];

$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$username = "root";
$db_password = "";

try {
    $conn = new PDO($dsn, $username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $strquery = "UPDATE myguest SET password=:password WHERE name=:name";
    $stmt = $conn->prepare($strquery);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    echo "Successfully updated";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
