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
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{ ucwords($data['room_name']) }}</td>
                                        <td class="text-center">{{ $data['date_start'] }}</td>
                                        <td class="text-center">{{ $data['date_end'] }}</td>
                                        <td class="text-right">₱{{ number_format($data['room_price']) }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        <td class="highrow text-right">₱{{ number_format($data['total']) }}</td>
                                    </tr>

                                    
                                    <tr>
                                        <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Total</strong></td>
                                        <td class="emptyrow text-right">₱{{ number_format($data['total']) }}</td>
                                    </tr>
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

			    style: {
			        size: 'medium',
			        color: 'gold',
			        shape: 'pill'
			    },
			    // Set up the payment:
			    // 1. Add a payment callback
			    payment: function(data, actions) {
			      // 2. Make a request to your server
			      return actions.request.post('/reservation/payment_create',{
			        _token: '{{csrf_token()}}'
			      }).then(function(res) {
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
			        payerID:   data.payerID
			      })
			        .then(function(res) {
			          //alert('Transaction Succesful');
			        });
			    }
			}, '#paypal-button');
		
			

	
  
</script>