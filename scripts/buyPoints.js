var stripe = Stripe('pk_test_nxXAxP4aqo26J985bPx8SSgw00PC6490zt');
		
		function paketa1(idSess) {
		var id=idSess;
			stripe.redirectToCheckout({
  // Make the id field from the Checkout Session creation API response
  // available to this file, so you can provide it as parameter here
  // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
  sessionId: id
}).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  // using `result.error.message`.
});
}



	function paketa2(idSess) {
		var id=idSess;
			stripe.redirectToCheckout({
  // Make the id field from the Checkout Session creation API response
  // available to this file, so you can provide it as parameter here
  // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
  sessionId: id
}).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  // using `result.error.message`.
});
}




	function paketa3(idSess) {
		var id=idSess;
			stripe.redirectToCheckout({
  // Make the id field from the Checkout Session creation API response
  // available to this file, so you can provide it as parameter here
  // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
  sessionId: id
}).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  // using `result.error.message`.
});
}
