var libraryId="";
var month="";
var date="";
var startTime=document.getElementById("startTime").value;
var endTime=document.getElementById("endTime").value;
var response="";
var reservedSeatId="";


function check(){
	if(libraryId!="" && month!="" && date!="" && startTime!="" && endTime!=""){
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

  var data="libraryHall="+libraryId+"&month="+month+"&date="+date+"&startTime="+startTime+"&endTime="+endTime;
 xmlhttp.open("POST","functions/seatScheme.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);



	}

}



function monthChange(muaji) {
reservedSeatId="";	
month=muaji;
showSeats();
var nrOfDays=document.getElementById("data");
var option = document.createElement("option");
option.text ="31";
option.value="31";
option.id="31";
var option1=document.getElementById("31");
if(option1==null){
	
	if(muaji<=7 && muaji%2==1){
		nrOfDays.add(option);
	}
	else if(muaji>7 && muaji%2==0){
		nrOfDays.add(option);
	}
}
else if(option1!=null){
	if(muaji<=7 && muaji%2==0){
		nrOfDays.remove(nrOfDays.length-1);
	}
	else if(muaji>7 && muaji%2==1){
		nrOfDays.remove(nrOfDays.length-1);
	}
}


}




function libraryHallChange(library){
	reservedSeatId="";
	libraryId=library;
	showSeats();
	
}




function dateChange(data){
	reservedSeatId="";
	date=data;
	showSeats();
}




function startTimeChange(kohaFillimit) {
	reservedSeatId="";
	startTime=kohaFillimit;
	showSeats();
}




function endTimeChange(kohaPerfundimit) {
	reservedSeatId="";
	endTime=kohaPerfundimit;
	showSeats();
}


function selectSeat(placeId){
	if(placeId==reservedSeatId){
		document.getElementById("seatResult").innerHTML=response;
		reservedSeatId="";
		
	}
	else{
		 document.getElementById("seatResult").innerHTML=response;
  		 document.getElementById(placeId).src="/BibliotekaOnline/images/app/selectedSeat.png";
  		 reservedSeatId=placeId;
	}

}


function reserve() {
	var result = confirm("Are sure u want to reserve this place?");
if (result) {

    	if(!checkReservation()){
		document.getElementById("reservationResponse").innerHTML="<span class='error'>Ju lutem plotesoni te gjitha fushat dhe zgjidhni vendin qe deshironi te rezervoni</span>";
		return;

	}
	else{
	
		xmlhttp=new XMLHttpRequest();
    	xmlhttp.onreadystatechange=function() {
				
    	if (this.readyState==4 && this.status==200) {

      		if(this.responseText!=""){

        		document.getElementById("reservationResponse").innerHTML=this.responseText;
      }
    }
  }

  var data="libraryHall="+libraryId+"&month="+month+"&date="+date+"&startTime="+startTime+"&endTime="+endTime+"&reservedSeatId="+reservedSeatId;
 xmlhttp.open("POST","functions/placeReservationDatabase.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);




		}
	}
	
}


function checkReservation() {
	if(check() && libraryId!="default" && month!="default" && date!="default" && reservedSeatId!=""){
		return true;
	}
	else{
		return false;
	}
}