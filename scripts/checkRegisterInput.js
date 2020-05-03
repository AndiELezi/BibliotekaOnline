// nese inputi emri permban numer afishohet warning

$('#emri').bind('keyup blur',function(){ 
	$('#errEmri').text("");

    var emri=$(this).val();
    if(contains_number(emri)){
    	$('#errEmri').text("Emri nuk mund te permbaje numer");
    }
});


//nese inputi mbiemer permban numer afishohet warning
$('#mbiemri').bind('keyup blur',function(){ 
	$('#errMbiemri').text("");
    var mbiemri=$(this).val();
    if(contains_number(mbiemri)){
    	$('#errMbiemri').text("Mbiemri nuk mund te permbaje numer");
    }
});


//kontrollojme nese passwordi permban te pakten 8 karaktere
//kur del nga fokusi behet kontrolli dhe afishohet warning
$('#password').focusout(function(){
  var password=$('#password').val();
  if(password.length < 8){
    $('#errPassword').text("Passwordi duhet te permbaje te pakten 8 karaktere");
  }
});

//kur fokusohet te hiqet warning
$('#password').focusin(function(){
    $('#errPassword').text("");
});

// kontrollojme nese passwordi eshte konfirmuar sakte
$('#cPassword').bind('keyup blur',function(){ 
	$('#errCPassword').text("");

	var password=$('#password').val();
    var cPassword=$(this).val();
    if(password!==cPassword){
    	$('#errCPassword').text("Passwordet nuk perputhen");
    }
});



$('#username').bind('keyup blur',function(){ 
  $('#errUsername').text("");
    var username=$(this).val();
   if(username.length>0){
jQuery.ajax({
url: "functions/checkAvailability.php",
data:'username='+ username,
type: "POST",
success:function(data){

  if(data=="Username is available"){
    document.getElementById("username").style="border: 2px solid #1ec31e";
  }
  else{
    document.getElementById("username").style="border: 2px solid red";
    $('#errUsername').text(data);
  }
},
error:function (){}
});
}

});



$('#email').bind('keyup blur',function(){ 
  	$('#errEmail').text("");
    var email=$(this).val();
  	if(email.length>0){
		jQuery.ajax({
			url: "functions/checkAvailability.php",
			data:'email='+ email,
			type: "POST",
			success:function(data){
        if(data=="Email is available"){
          document.getElementById("email").style="border: 2px solid #1ec31e";
        }
        else{
          document.getElementById("email").style="border: 2px solid red";
          $('#errEmail').text(data);
        }
			},
			error:function (){}
		});
	}
});


$('#email').focusout(function(){
  if($(this).val()==""){
    document.getElementById("email").style="border: 2px solid #8CA1D6";
  }
});


$('#username').focusout(function(){
  if($(this).val()==""){
    document.getElementById("username").style="border: 2px solid #8CA1D6";
  }
});


// funksion qe kthen true nese nje string permban nje numer 
//prov
function contains_number(str){
	for (var i = 0; i < str.length; i++) {
  		if(is_numeric_char(str.charAt(i))){
  			return true;
  		}
  	}
  	return false;
}

//funksion qe kontrollon nese nje char eshte numer
function is_numeric_char(c) { return /\d/.test(c); }



