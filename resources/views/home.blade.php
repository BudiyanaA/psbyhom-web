@extends('layouts.costumerapp')
@section('content')	
    <div class="index-space"></div>
		<div class="container slider">
			<div id="slide-home" class="owl-carousel owl-theme">
				<div class="item"><a href="#" target="_blank"><img src="{{ url('assets/img/Slide1.jpg') }}" alt="" /></a></div>
				<div class="item"><a href="#" target="_blank"><img src="{{ url('assets/img/Slide2.jpg') }}" alt="" /></a></div>
				<div class="item"><a href="#" target="_blank"><img src="{{ url('assets/img/slidemaintenance.png') }}" alt="" /></a></div>							
			</div>
		</div>
	</div>
@endsection