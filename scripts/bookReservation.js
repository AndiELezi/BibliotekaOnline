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