$(document).ready(function(){
  $("#searchText").focusout(function(){
    setTimeout(function() {
  //your code to be executed after 1 second
    document.getElementById("liveSearchResult").innerHTML="";
    }, 150);
  });

    $("#searchText").focusin(function(){
    liveSearch($(this).val());
  });
});


function liveSearch(text){
  if(text==""){
    document.getElementById("liveSearchResult").innerHTML="";
    return;
  }
var filteri=document.getElementById("filter").value;
xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
        document.getElementById("liveSearchResult").innerHTML=this.responseText;
        
      }
      else{
        document.getElementById("liveSearchResult").innerHTML="s ka rezulte";
      }
    }
  }

xmlhttp.open("GET","functions/liveSearchHome.php?searchQuery="+text+"&filter="+filteri,true);
 xmlhttp.send();


}