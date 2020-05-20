var dataFillimit="";
var dataMbarimit="";
pageNr=1;
window.onload=function() {
	displayReservations();

}

function startDateChange(data){
	dataFillimit=data;
	pageNr=1;
	displayReservations();

}

function endDateChange(data){
	dataMbarimit=data;
	pageNr=1;
	displayReservations();
}
function changePageNr(pageNR) {
	pageNr=pageNR;
	displayReservations();
}

function displayReservations(){

	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
        document.getElementById("allBookReservations").innerHTML=this.responseText;
        
      }
    }
  }
  var data="startDate="+dataFillimit+"&endDate="+dataMbarimit+"&pageNr="+pageNr;
 xmlhttp.open("POST","../functions/librarian/fullBookReservations.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}