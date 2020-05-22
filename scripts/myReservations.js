window.onload=function(){
	showBookReservation();
	showPlaceReservation();
	
};

function showBookReservation(){
	
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("bookReservation").innerHTML=this.responseText;
        
      }
    }
  }

 xmlhttp.open("POST","functions/myBookReservations.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send();
}


function showPlaceReservation() {

	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("placeReservation").innerHTML=this.responseText;
      }
    }
  }

 xmlhttp.open("POST","functions/myPlaceReservation.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send();
}




function deleteBookReservation(bookId,userId) {

	var result = confirm("Are u sure u want to delete this reservation?");
if (result) {
   xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("bookReservation").innerHTML=this.responseText;
      }
    }
  }
  data="delete=true"+"&bookId="+bookId+"&userId="+userId;
 xmlhttp.open("POST","functions/myBookReservations.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}

	
}


function deletePlaceReservation(){
	var result = confirm("Are u sure u want to delete this reservation?");
if (result) {
   xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("placeReservation").innerHTML=this.responseText;
      }
    }
  }
  data="delete=true";
 xmlhttp.open("POST","functions/myPlaceReservation.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}
	
}