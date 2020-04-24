if(localStorage.getItem("ndryshimNeRadioButton")!=null){
	localStorage.clear();
	location.reload();
}
var div=0;
var slideAktual=[1,1];
var slideName=["online","offline"];
showSlide(1);


function ndryshoDiv(numberOfDiv){
	localStorage.setItem("ndryshimNeRadioButton","ndryshimNeRadioButton");
  slideAktual[div]=1;
  hideSlide(div);
  div+=numberOfDiv;
  showSlide(1);
}

function slide(numberOfSlide){
      slideAktual[div]+=numberOfSlide;
      showSlide(slideAktual[div]);
  }

	

function hideSlide(numberOfDiv){
var i;
var slides = document.getElementsByClassName(slideName[numberOfDiv]);
for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
}


	function showSlide(numberOfSlide){
  var i;

  var slides = document.getElementsByClassName(slideName[div]);
  var nrOfChilds=slides[slides.length-1].childElementCount;
  if(numberOfSlide==slides.length && nrOfChilds==0){
    slideAktual[div]=slideAktual[div]-1;
  }
  if (numberOfSlide > slides.length) {slideAktual[div] = slideAktual[div]-1}

    //kur shkon mbrapa slide divi s ka element;
  if (numberOfSlide < 1 && nrOfChilds==0) {
    slideAktual[div] = 1;
  }
  else if(numberOfSlide<1 && nrOfChilds!=0){
    slideAktual[div]=1;
  }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
 
  slides[slideAktual[div]-1].style.display = "block";
	}




