@extends('layouts.app')
@section('content')

<?php $helper = new Helper; ?>

<div class="container-fluid">
@foreach($helper::get_rooms() as $room)
    <div class="row">
        <div class="col-lg-6">
            <div class="ri-slider-item">
                <div class="ri-sliders owl-carousel">
                    <div class="single-img set-bg" data-setbg="img/rooms/room-1.jpg"></div>
                    <div class="single-img set-bg" data-setbg="img/rooms/room-2.jpg"></div>
                    <div class="single-img set-bg" data-setbg="img/rooms/room-3.jpg"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ri-text">
                <div class="section-title">
                    <div class="section-title">
                        <span>a memorable holliday</span>
                        <h2>{{ ucwords($room->room_name) }}</h2>
                    </div>
                    <p>{{ ucfirst($room->room_description) }}</p>
                    <div class="ri-features">
                        <div class="ri-info">
                            <i class="flaticon-019-television"></i>
                            <p>Smart TV</p>
                        </div>
                        <div class="ri-info">
                            <i class="flaticon-029-wifi"></i>
                            <p>High Wi-fii</p>
                        </div>
                        <div class="ri-info">
                            <i class="flaticon-003-air-conditioner"></i>
                            <p>AC</p>
                        </div>
                        <div class="ri-info">
                            <i class="flaticon-036-parking"></i>
                            <p>Parking</p>
                        </div>
                        <div class="ri-info">
                            <i class="flaticon-007-swimming-pool"></i>
                            <p>Pool</p>
                        </div>
                    </div>
                @auth
                    <a href="/reservation/entry" class="primary-btn">Make a Reservation</a>
                @endauth

                @guest
                    <a href="/authentication/login" class="primary-btn">Make a Reservation</a>
                @endguest    
                    
                </div>
            </div>
        </div>
    </div>
@endforeach
    
</div>
@endsection