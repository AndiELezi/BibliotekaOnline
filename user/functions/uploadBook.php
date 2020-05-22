<?php
$book_name=$_FILES["book"]["name"];
$book_Temp_Name=$_FILES["book"]["tmp_name"];
$book_Size=$_FILES["book"]["size"];
$book_Error=$_FILES["book"]["error"];
$book_Type=$_FILES["book"]["type"];

//ndajm fjalen kudo ku ka pika
$bookNameSeparated=explode(".", $book_name);
//gjejm prpapashtesen psh pdf  etc
$bookExtension=strtolower(end($bookNameSeparated));

//nje array me t gjitha tipet e mundshme t fileve t lejuara
$allowedBook=array('pdf','txt','docx');
if(in_array($bookExtension,$allowedBook)){
	
	if($book_Error===0){
			//kontrollohet nqs libri ka cover photo apo jo

			if(!empty($cover_photo)){
				$cover_photo_name=$_FILES["cover_photo"]["name"];
				$cover_photo_Temp_Name=$_FILES["cover_photo"]["tmp_name"];
				$cover_photo_Size=$_FILES["cover_photo"]["size"];
				$cover_photo_Error=$_FILES["cover_photo"]["error"];
				$cover_photo_Type=$_FILES["cover_photo"]["type"];
				//ndajm fjalen kudo ku ka pika
				$coverPhotoNameSeparated=explode(".", $cover_photo_name);
				//gjejm prpapashtesen psh pdf  etc
				$coverPhotoExtension=strtolower(end($coverPhotoNameSeparated));
				//nje array me t gjitha tipet e mundshme t fileve t lejuara
				$allowedCoverPhoto=array('jpg','png','jpeg');
				if(in_array($coverPhotoExtension, $allowedCoverPhoto)){
					if($cover_photo_Error===0){
						//nqs gjithcka esht ne rregull bejm uplodimin e te dy fileve

						//behet uplodimi i librit ne fillim
							$bookNewName=preg_replace('/[^A-Za-z0-9\-]/', '', $book_file_name).".".$bookExtension;
							$fileDestination='C:\xampp\htdocs\BibliotekaOnline\eBooks\\'.$bookNewName;
							move_uploaded_file($book_Temp_Name, $fileDestination);

						//me pas behet uplodimi i cover_photo
							$coverPhotoNewName=preg_replace('/[^A-Za-z0-9\-]/', '', $book_file_name).".".$coverPhotoExtension;
							$fileDestination='C:\xampp\htdocs\BibliotekaOnline\images\onlineBooks\\'.$coverPhotoNewName;
							move_uploaded_file($cover_photo_Temp_Name, $fileDestination);
							include 'uploadBookDatabase.php';

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

				$bookNewName=preg_replace('/[^A-Za-z0-9\-]/', '', $book_file_name).".".$bookExtension;
				$fileDestination='C:\xampp\htdocs\BibliotekaOnline\eBooks\\'.$bookNewName;
				move_uploaded_file($book_Temp_Name, $fileDestination);
				include 'uploadBookDatabase.php';
			}


		}

	else{
		$errBook="gabim ne uplodimin e librit";
		}	
	}

else{
		$errBook="formatet e lejuara jan pdf,txt,docx";
	}






  ?>