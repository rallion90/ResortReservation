<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class ReservationController extends Controller
{
    public function index(){
    	return view('reservation_entry');
    }

    public function payment_create(Request $request){
    	$room_price = $request->input('room_id');
    	$room_name = $request->input('room_name');
    	$room_price = $request->input('room_price');

    	$api = new \PayPal\Rest\ApiContext(

    		new \PayPal\Auth\OAuthTokenCredential(
    			'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
    			//Client Id
    			'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
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

		

		$details = new Details();
		$details->setShipping(1.2)
    		->setTax(1.3)
    		->setSubtotal(17.50);

    	$amount = new Amount();
		$amount->setCurrency("USD")
    		->setTotal(20)
    		->setDetails($details);

    	$transaction = new Transaction();
		$transaction->setAmount($amount)
    		->setItemList($itemList)
    		->setDescription("Payment description")
    		->setInvoiceNumber(uniqid());

		$redirectUrls = new RedirectUrls();
		

    	$redirectUrls->setReturnUrl("http://127.0.0.1:8000/sadyaya/home")
    		->setCancelUrl("http://127.0.0.1:8000/sadyaya/home");

    	$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));

		$request = clone $payment;
		$payment->create($api);

		return $payment;
    }

    public function payment_execute(Request $request){
    	/*$api = new \PayPal\Rest\ApiContext(

    		new \PayPal\Auth\OAuthTokenCredential(
    			'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
    			//Client Id
    			'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
    			//Client Secret
    		)
    	);

    	$payment_id = $request->paymentID;
    	$payment = Payment::get($payment_id, $api);

    	$execution = new PaymentExecution();
    	$execution->setPayerId($request->payerID);

    	$transaction = new Transaction();
    	$amount = new Amount();
    	$details = new Details();

    	$details->setShipping(2.2)
        	->setTax(1.3)
        	->setSubtotal(17.50);

        $amount->setCurrency('USD');
    	$amount->setTotal(21);
    	$amount->setDetails($details);
    	$transaction->setAmount($amount);

    	$execution->addTransaction($transaction);

    	$result = $payment->execute($execution, $api);

    	return $result;*/

    	return $request->paymentID;
    }
}
