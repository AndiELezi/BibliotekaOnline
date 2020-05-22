var isbn;
function findBook() {
	isbn= document.getElementById("isbn").value;
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
       document.getElementById("rezultati").innerHTML=this.responseText;
        
      }
    }
  }
  var data="isbn="+isbn;
 xmlhttp.open("POST","../functions/librarian/updateOfflineBook.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}



function allowEdit(id){
	document.getElementById(id).readOnly=false;
}



function updateBook() {
	var titulli=document.getElementById("title").value;
	var quantity=document.getElementById("quantity").value;
	var price=document.getElementById("price").value;
	var points=document.getElementById("points").value;
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
       document.getElementById("rezultati").innerHTML=this.responseText;
        
      }
    }
  }
  var data="isbn="+isbn+"&update=true"+"&title="+titulli+"&quantity="+quantity+"&price="+price+"&reservation_points="+points;
 xmlhttp.open("POST","../functions/librarian/updateOfflineBook.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}



function deleteBook() {
  xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
       document.getElementById("rezultati").innerHTML=this.responseText;
        
      }
    }
  }
  var data="isbn="+isbn+"&delete=true";
 xmlhttp.open("POST","../functions/librarian/updateOfflineBook.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}