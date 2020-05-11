function deleteBook(bookId){
	//copy funksion qe tcon te dhenen me post
	//deleteBook.php
		xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
       document.getElementById("deleteResponse").innerHTML=this.responseText;
        
      }
    }
  }
  var data="id="+bookId;
 xmlhttp.open("POST","functions/deleteBook.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}