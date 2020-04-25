function kerko(str) {
	 if (str.length==0) {
    document.getElementById("rezultatet").innerHTML="";
    document.getElementById("rezultatet").style.border="0px";
    return;
  }

  xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      document.getElementById("rezultatet").innerHTML=this.responseText;
      document.getElementById("rezultatet").style.border="2px solid ";
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
  var data='isbn='+isbn+"&dataRezervimit="+dataRezervimit+"&dataRikthimit="+dataRikthimit;
  xmlhttp.open("POST","functions/bookReservationDatabase.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
  //ktu bojm na nje div me klas animimi   
  document.getElementById("test").innerHTML="loading";
  });
});
