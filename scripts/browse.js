var bookType="default";
var category="default";
var author="default";
var user="default";
var year="default";
var orderBy="default";
var publishHouse="default";
var pageNr=1;


window.onload=function () {
	
	document.getElementById("orderBy").style="display:none"; 	 //mund t na duhet me von

	bookType=document.getElementById("bookType").value;
	category=document.getElementById("category").value;
	author=document.getElementById("author").value;
	user=document.getElementById("user").value;
	year=document.getElementById("year").value;
	publishHouse=document.getElementById("publishHouse").value;

	if(bookType=="default"){
	document.getElementById("publishHouse").style="display:none";
	document.getElementById("author").style="display:none";
	document.getElementById("user").style="display:none";
	}
	else if(bookType=="onlineBooks"){
	document.getElementById("publishHouse").style="display:none";
	document.getElementById("author").style="display:none";
	document.getElementById("user").style="display:inline";
	}

	else if(bookType=="offlineBooks"){
	document.getElementById("publishHouse").style="display:inline";
	document.getElementById("author").style="display:inline";
	document.getElementById("user").style="display:none";
	}

	
	displayBooks();
}



function displayBooks(){

	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
   
    if (this.readyState==4 && this.status==200) {

      if(this.responseText!=""){
        document.getElementById("bookResult").innerHTML=this.responseText;
        
      }
    }
  }

  var data="";
  if(bookType=="default"){
    data="pageNr="+pageNr+"&bookType="+bookType+"&category="+category+"&year="+year;

  }
  else if(bookType=="onlineBooks"){
  	data="pageNr="+pageNr+"&bookType="+bookType+"&category="+category+"&year="+year+"&user="+user;
  }
  else if(bookType=="offlineBooks"){
  	data="pageNr="+pageNr+"&bookType="+bookType+"&category="+category+"&year="+year+"&author="+author+"&publishHouse="+publishHouse;
  }
  
 xmlhttp.open("POST","functions/bookBrowse.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}



function bookTypeChange(llojiLibrit){

	pageNr=1;
	if(llojiLibrit=="onlineBooks"){
		bookType=llojiLibrit;
		document.getElementById("publishHouse").style="display:none";
		publishHouse="default";
		document.getElementById("publishHouse").selectedIndex=0;

		document.getElementById("author").style="display:none";
		author="default";
		document.getElementById("author").selectedIndex=0;

		document.getElementById("user").style="display:inline";
	}

	else if(llojiLibrit=="offlineBooks"){
		bookType=llojiLibrit;
		document.getElementById("author").style="display:inline";
		document.getElementById("publishHouse").style="display:inline";
		document.getElementById("user").style="display:none";
		user="default";
		document.getElementById("user").selectedIndex=0;
	}
	else if(llojiLibrit=="default"){
		bookType=llojiLibrit;
		document.getElementById("publishHouse").style="display:none";
		document.getElementById("author").style="display:none";
		document.getElementById("user").style="display:none";
		publishHouse="default";
		author="default";
		user="default";
		document.getElementById("publishHouse").selectedIndex=0;
		document.getElementById("author").selectedIndex=0;
		document.getElementById("user").selectedIndex=0;

	}
	displayBooks();
 
}

function categoryChange(kategoria) {
	pageNr=1;
	category=kategoria;
	displayBooks();
}

function authorChange(autori) {
	pageNr=1;
	author=autori;
	displayBooks();
}

function userChange(perdoruesi) {
	pageNr=1;
	user=perdoruesi;
	displayBooks();
}

function yearChange(viti) {
	pageNr=1;
	year=viti;
	displayBooks();
}

function publishHouseChange(shtepiaPublikuese) {
	pageNr=1;
	publishHouse=shtepiaPublikuese;
	displayBooks();
}

function orderByChange(rendit) {
	pageNr=1;
	displayBooks();
}

function pageNrChange(nrFaqes){
	pageNr=nrFaqes;
	displayBooks();
}