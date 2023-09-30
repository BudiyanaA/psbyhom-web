@extends('layouts.costumerapp')
@section('content')	
    <div class="index-space"></div>
		<div class="container slider">
			<div id="slide-home" class="owl-carousel owl-theme">
				@foreach($slides as $slide)
					<div class="item"><a href="{{ $slide->remarks }}" target="_blank"><img src="{{ url('assets/' . $slide->image_slide ) }}" alt="{{ $slide->slide_name }}" /></a></div>
				@endforeach
			</div>
		</div>
	</div>
@endsection