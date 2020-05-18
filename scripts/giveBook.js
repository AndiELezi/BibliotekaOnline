function kerkoRezervim() {
	var username=document.getElementById("username").value;
	var bookIsbn=document.getElementById("bookIsbn").value;
	
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("giveBookResult").innerHTML=this.responseText;
        
      }
    }
  }
 var data="username="+username+"&bookIsbn="+bookIsbn;
 xmlhttp.open("POST","../functions/bookReservationConfirm.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}

function jepLibrin(username,Isbn){

	
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("giveBookConfirmedResult").innerHTML=this.responseText;
        
      }
    }
  }
 var data="username="+username+"&Isbn="+Isbn;
 xmlhttp.open("POST","../functions/bookReservationConfirm.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}