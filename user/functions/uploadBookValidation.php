<?php
$successMsg="";
$isOk=1;
$errTitle=$errBook=$errCategory=$errCoverPhoto=$title=$description="";
$category;
$cover_photo;
$book;
$book_file_name; //emri i filet cover dhe book qe do vendoset n databaz dhe n path
if(isset($_POST["upload"])){

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
	


	if(!empty($_POST["category"])){
		$category=$_POST["category"];
	}
	else{
		$errCategory=" duhet te zgjidhni te pakten nje kategori";
		$isOk=0;
	}



	if (isset($_FILES['cover_photo']) && $_FILES['cover_photo']['tmp_name'] != ''){
 	 if(is_uploaded_file($_FILES['cover_photo']['tmp_name'])){  
  		$cover_photo=$_FILES["cover_photo"];
  }
}

	


	if (isset($_FILES['book']) && $_FILES['book']['tmp_name'] != ''){
 	 if(is_uploaded_file($_FILES['book']['tmp_name'])){  
  		$book=$_FILES["book"];

 	 }
  	else{
  			$errBook="ngarkoni librin";
  			$isOk=0;
  		 }
  
	}
	else{
  		$errBook="ngarkoni librin";
  		$isOk=0;
  	} 



	if($isOk==1){
		$book_file_name=$title.time();
		include 'uploadBook.php';
}

}












  ?>