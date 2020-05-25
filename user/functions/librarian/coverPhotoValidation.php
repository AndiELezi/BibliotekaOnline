<?php

	if(!empty($cover_photo)){
		$cover_photo_name=$_FILES["cover_photo"]["name"];
		$cover_photo_Temp_Name=$_FILES["cover_photo"]["tmp_name"];
		$cover_photo_Size=$_FILES["cover_photo"]["size"];
		$cover_photo_Error=$_FILES["cover_photo"]["error"];
		$cover_photo_Type=$_FILES["cover_photo"]["type"];
		//ndajm fjalen kudo ku ka pika
		$coverPhotoNameSeparated=explode(".", $cover_photo_name);
		//gjejm prpapashtesen psh jpg  etc
		$coverPhotoExtension=strtolower(end($coverPhotoNameSeparated));
		//nje array me t gjitha tipet e mundshme t fileve t lejuara
		$allowedCoverPhoto=array('jpg','png','jpeg');
		if(in_array($coverPhotoExtension, $allowedCoverPhoto)){
			if($cover_photo_Error===0){
				//nqs gjithcka esht ne rregull bejm uplodimin e cover photo
				$coverPhotoNewName=preg_replace('/[^A-Za-z0-9\-]/', '', $book_file_name).".".$coverPhotoExtension;
				$fileDestination='C:\xampp\htdocs\BibliotekaOnline\images\books\\'.$coverPhotoNewName;
				move_uploaded_file($cover_photo_Temp_Name, $fileDestination);
				include 'DBUploadOfflineBook.php';

			}
			else{
				$errCoverPhoto="gabim ne uplodimin e fotos";
				}

		}
		else{
			$errCoverPhoto="formatet e lejuara jan jpg,png,jpeg";
			}

	}
	//ktu esht nqs nk ka vendosur cover foto
	else{
		$errCoverPhoto="Duhet te vendosni cover photo";
	}
?>