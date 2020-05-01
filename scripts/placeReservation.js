var libraryId="";
var month="";
var date="";
var startTime=document.getElementById("startTime").value;
var endTime=document.getElementById("endTime").value;

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
	libraryId=library;
	showSeats();
	
}




function dateChange(data){
	date=data;
	showSeats();
}




function startTimeChange(kohaFillimit) {
	startTime=kohaFillimit;
	showSeats();
}




function endTimeChange(kohaPerfundimit) {
	endTime=kohaPerfundimit;
	showSeats();
}