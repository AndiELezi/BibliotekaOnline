
<?php 

$isCorrect=true;
$emri=$mbiemri=$email=$username=$birthday=$gjinia=$password=$cPassword="";
$ErrEmri=$ErrMbiemri=$ErrEmail=$ErrUsername=$ErrBirthday=$ErrGjinia=$ErrPassword=$ErrCPassword="";

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
  		$isCorrect=false;
  	}
  }

  else{
      $ErrEmri="Vendosni emrin";
    }


    if(!empty($_POST["mbiemri"])){
    	$mbiemri=$_POST["mbiemri"];

    	// nqs mbiemri permban numer afishohet nje warning
    	if(containsNumbers($mbiemri)){
  			$ErrMbiemri="Mbiemri nuk mund te permbaje numer";
  			$isCorrect=false;
  		}
  	}

    else{
      	$ErrMbiemri="Vendosni mbiemrin";
    }


    if(!empty($_POST["email"])){
    	$email=$_POST["email"];
  	}
    else{
      	$ErrEmail="Vendosni email";
  	}

  	if(!empty($_POST["username"])){
    	$username=$_POST["username"];
  	}
    else{
      	$ErrUsername="Vendosni username";
  	}

    if(!empty($_POST["birthday"])){
    	$birthday=$_POST["birthday"];
  	}
    else{
      	$ErrBirthday="Vendosni datelindjen";
    }


    if(!empty($_POST["gjinia"])){
    	$gjinia=$_POST["gjinia"];
  	}
    else{
      	$ErrGjinia="Vendosni gjinin";
    }


	if(!empty($_POST["password"])){
    	$password=$_POST["password"];

    	//nese passwordi eshte me i shkurter se 8 karaktere afishohet warning
    	if(strlen($password)<8){
    		$ErrPassword="Passwordi duhet te permbaje te pakten 8 karaktere";
    		$isCorrect=false;
    	}
  	}
    else{
      $ErrPassword="Vendosni passwordin";
    }


    if(!empty($_POST["cPassword"])){
    	$cPassword=$_POST["cPassword"];

    	//kontrollohet nese passwordi eshte konfirmuar sakte, nese jo afishohet warning
    	if(strcmp($password, $cPassword)==0){
  			$ErrCPassword="Passwordet nuk perputhen";
  			$isCorrect=false;
    	}
  	}

    else{
      $ErrCPassword="Konfirmoni passwordin";
    }

  
  //pjesa e email qe do i dergohet perdoruesit per te konfirmuar llogarine e tij
  include "mail.php";
   
      
  }
 





  ?>