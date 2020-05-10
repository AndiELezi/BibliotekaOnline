var bookType="default";
var category="default";
var author="default";
var user="default";
var year="default";
var orderBy="default";
var publishHouse="default";
var pageNr=1;


window.onload=function () {
	document.getElementById("publishHouse").style="display:none";
	document.getElementById("author").style="display:none";
	document.getElementById("user").style="display:none";
	document.getElementById("orderBy").style="display:none"; 	 //mund t na duhet me von
	if(localStorage.getItem("browse")==null){
		checkData();
		setDataInLocalStorage();
	}
	else{
		localStorage.removeItem("browse");
		localStorage.removeItem("bookType");
		localStorage.removeItem("category");
		localStorage.removeItem("year");
		localStorage.removeItem("author");
		localStorage.removeItem("user");
		localStorage.removeItem("publishHouse");
	}

	
	displayBooks();
}

/*-------------------------------------------------------*/

function setDataInLocalStorage(){
	if(bookType!="default"){
		localStorage.setItem("bookType",bookType);
		

	}
	if(category!="default"){
		localStorage.setItem("category",category);
		
	}
	if(year!="default"){
		localStorage.setItem("year",year);
		
	}
	if(author!="default"){
		localStorage.setItem("author",author);
		
	}
	if(user!="default"){
		localStorage.setItem("user",user);
		
	}
	if(publishHouse!="default"){
		localStorage.setItem("publishHouse",publishHouse);
		
	}
}

function checkData(){

	if(localStorage.getItem("bookType")!=null){
		bookType=localStorage.getItem("bookType");
		if(bookType=="onlineBooks"){
			document.getElementById("user").style="display:inline";
		}
		else if(bookType=="offlineBooks"){
			document.getElementById("publishHouse").style="display:inline";
			document.getElementById("author").style="display:inline";
		}
		
		localStorage.removeItem("bookType");
		setSelected(bookType,"bookType");

	}

	if(localStorage.getItem("category")!=null){
		category=localStorage.getItem("category");
		localStorage.removeItem("category");
		setSelected(category,"category");
	}

	if(localStorage.getItem("year")!=null){
		year=localStorage.getItem("year");	
		localStorage.removeItem("year");
		setSelected(year,"year");
	}
	if(localStorage.getItem("author")!=null){
		author=localStorage.getItem("author");
		localStorage.removeItem("author");
		setSelected(author,"author");
	}
	if(localStorage.getItem("user")!=null){
		user=localStorage.getItem("user");	
		localStorage.removeItem("user");
		setSelected(user,"user");
	}
	if(localStorage.getItem("publishHouse")!=null){
		publishHouse=localStorage.getItem("publishHouse");	
		localStorage.removeItem("publishHouse");
		setSelected(publishHouse,"publishHouse");
	}




}


function setSelected(vlera,id){

	var sel=document.getElementById(id);
	var opt=sel.options;
	for(var i=0;i<opt.length;i++){
		if(opt.value==vlera){
			sel.selectedIndex=i;
		}
	}
}






/*-------------------------------------------------------*/

/*nqs gjeni na nje gabim te metoda ime*/

function  resetSelects(){
	document.getElementById("bookType").selectedIndex=0;
	document.getElementById("category").selectedIndex=0;
	document.getElementById("author").selectedIndex=0;
	document.getElementById("user").selectedIndex=0;
	document.getElementById("year").selectedIndex=0;
	document.getElementById("publishHouse").selectedIndex=0;
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
	localStorage.setItem("bookType",bookType);
	displayBooks();
 
}

function categoryChange(kategoria) {
	pageNr=1;
	category=kategoria;
	localStorage.setItem("category",category);
	displayBooks();
}

function authorChange(autori) {
	pageNr=1;
	author=autori;
	localStorage.setItem("author",author);
	displayBooks();
}

function userChange(perdoruesi) {
	pageNr=1;
	user=perdoruesi;
	localStorage.setItem("user",user);
	displayBooks();
}

function yearChange(viti) {
	pageNr=1;
	year=viti;
	localStorage.setItem("year",year);
	displayBooks();
}

function publishHouseChange(shtepiaPublikuese) {
	pageNr=1;
	publishHouse=shtepiaPublikuese;
	localStorage.setItem("publishHouse",publishHouse);
	displayBooks();
}

function orderByChange(rendit) {
	pageNr=1;
	orderBy=rendit;
	displayBooks();
}

function pageNrChange(nrFaqes){
	pageNr=nrFaqes;
	displayBooks();
}