
<?php 

$isCorrect=1;
$security=str_shuffle("qwertyuioplkjhgfdsazxcvbnm1234567890");
$emri=$mbiemri=$phone_nr=$email=$username=$birthday=$gjinia=$password=$cPassword="";

$ErrEmri=$ErrMbiemri=$ErrEmail=$ErrUsername=$ErrBirthday=$ErrGjinia=$ErrPassword=$ErrCPassword=$emailAvailable="";

//funksion qe kontrollon nese nje string permban nje numer
function containsNumbers($String){
    return preg_match('/\\d/', $String) > 0;
}

if(isset($_POST["submit"])){


include "functions/checkAvailabilityValidation.php";


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


    if(!empty($_POST["email"])){
    	$email=$_POST["email"];
  	}
    else{
      	$ErrEmail="Vendosni email";
        $isCorrect=0;
  	}

    if(!empty($_POST["phone_nr"])){
      $phone_nr=$_POST["phone_nr"];
    }

  	if(!empty($_POST["username"])){
    	$username=$_POST["username"];
  	}
    else{
      	$ErrUsername="Vendosni username";
        $isCorrect=0;
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
  	}
    else{
      	$ErrGjinia="Vendosni gjinin";
        $isCorrect=0;
    }


	if(!empty($_POST["password"])){
    	$password=$_POST["password"];

    	//nese passwordi eshte me i shkurter se 8 karaktere afishohet warning
    	if(strlen($password)<8){
    		$ErrPassword="Passwordi duhet te permbaje te pakten 8 karaktere";
    		$isCorrect=0;
    	}
  	}
    else{
      $ErrPassword="Vendosni passwordin";
      $isCorrect=0;
    }


    if(!empty($_POST["cPassword"])){
    	$cPassword=$_POST["cPassword"];

    	//kontrollohet nese passwordi eshte konfirmuar sakte, nese jo afishohet warning
    	if(strcmp($password, $cPassword)!==0){
  			$ErrCPassword="Passwordet nuk perputhen";
  			$isCorrect=0;
    	}
  	}

    else{
      $ErrCPassword="Konfirmoni passwordin";
        $isCorrect=0;
    }

  if($isCorrect===1){
    include "activationMail.php";
    include "registerDatabaze.php";

    header("Location: /BibliotekaOnline/user/login.php");


  }
 
  
  
      
  }
 





  ?>