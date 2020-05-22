 var bookId=document.getElementById("bookId").innerHTML;
window.onload=function(){
  fullReview(-1);
};

function fullReview(userId){
  xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
       document.getElementById("bookReviewByUsers").innerHTML=this.responseText;
        
      }
    }
  }
  var data="bookId="+bookId+"&userId="+userId;
 xmlhttp.open("POST","functions/bookReviewByUsers.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}



function deleteBook(bookId){
	var result = confirm("Are u sure u want to delete this reservation?");
		if(result){
			xmlhttp=new XMLHttpRequest();
    		xmlhttp.onreadystatechange=function() {
   
    		if (this.readyState==4 && this.status==200) {

     		 if(this.responseText!=""){
       			document.getElementById("deleteResponse").innerHTML=this.responseText;
       			window.location.href = "home.php";
        
     			 }
   			 	}
 			 }
  		var data="id="+bookId;
 		xmlhttp.open("POST","functions/deleteBook.php",true);
  		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  		xmlhttp.send(data);
			}
}




function likePressed(bookType,bookId){

var like=document.getElementById("like").src;
if(like=="http://localhost/BibliotekaOnline/images/app/likeEmpty.png"){
  
  xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
   
            var nrOfLikes=parseInt(document.getElementById("nrOfLikes").innerHTML);
            nrOfLikes++;
            document.getElementById("nrOfLikes").innerHTML=nrOfLikes;
            document.getElementById("like").src="http://localhost/BibliotekaOnline/images/app/likeFilled.png";

        
        
      }
    }
  

  var data="bookId="+bookId+"&like=1&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}


else if(like=="http://localhost/BibliotekaOnline/images/app/likeFilled.png"){
  
        xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
            var nrOfLikes=parseInt(document.getElementById("nrOfLikes").innerHTML);
            nrOfLikes--;
            document.getElementById("nrOfLikes").innerHTML=nrOfLikes;
            document.getElementById("like").src="http://localhost/BibliotekaOnline/images/app/likeEmpty.png";
        
        
      }
    }
  

  var data="bookId="+bookId+"&like=0&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);


  }

}



function favouritePressed(bookType,bookId){
  
var favourite=document.getElementById("favourite").src;
if(favourite=="http://localhost/BibliotekaOnline/images/app/favouriteEmpty.png"){


xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
     
            document.getElementById("favourite").src="http://localhost/BibliotekaOnline/images/app/favouriteFilled.png";
        
        
      }
    }
  

  var data="bookId="+bookId+"&favourite=1&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);



  }





else if(favourite=="http://localhost/BibliotekaOnline/images/app/favouriteFilled.png"){


xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      
      
            document.getElementById("favourite").src="http://localhost/BibliotekaOnline/images/app/favouriteEmpty.png";
        
        
      }
    }
  

  var data="bookId="+bookId+"&favourite=0&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);





  }
}





function editReview(bookType,bookId){
  document.getElementById("postBtn").style="display:inline";
  

  xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        
        var reviewText=this.responseText.substring(2,this.responseText.length);
        document.getElementById("review").value=reviewText;
        document.getElementById("review").readOnly=false;
        document.getElementById("review").focus();
        
      }
    }
  

  var data="bookId="+bookId+"&editReview=true"+"&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}


function postReview(bookType,bookId){
  var review=document.getElementById("review").value;
if(review==""){
  document.getElementById("errorMsg").innerHTML="nuk mund te beni review bosh";
  return;
}
xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      
            if(bookType=="offlineBook"){
              window.location="book.php?isbn="+bookId;
            }
            else{
              window.location="book.php?id="+bookId;
            }

        
        
      }
    }
  

  var data="bookId="+bookId+"&review="+review+"&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);


  
}


function deleteReview(bookType,bookId){
xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      
            if(bookType=="offlineBook"){
              window.location="book.php?isbn="+bookId;
            }
            else{
              window.location="book.php?id="+bookId;
            }

        
        
      }
    }
  

  var data="bookId="+bookId+"&delete="+"true"+"&bookType="+bookType;
 xmlhttp.open("POST","functions/bookReview.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);


  
}