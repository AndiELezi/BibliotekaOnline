<?php
include '../DBconnection.php';
$i=1;
while(true){
 if(!isset($_POST["id$i"])){
 	break;
 }
 $authorId=$_POST["id$i"];
 $authorBirthplace=$_POST["birthplace$i"];
 $authorContact=$_POST["contact$i"];
 $authorBirthday=$_POST["birthday$i"];
 $sql="UPDATE author set birthplace='{$authorBirthplace}',birthday='{$authorBirthday}',contact='{$authorContact}' where id='{$authorId}'";
 $connection->query($sql);
 $i++;
}

echo "Autoret u updetuan me sukses";



  ?>