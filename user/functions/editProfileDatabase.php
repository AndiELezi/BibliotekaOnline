<?php 

include 'DBconnection.php';


if(isset($_POST["gjinia"])){
$stmt = $connection->prepare("UPDATE `users` SET name=?,surname=?,mobile=?,birthday=?,gender=? WHERE username='{$username}'");
$stmt->bind_param('sssss',$emri,$mbiemri,$phone_nr,$birthday,$gjinia);
$stmt->execute();
}
else{
	$stmt = $connection->prepare("UPDATE `users` SET name=?,surname=?,mobile=?,birthday=? WHERE username='{$username}'");
$stmt->bind_param('ssss',$emri,$mbiemri,$phone_nr,$birthday);
$stmt->execute();
}
$success="Te dhenat u ndryshuan me sukses";


 ?>