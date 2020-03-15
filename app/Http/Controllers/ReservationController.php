<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
    	return view('reservation_entry');
    }

    public function payment_create(){
    	$api = new \Paypal\Rest\ApiContext(

    		new \Paypal\Auth\OAuthTokenCredential(
    			'adiawhdiahdiwahdaiwhd',
    			//Client Id
    			'adwhawidhwaidhiwahd'
    			//Client Secret
    		)
    	);

    	$payer = new Payer();
    	$payer->setPaymentMethod("paypal");

    	$item1 = new Item();
    	$item1->setName('Ground Coffee 40 oz')
		    ->setCurrency('USD')
		    ->setQuantity(1)
		    ->setSku("123123") // Similar to `item_number` in Classic API
		    ->setPrice(7.5);
		$item2 = new Item();
		$item2->setName('Granola bars')
		    ->setCurrency('USD')
		    ->setQuantity(5)
		    ->setSku("321321") // Similar to `item_number` in Classic API
		    ->setPrice(2);

		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));

		

    	$amount = new Amount();
		$amount->setCurrency("USD")
    		->setTotal(20)
    		->setDetails($details);

    	$transaction = new Transaction();
		$transaction->setAmount($amount)
    		->setItemList($itemList)
    		->setDescription("Payment description")
    		->setInvoiceNumber(uniqid());

    	$baseUrl = getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
    		->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

    	$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));

		$request = clone $payment;

		try{
			$payment->create($apiContext);
		}catch(Exception $ex){
			ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
    		exit(1);
		}

		return $payment;
    }
}
