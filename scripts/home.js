var slideAktual=[1,1,1,1,1];
var slideName=["slidet1","slidet2","slidet3","slidet4","slidet5"];

function funksionTest(){
  alert("hello");
}



for(var i=0;i<5;i++){
	showSlide(1,i);
}

	function slide(n,nS){
			slideAktual[nS]+=n;
			showSlide(slideAktual[nS],nS);
	}

	function showSlide(n,nS){
  var i;

  var slides = document.getElementsByClassName(slideName[nS]);
  var nrOfChilds=slides[slides.length-1].childElementCount;
  if(n==slides.length && nrOfChilds==0){
    slideAktual[nS]=1;
  }
  if (n > slides.length) {slideAktual[nS] = 1}

    //kur shkon mbrapa slide divi s ka element;
  if (n < 1 && nrOfChilds==0) {
    slideAktual[nS] = slides.length-1;
  }
  else if(n<1 && nrOfChilds!=0){
    slideAktual[nS]=slides.length;
  }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
 
  slides[slideAktual[nS]-1].style.display = "block";
	}


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
    }
  }

xmlhttp.open("GET","functions/liveSearchHome.php?searchQuery="+text+"&filter="+filteri,true);
 xmlhttp.send();


}