// nese inputi emri permban numer afishohet warning
$('#emri').bind('keyup blur',function(){ 
	$('#errEmri').text("");

    var emri=$(this).val();
    if(contains_number(emri)){
    	$('#errEmri').text("Nuk lejohen numrat");
    }
});


//nese inputi mbiemer permban numer afishohet warning
$('#mbiemri').bind('keyup blur',function(){ 
	$('#errMbiemri').text("");
    var mbiemri=$(this).val();
    if(contains_number(mbiemri)){
    	$('#errMbiemri').text("Nuk lejohen numrat");
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


// funksion qe kthen true nese nje string permban nje numer
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