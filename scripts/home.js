function liveSearch(text){
  if(text==""){
    document.getElementById("liveSearchResult").innerHTML="";
    document.getElementById("liveSearchResult").style.border="0px";
    return;
  }
var filteri=document.getElementById("filter").value;
xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
        document.getElementById("liveSearchResult").innerHTML=this.responseText;
        document.getElementById("liveSearchResult").style.border="solid 1px";
        
      }
      else{
        document.getElementById("liveSearchResult").innerHTML="s ka rezulte";
      }
    }
  }

xmlhttp.open("GET","functions/liveSearchHome.php?searchQuery="+text+"&filter="+filteri,true);
 xmlhttp.send();


}