var slideAktual=[1,1,1,1,1];
var slideName=["slidet1","slidet2","slidet3","slidet4","slidet5"];

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