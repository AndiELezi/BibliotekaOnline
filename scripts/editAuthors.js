function updateAuthors() {
var inputs=document.getElementsByTagName("input");
var data="";
	for(var i=0;i<inputs.length;i++){
		if(i==0){
			data+=inputs[i].name+"="+inputs[i].value;
		}
		else{
			data+="&"+inputs[i].name+"="+inputs[i].value;
		}

	}


xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
        document.getElementById("editAuthor").innerHTML=this.responseText;
        
      }
    }
  }
 xmlhttp.open("POST","updateAuthorsDatabase.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);


}