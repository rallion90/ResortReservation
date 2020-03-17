<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Balai Sadyaya - Resort</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles 
        template {{ URL::asset("fullcalendar/packages/core/main.css") }}
    -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    <!--full calendar-->
    <link href='{{ URL::asset("fullcalendar/core/main.css") }}' rel='stylesheet' />
    <link href='{{ URL::asset("fullcalendar/daygrid/main.css") }}' rel='stylesheet' />
    <link href='{{ URL::asset("fullcalendar/timegrid/main.css") }}' rel='stylesheet' />
    <link href='{{ URL::asset("fullcalendar/list/main.css") }}' rel='stylesheet' />

    <script src='{{ URL::asset("fullcalendar/core/main.js") }}'></script>
    <script src='{{ URL::asset("fullcalendar/interaction/main.js") }}'></script>
    <script src='{{ URL::asset("fullcalendar/daygrid/main.js") }}'></script>
    <script src='{{ URL::asset("fullcalendar/timegrid/main.js") }}'></script>
    <script src='{{ URL::asset("fullcalendar/list/main.js") }}'></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="{{ URL::asset('img/logo.png') }}" alt=""></a>
                </div>
                <div class="nav-right">
                    <a href="{{ route('rooms') }}" class="primary-btn">Make a Reservation</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./about-us.html">About</a></li>
                        <li><a href="rooms.html">Rooms</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="drop-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="rooms.html">Rooms</a></li>
                                <li><a href="services.html">Services</a></li>
                            </ul>
                        </li>
                        
                    @auth    
                        <li><a href="#">{{ Auth::user()->email }}</a>
                            <ul class="drop-menu">
                                <li><a href="/authentication/logout">Logout</a></li>    
                            </ul>
                        </li>
                    @endauth
                    
                    @guest
                        <li><a href="/authentication/login">Login</a></li>
                    @endguest    
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Area Section Begin -->
    <section class="hero-area set-bg" data-setbg="{{ URL::asset('img/hero-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero-text">
                        <h1>A Luxury Stay</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area Section End -->

    
    

    <!-- Intro Text Section Begin -->
    <section class="intro-section spad">
        @yield('content')
    </section>
    <!-- Home Page About Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logo.png" alt=""></a>
                        </div>
                        <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h5>Newsletter</h5>
                        <div class="newslatter-form">
                            <input type="text" placeholder="Your Email Here">
                            <button type="submit">Subscribe</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h5>Contact Info</h5>
                        <ul>
                            <li><img src="img/placeholder.png" alt="">1525 Boring Lane,<br />Los Angeles, CA</li>
                            <li><img src="img/phone.png" alt="">+1 (603)535-4592</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Rooms</a></li>
                            <li><a href="#">Facilities</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
<div class="row pt-5">
                    <div class="col-lg-12 ">
                        <div class="small text-white text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    @if(Session::has('login_success'))
        <script>alert("{{ Session::get('login_success') }} {{ ucwords(Auth::user()->fullname) }}!");</script>
    @endif



    <!-- Js Plugins -->
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
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

<script>

  /// FullCalendar Latest
// Script modified from the "theme.html" demo file

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '2020-02-12',
      editable: true,
      selectable: true,
      eventLimit: true, // allow "more" link when too many events
      events: '{{ route("calendar") }}',
      select: function(info){
        //alert('selected ' + info.startStr + ' to ' + info.endStr);
        //var date_start = info.startStr;
        //var date_end = info.endStr;
        $('#exampleModal').modal('show');
        $('#date_start').val(info.startStr);
        $('#date_end').val(info.endStr);
      }
    });

    calendar.render();
  });

</script>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });
</script>

@extends('layouts.modal')