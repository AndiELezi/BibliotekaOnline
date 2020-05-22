<?php
  if(!isset($_POST["paketa"])){
  echo "You dont have acces here";
  exit();
}
  $paketaClient=$_POST["paketa"];
  $emri;
  $pagesa;

  if($paketaClient=="paketa1"){
    $emri='100 points';
    $pagesa=1000;
  }
  
  else if($paketaClient=="paketa2"){
      $emri='500 points';
      $pagesa=4000;
  } 
  else if($paketaClient=="paketa3"){
      $emri='1000 points';
      $pagesa=7500;
  }
  

	include 'StripeApi/init.php';
\Stripe\Stripe::setApiKey('sk_test_4lpdj1iXzTbILew0q8F2Bd87004syDICVz');


/****************paketa 1******************************/
	$paketa = \Stripe\Product::create([
  'name' => $emri,
]);

$cmimi = \Stripe\Price::create([
  'product' => $paketa,
  'unit_amount' => $pagesa,
  'currency' => 'usd',
]);

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price' => $cmimi,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/BibliotekaOnline/user/tmpThankYou.php?paketa='.$paketaClient,
  'cancel_url' => 'http://localhost/BibliotekaOnline/user/buyPoints.php',
]);

echo $session["id"];


?>