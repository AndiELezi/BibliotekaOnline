function kerko(str) {
  document.getElementById("selectedBook").style.display="none";
	 if (str.length==0) {
    document.getElementById("selectedBook").style.display="block";
    document.getElementById("rezultatet").innerHTML="";
    document.getElementById("rezultatet").style.border="0px";
    return;
  }

  xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      document.getElementById("rezultatet").innerHTML=this.responseText;
      }
      else{
        document.getElementById("rezultatet").innerHTML="s ka rezulte";
      }
    }
  }
  xmlhttp.open("GET","functions/liveSearchBook.php?searchQuery="+str,true);
  xmlhttp.send();
}




$(document).ready(function(){
  $("#rezervo").click(function(){
    var result = confirm("Are sure u want to reserve this book?");
if (result) {
     var isbn=$("#isbn").val();
    var dataRezervimit=$("#dataRezervimit").val();
    var dataRikthimit=$("#dataRikthimit").val();
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("test").innerHTML="";
        document.getElementById("pergjigjaRezervimit").innerHTML=this.responseText;
      }
      else{
      }
    }
  }
  var data='isbn='+isbn+"&dataRezervimit="+dataRezervimit+"&dataRikthimit="+dataRikthimit+"&aksesimi=true";
  xmlhttp.open("POST","functions/bookReservationDatabase.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
  //ktu bojm na nje div me klas animimi   
  document.getElementById("test").innerHTML="loading";
}
  });
});
