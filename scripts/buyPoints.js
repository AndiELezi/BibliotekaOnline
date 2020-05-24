var stripe = Stripe('pk_test_nxXAxP4aqo26J985bPx8SSgw00PC6490zt');


function bliPaketen(paketa) {

	var result = confirm("Are you sure you want to buy this package?");
if (result) {
  document.getElementById("loader").style.visibility="visible";
   xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText!=""){
      			stripe.redirectToCheckout({
 					sessionId: this.responseText
					}).then(function (result) {
  
						});
      }
    }
  }

  var data="paketa="+paketa;
 xmlhttp.open("POST","functions/checkoutSession.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
}

	

}

