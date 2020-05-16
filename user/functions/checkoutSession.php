<?php

	$paketat = array( 
		"paketa1"=>array(
			"emri"=>"100 pike",
			"cmimi"=>1000	
			),
		"paketa2"=>array(
			"emri"=>"500 pike",
			"cmimi"=>4000	
			),
		"paketa3"=>array(
			"emri"=>"1000 pike",
			"cmimi"=>7500	
			)

	);

		/*foreach ($paketat as $key => $value) {
		echo $value["emri"];
	}*/

	$i=0;
	$product=array();
	$price=array();
	$session=array();



	include 'stripe-php-master/init.php';
\Stripe\Stripe::setApiKey('sk_test_4lpdj1iXzTbILew0q8F2Bd87004syDICVz');


/****************paketa 1******************************/
	$paketa1 = \Stripe\Product::create([
  'name' => '100 points',
]);

$cmimi1 = \Stripe\Price::create([
  'product' => $paketa1,
  'unit_amount' => 1000,
  'currency' => 'usd',
]);

$session1 = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price' => $cmimi1,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/BibliotekaOnline/user/tmpThankYou.php?paketa=paketa1',
  'cancel_url' => 'http://localhost/BibliotekaOnline/user/buyPoints.php',
]);


/*********************Paketa 2************************************/

$paketa2 = \Stripe\Product::create([
  'name' => '500 points',
]);

$cmimi2 = \Stripe\Price::create([
  'product' => $paketa2,
  'unit_amount' => 4000,
  'currency' => 'usd',
]);

$session2 = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price' => $cmimi2,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/BibliotekaOnline/user/tmpThankYou.php?paketa=paketa2',
  'cancel_url' => 'http://localhost/BibliotekaOnline/user/buyPoints.php',
]);


/***********************Paketa 3*******************************/
$paketa3 = \Stripe\Product::create([
  'name' => '1000 points',
]);

$cmimi3 = \Stripe\Price::create([
  'product' => $paketa3,
  'unit_amount' => 7500,
  'currency' => 'usd',
]);

$session3 = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price' => $cmimi3,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/BibliotekaOnline/user/tmpThankYou.php?paketa=paketa3',
  'cancel_url' => 'http://localhost/BibliotekaOnline/user/buyPoints.php',
]);

?>