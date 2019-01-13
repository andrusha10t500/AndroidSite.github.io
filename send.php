<?php
require 'connection.php';
header("Content-Type: text/html; charset=utf-8");
$mysqli = new mysqli($host,$user,$password,$database);
$mysqli->query("SET NAMES utf8");
$mysqli->query("insert into sms (number,body,note) 
values ('".$_POST['number']."', '".$_POST['body']."', 'send');");
if($mysqli->connect_errno)
{
    echo " <br /> не удалось <br />".$mysqli->connect_errno;
}
else {
    echo " <br /> удалось";        
}
// $mysqli->close();
$res=$mysqli->query("select * from sms;");
while($row = $res->fetch_assoc())
    {
        echo $row['id'] . " " . $row['number'] . " " . $row['body'] . " " . $row['note'] . "<br />";
    }
if(!empty($_POST["number"])) {
    echo "<br /> Получено " . $_POST["number"] . "<br /> Текст: " . $_POST["body"];
}
else {
    echo "<br /> Не получилось!";
}
?>