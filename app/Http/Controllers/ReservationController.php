<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use DB;

use App\Rooms;

use App\Reservations;

use Carbon\Carbon;

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
    public function index($room_id){
        
    	return view('reservation_entry', ['id' => $room_id]);
    }

    public function payment_create(Request $request){

        $apiContext = new \PayPal\Rest\ApiContext(
          new \PayPal\Auth\OAuthTokenCredential(
            'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
            'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
          )
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName($request->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku($request->id) // Similar to `item_number` in Classic API
            ->setPrice($request->total);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->total);
            //->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());


        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://127.0.0.1:8000/")
            ->setCancelUrl("http://127.0.0.1:8000/");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try{
            $payment->create($apiContext);
        }catch(Exception $ex){
            echo $ex;
            exit(1);
        }

        return $payment;

        //return $request->total;
		
    }

    public function payment_execute(Request $request){
    	
    }

    public function reservation_info(){
        
    }

    public function calendar(){
        $array_data = array(array());
        $reservations = new Reservations;

        //$rooms = new Rooms;

        $get_data = $reservations::where('tag_deleted', '=', 0)->get();

        foreach($get_data as $data => $key){
            $events = array(
                'title' => $key->fetch_information->room_name,
                'start' => $key->date_start,
                'end' => $key->date_end,
            );

            array_push($array_data, $events);

        }

        return response()->json($array_data);
    }

    /*public function confirmation(Request $request){
        $room_name = $request->input('room');
        $date_start = $request->input('date_start');
        $first_name = $request->input('firstname');
        $last_name = $request->input('lastname');
        $email = $request->input('email');

        //$get_data = $request->all();

        return view('confirmation', [
            'room' => $room_name,
            'firstname' => $first_name,
            'lastname' => $last_name,
            'email' => $email
        ]);
    }*/

    public function validate_entry(Request $request){
        $reservations = new Reservations;
        $rooms = new Rooms;

        $room = $request->input('room');

        $room_data = $rooms::find($room)->fetch_information2;
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $date_start);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $date_end);

        $diff_in_days = $to->diffInDays($from);
        
        $total_in_ph = $diff_in_days * $room_data->room_price;

        $total_in_us = $total_in_ph * 0.019;

        $validation = $reservations::whereBetween('date_start', [$date_start, $date_end])->where('tag_deleted', '=', 0)->get();

        //$check_date = $reservations::whereBetween('date_start', [$date_start, $date_end])->whereBetween('date_end', [$date_start, $date_end])->where('tag_deleted', '=', 0)->get();

        //$filter = $check_date->all();

        if($validation->isEmpty()){
            $datas[] = array(
                'room_id' => $room,
                'room_name' => $room_data->room_name,
                'date_start' => $date_start,
                'date_end' => $date_end,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'room_price' => $room_data->room_price,
                'total_in_ph' => $total_in_ph,
                'total_in_us' => $total_in_us
            );

            return view('confirmation', compact('datas'));

            //return redirect()->route('confirmation')->with('datas', $datas);

            //var_dump($datas);
        }
        else{
            return view('index');
        }
    }

    
}
