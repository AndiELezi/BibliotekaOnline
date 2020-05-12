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


function likePressed(bookId){

var like=document.getElementById("like").src;
if(like=="http://localhost/BibliotekaOnline/images/app/likeEmpty.png"){
  
  xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        
            document.getElementById("like").src="http://localhost/BibliotekaOnline/images/app/likeFilled.png";
        }
        
      }
    }
  

  var data="bookId="+bookId+"&like=1";
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}


else if(like=="http://localhost/BibliotekaOnline/images/app/likeFilled.png"){
  
        xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
            document.getElementById("like").src="http://localhost/BibliotekaOnline/images/app/likeEmpty.png";
        }
        
      }
    }
  

  var data="bookId="+bookId+"&like=0";
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);


  }

}



function favouritePressed(bookId){
  
var favourite=document.getElementById("favourite").src;
if(favourite=="http://localhost/BibliotekaOnline/images/app/favouriteEmpty.png"){
  document.getElementById("favourite").src="http://localhost/BibliotekaOnline/images/app/favouriteFilled.png";
  }
else if(favourite=="http://localhost/BibliotekaOnline/images/app/favouriteFilled.png"){
  document.getElementById("favourite").src="http://localhost/BibliotekaOnline/images/app/favouriteEmpty.png";
  }
}