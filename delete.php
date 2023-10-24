<?php 
$name=$_POST["name"];


$dsn="mysql:dbname=test";
$username="root";
$password="";
$conn=new PDO($dsn,$username,$password);
$msg="The row with name".$name."has been deleted";
$strquery="delete from myguest where name=:name";
    $st=$conn->prepare($strquery);
    $st->bindValue(":name",$name,PDO::PARAM_STR);
    $st->execute();
echo $msg;
echo "<br>";
echo "<br>";

 
?>