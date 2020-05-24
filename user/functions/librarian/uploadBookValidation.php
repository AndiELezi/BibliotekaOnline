<?php
$successMsg="";
$isOk=1;
$errIsbn=$errTitle=$errBook=$errAuthor=$errCategory=$errPublicationYear=$errCoverPhoto=$errPublishHouse=$errQuantity=$errPrice=$errReservationPoints=$isbn=$author=$title=$description=$publishHouse=$quantity=$price=$reservationPoints="";
$category;
$cover_photo;
$book_file_name; //emri i filet cover qe do vendoset n databaz dhe n path
if(isset($_POST["upload"])){

	if(!empty($_POST["isbn"])){
		
		if(strlen(str_replace(" ","", $_POST["isbn"]))==13){
			$isbn=str_replace(" ","", $_POST["isbn"]);
		}
		else{
			$errIsbn="ISBN duhet te ket 13 shifra";
			$isOk=0;
		}
	}
	else{
		$errIsbn="ISBN nk mund te jete bosh";
		$isOk=0;
	}

	$reservationPoints=$_POST["reservationPoints"];

	if(!empty($_POST["publishHouse"])){
		$publishHouse=$_POST["publishHouse"];
	}
	else{
		$errPublishHouse="Publish House nk mund te jete bosh";
		$isOk=0;
	}

	if(!empty($_POST["quantity"])){
		$quantity=$_POST["quantity"];
	}
	else{
		$errQuantity="Sasia nk mund te jete bosh";
		$isOk=0;
	}

	if(!empty($_POST["price"])){
		$price=$_POST["price"];
	}
	else{
		$errPrice="Cmimi nk mund te jete bosh";
		$isOk=0;
	}

	if(!empty($_POST["title"])){
		$title=$_POST["title"];
	}
	else{
		$errTitle="titulli librit nk mund te jete bosh";
		$isOk=0;
	}


	if(!empty($_POST["description"])){
		$description=$_POST["description"];
	}
	

	if(!empty($_POST["author"])){
		$author=$_POST["author"];
	}
	else{
		$errAuthor="Autori nk mund te jete bosh";
		$isOk=0;
	}


	if(!empty($_POST["category"])){
		$category=$_POST["category"];
	}
	else{
		$errCategory=" duhet te zgjidhni te pakten nje kategori";
		$isOk=0;
	}

	if(!empty($_POST["publication_year"])){
		$publication_year=$_POST["publication_year"];
	}
	else{
		$errPublicationYear="Vendosni daten e publikimit";
		$isOk=0;
	}

	if (isset($_FILES['cover_photo']) && $_FILES['cover_photo']['tmp_name'] != ''){
 		if(is_uploaded_file($_FILES['cover_photo']['tmp_name'])){  
  			$cover_photo=$_FILES["cover_photo"];
  		}
	}



	if($isOk==1){
		$book_file_name=$title.time();
		include 'coverPhotoValidation.php';
}

}












  ?>