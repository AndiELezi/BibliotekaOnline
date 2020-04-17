
<?php 

$isCorrect=1;
$emri=$user["name"];
$mbiemri=$user["surname"];
$phone_nr=$user["mobile"];
$birthday=$user["birthday"];
$gjinia=$user["gender"];
$gjiniaMale="";
$gjiniaFemale="";
$gjiniaOther="";

// funksion per sekection duhet t a rreg dhe tek register.php
function genderSelect(){
  global $gjinia;
  global $gjiniaFemale;
  global $gjiniaOther;
  global $gjiniaMale;
$gjiniaMale="";
$gjiniaFemale="";
$gjiniaOther="";
  if(strcmp($gjinia,"Male")==0){
  $gjiniaMale="selected";
}
else if(strcmp($gjinia, "Female")==0){
  $gjiniaFemale="selected";
}
else{
  $gjiniaOther="selected";
    }
}
genderSelect();


$password="";

$ErrEmri=$ErrMbiemri=$ErrUsername=$ErrBirthday=$ErrGjinia=$ErrPassword="";

//funksion qe kontrollon nese nje string permban nje numer
function containsNumbers($String){
    return preg_match('/\\d/', $String) > 0;
}

if(isset($_POST["submit"])){



  if(!empty($_POST["emri"])){
    $emri=$_POST["emri"];

    // nqs emri permban numer afishohet nje warning
    if(containsNumbers($emri)){
  		$ErrEmri="Emri nuk mund te permbaje numer";
  		$isCorrect=0;
  	}
  }

  else{
      $ErrEmri="Vendosni emrin";
      $isCorrect=0;
    }


    if(!empty($_POST["mbiemri"])){
    	$mbiemri=$_POST["mbiemri"];

    	// nqs mbiemri permban numer afishohet nje warning
    	if(containsNumbers($mbiemri)){
  			$ErrMbiemri="Mbiemri nuk mund te permbaje numer";
  			$isCorrect=0;
  		}
  	}

    else{
      	$ErrMbiemri="Vendosni mbiemrin";
        $isCorrect=0;
    }


    if(!empty($_POST["phone_nr"])){
      $phone_nr=$_POST["phone_nr"];
    }


    if(!empty($_POST["birthday"])){
    	$birthday=$_POST["birthday"];
  	}
    else{
      	$ErrBirthday="Vendosni datelindjen";
        $isCorrect=0;
    }


    if(!empty($_POST["gjinia"])){
    	$gjinia=$_POST["gjinia"];
      genderSelect();
  	}
    else{
      	/// e nk e sht ber disabled false prndj s ka prbl
    }


  if($isCorrect===1){
  include 'functions/editProfileDatabase.php';


  }
 
  
  
      
  }
 





  ?>