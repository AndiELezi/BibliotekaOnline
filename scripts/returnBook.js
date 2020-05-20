function kerkoRezervim() {
	var username=document.getElementById("username").value;
	var bookIsbn=document.getElementById("bookIsbn").value;
	
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("returnBookResult").innerHTML=this.responseText;
        
      }
    }
  }
 var data="username="+username+"&bookIsbn="+bookIsbn;
 xmlhttp.open("POST","../functions/librarian/bookReturn.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}

function returnBook(username,Isbn){

	
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("returnBookConfirmedResult").innerHTML=this.responseText;
        
      }
    }
  }
 var data="username="+username+"&bookIsbn="+Isbn+"&returnBook=true";
 xmlhttp.open("POST","../functions/librarian/bookReturn.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}