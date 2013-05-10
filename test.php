<?php

header('Content-type:text/plain');

$host='localhost';

$user='root';

$password='';

try

{

$dbh=new PDO("mysql:host=$hostname;dbname=db",$user,$password);

$sql="select * from student";

$stmt=$dbh->query($sql);

$obj=$stmt->fetch(PDO::FETCH_OBJ);

print_r($obj);

var_dump($obj);

$dbh=null;

}

catch(PDOException $c)

{

echo $c->getMessage();

}

?>