
  <?php 
   
$emri=$mbiemri=$email=$username=$birthday=$gjinia=$password=$cPassword="";
$ErrEmri=$ErrMbiemri=$ErrEmail=$ErrUsername=$ErrBirthday=$ErrGjinia=$ErrPassword=$ErrCPassword="";
  if(isset($_POST["submit"])){

  if(!empty($_POST["emri"])){
    $emri=$_POST["emri"];

  }
    else{
      $ErrEmri="Vendosni emrin";
    }
    if(!empty($_POST["mbiemri"])){
    $mbiemri=$_POST["mbiemri"];
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
  }
    else{
      $ErrPassword="Vendosni passwordin";
    }
    if(!empty($_POST["cPassword"])){
    $cPassword=$_POST["cPassword"];
  }
    else{
      $ErrCPassword="Vendosni Konfirmimin e passwordit";
    }
  
  include "mail.php";
   
      
  }
 





  ?>