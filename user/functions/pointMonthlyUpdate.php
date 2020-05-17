<?php
include 'DBconnection.php';
$sql="SELECT user_id,SUM(monthly_likes) as nr_pikeve FROM online_books GROUP BY user_id";
$monthlyPointResult=$connection->query($sql);

while ($i=$monthlyPointResult->fetch_assoc()) {
	$points=$i["nr_pikeve"];
	$userId=$i["user_id"];
	$sql="UPDATE users set points=points+".$points." where id='{$userId}'";
	$connection->query($sql);
}

$sql="UPDATE online_books set monthly_likes=0";
$connection->query($sql);


  ?>