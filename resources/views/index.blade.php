@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row intro-text">
		<div class="col-lg-6">
			<div class="intro-left">
				<div class="section-title">
					<span>a memorable holliday</span>
					<h2>A great stay in a<br /> lovely hotel.</h2>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
					labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
					viverra maecenas. Donec in sodales dui, a blandit nunc. Pellentesque id eros venenatis,
					sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur non,
				ultricies volutpat tellus.</p>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="intro-right">
				<p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra.</p>
				<a href="{{ route('rooms') }}" class="primary-btn">Make a Reservation</a>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Intro Text Section End -->
<!-- Facilities Section Begin -->
<section class="facilities-section">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">
			<div class="facilities-item set-bg" data-setbg="{{ URL::asset('img/faci-1.jpg') }}">
				<div class="fi-title">
					<h2>Luxury Suite Room</h2>
					<p>From $399</p>
				</div>
				<div class="fi-features">
					<div class="fi-info">
						<i class="flaticon-019-television"></i>
						<p>Smart TV</p>
					</div>
					<div class="fi-info">
						<i class="flaticon-029-wifi"></i>
						<p>High Wi-fii</p>
					</div>
					<div class="fi-info">
						<i class="flaticon-003-air-conditioner"></i>
						<p>AC</p>
					</div>
					<div class="fi-info">
						<i class="flaticon-036-parking"></i>
						<p>Parking</p>
					</div>
					<div class="fi-info">
						<i class="flaticon-007-swimming-pool"></i>
						<p>Pool</p>
					</div>
				</div>
				<a href="{{ route('rooms') }}" class="primary-btn">Make a Reservation</a>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="facilities-item set-bg fi-right" data-setbg="img/faci-2.jpg">
				<div class="fi-title">
					<h2>Infinity Pool</h2>
					<p>For all our guests</p>
				</div>
				<a href="{{ route('rooms') }}" class="primary-btn">Make a Reservation</a>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Facilities Section End -->
<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
<div class="container">
	<div class="row">
		<div class="section-title">
			<h2>Guestbook</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="testimonial-item">
				<div class="ti-time">
					02 / 02 / 2019
				</div>
				<h4>We loved our stay</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget
				sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare.</p>
				<div class="ti-author">
					<div class="author-pic">
						<img src="{{ URL::asset('img/author-1.png') }}" alt="">
					</div>
					<div class="author-text">
						<h6>JOHN DOE <span>Madrid</span></h6>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="testimonial-item">
				<div class="ti-time">
					02 / 02 / 2019
				</div>
				<h4>I will come back again</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<p>Ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget sapien ac,
				ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare.</p>
				<div class="ti-author">
					<div class="author-pic">
						<img src="{{ URL::asset('img/author-2.png') }}" alt="">
					</div>
					<div class="author-text">
						<h6>Maria Smith <span>Madrid</span></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Testimonial Section End -->
<!-- Video Section Begin -->
<div class="video-section">
<div class="video-bg set-bg" data-setbg="{{ URL::asset('img/video-bg.jpg') }}"></div>
<div class="container">
	<div class="video-text set-bg" data-setbg="{{ URL::asset('img/video-inside-bg.jpg') }}">
		<a href="https://www.youtube.com/watch?v=j56YlCXuPFU" class="pop-up"><i class="fa fa-play"></i></a>
	</div>
</div>
</div>
<!-- Video Section End -->
<!-- Home Page About Section Begin -->
<section class="homepage-about spad">
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="about-text">
				<div class="section-title">
					<h2>“Customers love our <br />facilities”</h2>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris, bibendum eget
					sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare. Morbi vel
					ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae orci. Suspendisse maximus
				malesuada. </p>
				<a href="{{ route('rooms') }}" class="primary-btn">Make a Reservation</a>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="row">
				<div class="col-sm-6">
					<div class="about-img">
						<img src="{{ URL::asset('img/home-about-1.jpg') }}" alt="">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="about-img">
						<img src="{{ URL::asset('img/home-about-2.jpg') }}" alt="">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="about-img">
						<img src="{{ URL::asset('img/home-about-3.jpg') }}" alt="">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="about-img">
						<img src="{{ URL::asset('img/home-about-4.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection