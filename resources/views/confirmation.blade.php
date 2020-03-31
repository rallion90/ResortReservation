<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Please Confirm your Reservation</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap3.min.css') }}" type="text/css">
</head>
<style>
    html,
    body {
        height: 100%;
    }

    .container {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
</style>

<body>
    <br>
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center"><strong>Reservation Details</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Room Name</strong></td>
                                        <td class="text-center"><strong>In</strong></td>
                                        <td class="text-center"><strong>Out</strong></td>
                                        <td class="text-right"><strong>Room Price</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                <form method="post">
                                    
                                    <tr>
                                        <td>{{ ucwords($data['room_name']) }}</td>
                                        <td class="text-center">{{ $data['date_start'] }}</td>
                                        <td class="text-center">{{ $data['date_end'] }}</td>
                                        <td class="text-right">₱{{ number_format($data['room_price']) }}</td>
                                        <input type="hidden" id="room_id" name="room_id" value="{{ $data['room_id'] }}">
                                        <input type="hidden" id="room_name" name="room_name" value="{{ $data['room_name'] }}">
                                        <input type="hidden" name="date_start" value="{{ $data['date_start'] }}">
                                        <input type="hidden" name="date_end" value="{{ $data['date_end'] }}">
                                        <input type="hidden" name="room_price" value="{{ $data['room_price'] }}">

                                        <!-- data information users-->
                                        <input type="hidden" name="firstname" value="{{ $data['firstname'] }}">
                                        <input type="hidden" name="lastname" value="{{ $data['lastname'] }}">
                                        <input type="hidden" name="email" value="{{ $data['email'] }}">
                                    </tr>
                                   
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        <td class="highrow text-right">₱{{ number_format($data['total_in_ph']) }}</td>
                                        <input type="hidden" name="subtotal" value="{{ $data['total_in_us'] }}">
                                    </tr>

                                    
                                    <tr>
                                        <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Total</strong></td>
                                        <td class="emptyrow text-right">₱{{ number_format($data['total_in_ph']) }}</td>
                                        
                                        <input type="hidden" id="total" name="total" value="{{ $data['total_in_us'] }}">
                                    </tr>
                                    <div id="paypal-button"></div>
                                    <!--<div class="container"><button>Submit</button></div>-->
                                    <button>Submit</button>
                                </form>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    // Set up the payment:
    // 1. Add a payment callback
    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/reservation/payment_create',
      {
        _token: '{{csrf_token()}}',
        total: document.getElementById('total').value,
        name: document.getElementById('room_name').value,
        id: document.getElementById('room_id').value
      })
        .then(function(res) {
          // 3. Return res.id from the response
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/reservation/payment_execute', {
        _token: '{{csrf_token()}}',
        paymentID: data.paymentID,
        payerID:   data.payerID,
        firstname: document.getElementById('firstname').value,
        lastname: document.getElementById('lastname').value,
        email: document.getElementById('email').value
      })
        .then(function(res) {
          // 3. Show the buyer a confirmation message.
            alert("Payment Success");
        });
    }
  }, '#paypal-button');
</script>