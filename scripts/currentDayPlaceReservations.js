var libraryId="";

function check(){
	if(libraryId!=""){
		return true;
	}
	else{
		return false;
	}
	
}

function showSeats() {
	document.getElementById("seatResult").innerHTML="";
	if(!check()){
		return;
	}
	else{

 xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      	response=this.responseText;
        document.getElementById("seatResult").innerHTML=this.responseText;
      }
    }
  }

  var data="libraryHall="+libraryId;
 xmlhttp.open("POST","../functions/librarian/currentDaySeats.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);



	}

}







function libraryHallChange(library){
	reservedSeatId="";
	libraryId=library;
	showSeats();
	
}


function showReservation(userId) {

	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      	response=this.responseText;
        document.getElementById("userResult").innerHTML=this.responseText;
      }
    }
  }

  var data="userId="+userId;
 xmlhttp.open("POST","../functions/librarian/showUser.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
	
}



function fshiRezervimin(userId){
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      	response=this.responseText;
        document.getElementById("userResult").innerHTML=this.responseText;
        showSeats();
      }
    }
  }

  var data="userId="+userId+"&delete=true";
 xmlhttp.open("POST","../functions/librarian/showUser.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}

