<?php

//$con=mysqli_connect("localhost","root"," ","test");
$dsn="mysql:dbname=test";
$username="root";
$password="";
$conn=new PDO($dsn,$username,$password);

if($conn){

   header("content-Type:JSON");
    $stmt = $conn->prepare(
        "SELECT * FROM myguest");
$stmt->execute();
$users = $stmt->fetchAll();
foreach($users as $user)
{
   $user["name"];
}
echo json_encode($users,JSON_PRETTY_PRINT);
    
}
else{
    echo "DB not connected";
}
?>